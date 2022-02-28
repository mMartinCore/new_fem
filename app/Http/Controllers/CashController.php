<?php
    
namespace App\Http\Controllers;

use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Merge; 
use App\Models\Package;
use App\Models\Payment;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
    
class CashController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function checkoutCharge()
    {      
        if (auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin')) {
            if (!session()->exists('package_id')) {
                return redirect()->route('packages.list');
            }
            // $package = Package::where('user_id',auth()->user()->id)->where('id',$request->package_id)->first();
        
            $package = Package::where('id', Session::get('package_id'))->first();
            if (!$package) {
                return redirect()->back()->with('error', 'Package not found');
            }
        
      
            return view('cash.checkoutCharge', compact('package'));
        }else{
            abort(401);
        }
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function CashPost(Request $request)
    {
    

  
        $this->validate($request, [
            'currency' => 'required|min:3|max:4', 
            // 'amount' => 'required|min:1|max:8', 
            'name' => 'required|min:3|max:100',
        ]);
         
        if(auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin')){
            
      
        
            if (!session()->exists('package_id')) {
                return redirect()->route('packages.list');
            }

        
   
            try {
                $package= Package::findorFail($request->package_id);
                $user = auth()->user();
        
        
                $payment=Payment::create([
                'user_id' => $user->id,
                'amount' =>  $package->price,
                'currency' => $request->currency,
                'description' =>  $package->name. ': '.  $package->description,
                'status' => 'paid',
                'payment_mode' => 'Cash',
                'payment_id' => now()->timestamp,
                'team_id' => $user->team_id,
            ]);

                $packageUpdate= $package;
            
                $package->payment()->attach($payment->id);
           
                $packageUpdate->update([
                'payment_status' => 'paid',
                'payment_mode' =>  'Cash',
            ]);
            } catch (\Exception $exception) {
                return back()->with('error', $exception->getMessage());
            }
     
            Session::flash('message', 'Payment successful!');
            Session::forget('package_id');
            Session::forget('amount');

            return view('stripe.successfulPayment');
        }else{

            abort(401);
       
               }
 
        
    }


    



    public function mergecash()
    {      

        if (!session()->exists('merge_id')) {
            return redirect()->route('merges.index');
        } 
        // $package = Package::where('user_id',auth()->user()->id)->where('id',$request->package_id)->first(); 
        
        $merge = Merge::where('id', Session::get('merge_id'))->first();  
        if (!$merge) {
            return redirect()->back()->with('error', 'Merge Package not found');
        }  
        
        return view('mergecash.checkoutCharge', compact( 'merge')); 
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function mergeCashPost(Request $request)
    {
    
   
        $this->validate($request, [
            'currency' => 'required|min:3|max:4', 
            // 'amount' => 'required|min:1|max:8', 
            'name' => 'required|min:3|max:100',
        ]);
         
              
        if(auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin')){
            
      
            $merge= Merge::findorFail($request->merge_id);

            if (  $merge->payment_id != null) {
                return back()->with('error', 'Already paid');
            }
    
            $user = auth()->user();
       
            try {
                DB::Transaction(function () use ($request, $merge) {
                    $user = auth()->user(); 
             
     
                    $price=null;
                    $description=null;
                    $name=null;
                    foreach ($merge->packages as $package) {
                        $name []= $package->name;
                        $description []=$package->description;
                        $total= $package->quantity * $package->price;
                        $price += $total;
                    }
                    $name = implode(', ', $name);
                    $description = implode(', ', $description);
     
                     
                 
                    $user = auth()->user(); 

                    $payment=Payment::create([
                     'user_id' => $user->id,
                     'amount' => $price,
                     'currency' => $request->currency,
                     'description' =>  $name. ': \n'.  $description,
                     'status' => 'paid',
                     'payment_mode' => 'Cash',
                     'payment_id' => now()->timestamp,
                     'team_id' => $user->team_id,
                 ]);
     
                    foreach ($merge->packages as $package) {
                        $packageUpdate= $package;
                        $package->payment()->attach($payment->id);
                        $packageUpdate->update([
                            'payment_status' => 'paid',
                            'payment_mode' =>  'Cash',
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
        }else{

            abort(401);
       
               }
        
    }













}