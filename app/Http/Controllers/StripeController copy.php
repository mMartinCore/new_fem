<?php
    
namespace App\Http\Controllers;
    
use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $intent = auth()->user()->createSetupIntent();    
        
        return view('stripe', compact('intent')); 
    }

    public function checkoutCharge()
    {      

        if (!session()->exists('package_id')) {
            return redirect()->route('packages.list');
        }
        $intent = auth()->user()->createSetupIntent();
        
        // $package = Package::where('user_id',auth()->user()->id)->where('id',$request->package_id)->first(); 
        
        $package = Package::where('id', Session::get('package_id'))->first();  
        if (!$package) {
            return redirect()->back()->with('error', 'Package not found');
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
                    'country' => $request->country,  
                    'postal_code'=> $request->postal_code,
                ]);

            // auth()->user()->checkoutCharge(1500, 'Pants', 20);







            
       // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


    
   
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
                        'country' => $request->country,  
                        'postal_code'=> $request->postal_code,
                        'package' =>$package->name,
                        'package_description' =>$package->description,
                        'package_id' =>$package->id,
                    ] 
                ]           
            );
            
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
            $package->payment()->attach($payment->id);
           

       } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
       }
   


    //  $shop->products()->attach([123, 456, 789]);



        //4242424242424242
        //$card = $stripe->cards()->create(auth()->user()->stripe_id, $request->paymentMethod); // add this to add a card.
       
        // $charge = Charge::create(array(
        //     // 'customer' =>auth()->user()->stripe_id,
        //     "source" => $request->stripeToken,
        //     "customer" => auth()->user()->email,
        //     'amount'   => 20*100,
        //     'currency' => 'usd',
        //     "description" => "Mr. Miller 65 inches TV",

            // 'setup_future_usage' => 'off_session',  
            // 'automatic_payment_methods' => [
            //   'enabled' => 'true',
            // ],

       // ));


        // $intent = \Stripe\PaymentIntent::create([
        //     'customer' =>auth()->user()->stripe_id,
        //     'setup_future_usage' => 'off_session',
        //     'amount' => 2000,
        //     "currency" => "usd",
        //     "description" => "To pay for a package"
        //   ]);





        //   Stripe\Charge::create ([
        //         "amount" => 1000 * 1000,
        //         "currency" => "usd",
        //         // "source" => $request->stripeToken,
        //          "customer" => auth()->user()->stripe_id,
        //         "description" => "Good payment from user"
        // ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}