<?php 
namespace App\Http\Controllers;  
use App\Models\User;
use App\Models\Merge;
use App\Models\Package;

use App\Models\Buyforme;
use Illuminate\Http\Request;
use App\Http\Middleware\subdomain;
use App\Http\Controllers\Controller;
use Session;
class UserController extends Controller
{
    
    public function userList( $subdomain, $id = null )
    {
        $user_id=$id;   //$id is the user_id
        if ($id) {
             User::findorfail($id); 
         }
  
       return view('users.user-list', compact('user_id'));

    }

    public function edit($subdomain, $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    

    public function show($subdomain, $id)
    {

        $user = User::findorfail($id);
        $package_count = Package::where('user_id', $id)->where('courier_status','!=', 'Merged')->where('handover_date', null)->where('handovername', null)->count();
  
        $merge_count  =  Merge::where('user_id', $id)->count();  

        $invoice_count  = Package::where('user_id', $id)->where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->count(); 

        $buyforme_count  = Buyforme::where('user_id', $id)->count(); 

        $balance = 0;
        
        $packages=Package::where('user_id', $id)->where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->get(); 
        
        if ($packages) {
            foreach ($packages as $package) {
                if ($package->payment_status !="paid") {
                    $balance += $package->price*$package->quantity;
                }
            } 
        }

       $show_user_id=$id;
       Session::put('cust_id', $user->id);
       Session::put('cust_team_id', $user->team_id); 

        return view('users.show', compact('user','package_count','merge_count','invoice_count','buyforme_count','balance','show_user_id'));    
    }

 

 
 
}
