<?php
    
namespace App\Http\Controllers;
    
use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Merge;
use App\Models\Team;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    
class MergeCheckoutChargeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripe()
    // {
    //     $intent = auth()->user()->createSetupIntent();    
        
    //     return view('mergeCheckoutCharge.mergePost', compact('intent')); 
    // }

    public function checkoutCharge()
    {      
        try {

        if (session()->exists('merge_id')) {

            $merge= Merge::findorFail( Session::get('merge_id'));

            if ( $merge->payment_id != null) {
                return back()->with('error', 'Merge already paid');
            }
            $intent = auth()->user()->createSetupIntent();
        
            // $package = Package::where('user_id',auth()->user()->id)->where('id',$request->package_id)->first();
         return view('mergeStripe.mergeCheckoutCharge', compact('intent','merge')); 
       
        } else {
              return redirect()->back()->with('error', 'Merge  Package not found');
               }

        } catch (\Exception $exception) {
           
            return back()->with('error', $exception->getMessage());
           }

    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function mergePost(Request $request)
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
         
        
         $merge= Merge::findorFail($request->merge_id);

        if (!session()->exists('merge_id') && $merge->payment_id != null) {
            return back()->with('error', 'Merge not found or already paid');
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


       
            $user = auth()->user();
            $paymentMethod = $request->input('payment_method');
        
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
 
 
            $price=null;
            $description=null;
            $name=null;
            foreach ($merge->packages as $package )
            {
                $name []= $package->name;
                $description []=$package->description; 
                $total= $package->quantity * $package->price;
                 $price += $total;   
            } 
            $name = implode(', ', $name);
            $description = implode(', ', $description);        
 
            $user->charge(
                  $price * 100, 
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
                         'package' =>$name,
                         'package_description' =>$description,
                         'merger_id' =>$merge->id,
                     ] 
                 ]           
             );
             
            } catch (\Exception $exception) {
                return back()->with('error', $exception->getMessage());
               }
    
    
            try { 

      DB::Transaction(function()  use ($price, $name, $description,$user, $merge,$paymentMethod) {
             $user = auth()->user();
         
             $payment=Payment::create([
                 'user_id' => $user->id, 
                 'amount' => $price,
                 'currency' => 'USD',
                 'description' =>  $name. ': \n'.  $description,
                 'status' => 'paid',
                 'payment_mode' => 'card',
                 'payment_id' => $paymentMethod,
                 'team_id' => $user->team_id,
             ]);           
 
             foreach ($merge->packages as $package )
             {
                 $packageUpdate= $package;
                 $package->payment()->attach($payment->id);
                 $packageUpdate->update([
                     'payment_status' => 'paid',
                     'payment_mode' =>  'card',
                 ]);
             }  


                $merge->update([
                    'payment_id' => $payment->id, 
                ]);
           });           
           

       } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
       }
     
        Session::flash('message', 'Payment successful!');
        Session::forget('merge_id');
        Session::forget('amount');
         
        return view('stripe.successfulPayment');
    }
}