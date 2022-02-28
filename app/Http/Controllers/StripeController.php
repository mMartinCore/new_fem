<?php
    
namespace App\Http\Controllers;
    
use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        try {
            $intent = auth()->user()->createSetupIntent();   
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
           }
        
        return view('stripe', compact('intent')); 
    }

    public function checkoutCharge()
    {      


     try {

        if (!session()->exists('package_id')) {
            return redirect()->route('packages.list');
        }
        $intent = auth()->user()->createSetupIntent();
        
        // $package = Package::where('user_id',auth()->user()->id)->where('id',$request->package_id)->first(); 
        
        $package = Package::where('id', Session::get('package_id'))->first();  
        if (!$package) {
            return redirect()->back()->with('error', 'Package not found');
        }  
         
      } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
       }

        return view('stripe.checkoutCharge', compact('intent','package')); 
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
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
         

    
       
        if (!session()->exists('package_id')) {
            return redirect()->route('packages.list');
        }

               $user = auth()->user();
                $user->update([
                    // 'name' => $request->name,  
                    'line1' => $request->line1,
                    'line2' => $request->line2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country_name' => $request->country_name,  
                    'postal_code'=> $request->postal_code,

                ]); 
   
       try {


           $package= Package::findorFail($request->package_id);
           $user = auth()->user();
           $paymentMethod = $request->input('payment_method');
       
           $user->createOrGetStripeCustomer();
           $user->updateDefaultPaymentMethod($paymentMethod);

           $user->charge(
                 $package->price * 100, 
                $paymentMethod,
                [
                    'metadata' => [
                        'card_holder' => $request->card_holder_name,  
                        'line1' => $request->line1,
                        'line2' => $request->line2,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country_name,  
                        'postal_code'=> $request->postal_code,
                        'package' =>$package->name,
                        'package_description' =>$package->description,
                        'package_id' =>$package->id,
                    ] 
                ]           
            );
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
           }


        try { 
          
            DB::Transaction(function()  use ( $paymentMethod, $package) {
            $user = auth()->user();
            $payment=Payment::create([
                'user_id' => $user->id, 
                'amount' => $package->price,
                'currency' => 'USD',
                'description' =>  $package->name. ': '.  $package->description,
                'status' => 'paid',
                'payment_mode' => 'card',
                'payment_id' => $paymentMethod,
                'team_id' => $user->team_id,
            ]); 

            $packageUpdate= $package;
            
            $package->payment()->attach($payment->id);
           
            $packageUpdate->update([
                'payment_status' => 'paid',
                'payment_mode' =>  'card',
            ]);

            });
       } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
       }
     
        Session::flash('message', 'Payment successful!');
        Session::forget('package_id');
        Session::forget('amount');
         
        return view('stripe.successfulPayment');
    }
}