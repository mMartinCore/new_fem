<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Payment;

use App\Models\Buyforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\argumentsSet;

class BuyformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subdomain, $id = null)
    {
        $user_id = $id;   //$id is the user_id
        if ($id) {
            User::findorfail($id)->pluck('id');
        }
        return view('buyformes.index', compact('user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buyformes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyforme  $buyforme
     * @return \Illuminate\Http\Response
     */
    public function show(Buyforme $buyforme)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyforme  $buyforme
     * @return \Illuminate\Http\Response
     */
    public function edit($subdomain, $id)
    {
        abort(404);
        // $buyforme = Buyforme::find($id);
        //  return view('buyformes.edit', compact('buyforme'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyforme  $buyforme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyforme $buyforme)
    {
        //
    }








    public function paymentIntent($subdomain,$id)
    {
    
    try{
         Buyforme::findorfail($id);
          
         Session::put('buyforme_id', $id); 
         Session::put('buyforme_amount', Buyforme::BUY_FORME_FEE);
         
        $intent = auth()->user()->createSetupIntent(); 
    } catch (\Exception $exception) {
           
        return back()->with('error', $exception->getMessage());
       }

        return view('buyformes.payment-intent', compact('intent'));
    } 


 

    public function buyformePost(Request $request)
    {
        $this->validate($request, [
            'payment_method' => 'required', 
            'line1' => 'required|string|min:3|max:255',
            'line2' =>'required|string|min:3|max:255',
            'city' => 'required|string|min:3|max:255',
            'state' => 'required|string|min:3|max:255',
            'postal_code' => 'required',
            'country_name' => 'required|string|min:3|max:255',
            'card_holder_name' => 'required|string|min:2|max:255',
        ]);
         
        

        if (!session()->exists('buyforme_id')) {
            return redirect()->route('buyformes.index');
        }
        $buyforme = Buyforme::findorfail(Session::get('buyforme_id'));

        try {

            $user = auth()->user();
            $paymentMethod = $request->input('payment_method');
       
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);

            $user->charge(
                Session::get('buyforme_amount') * 100,
                $paymentMethod,
                [
                    'metadata' => [
                        'Card Holder' => $request->card_holder_name,
                        'line  1' => $request->line1,
                        'line2' => $request->line2,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'Postal Code'=> $request->postal_code,
                        'Product name' =>$buyforme->name,
                        'Product Description' =>$buyforme->description,
                        'buyforme_id' =>$buyforme->id,
                    ]
                ]
            );
            
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
           }


        try { 
        DB::Transaction(function() use ( $paymentMethod, $buyforme) {
        
            
            
            $user = auth()->user();
        
            $payment=Payment::create([
                'user_id' => $user->id,
                'amount' =>  Session::get('buyforme_amount'),
                'currency' => 'USD',
                'description' =>  $buyforme->name. ': '.  $buyforme->description,
                'status' => 'paid',
                'payment_mode' => 'card',
                'payment_id' => $paymentMethod,
                'team_id' => $user->team_id,
            ]);

            $packageUpdate= $buyforme; 
           
            $packageUpdate->update([
                'status' => 'paid',
                'payment_id' => $payment->id,
            ]);
        });
       } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
       }
     
        Session::flash('message', 'Payment successful!');
        Session::forget('buyforme_id');
        Session::forget('buyforme_amount');
         
        return view('stripe.successfulPayment');
    
    }






    public function destroy(Buyforme $buyforme)
    {
        //
    }
}
