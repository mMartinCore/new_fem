<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Merge;
use App\Models\Package;
use App\Models\Buyforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function index()
    { 

        if(auth()->user()->hasRole('Super')){
            
       
            $package_count = Package::where('courier_status','!=', 'Merged')->where('handover_date', null)->where('handovername', null)->count();
  
            $merge_count  =  Merge::count();
    
            $user_count = User::count();
    
            $invoice_count  = Package::where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->count(); 
    
            $buyforme_count  = Buyforme::count();
    
            $team_count = Team::count();
    
            $balance = 0;
            
            $packages=Package::where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->get(); 
            
            if ($packages) {
                foreach ($packages as $package) {
                    if ($package->payment_status !="paid") {
                        $balance += $package->price*$package->quantity;
                    }
                } 
            }
            
    
            $category = Package::join('categories', 'packages.category_id','categories.id')
                                       ->select( 'categories.name', 
                                         DB::raw('count(categories.name) as count'))
                                       ->groupBy('categories.name')->get();
              
            $categories = $category; 
            $category = $category->pluck('count','name'); 
            $category_name =null;
            $category_count =null;  
           foreach ($category as $key => $value) {
               $category_name[] = $key;
               $category_count []= $value;          
           } 
     
        
         $category_name =@json_encode($category_name);
         $category_count =@json_encode($category_count); 
     

        }elseif(auth()->user()->hasRole('Admin')){


            $package_count = Package::where('team_id',auth()->user()->team_id )->where('courier_status','!=', 'Merged')->where('handover_date', null)->where('handovername', null)->count();
  
            $merge_count  =  Merge::where('team_id',auth()->user()->team_id )->count();
    
            $user_count = User::where('team_id',auth()->user()->team_id )->where('team_id',auth()->user()->team_id )->count();
    
            $invoice_count  = Package::where('team_id',auth()->user()->team_id )->where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->count(); 
    
            $buyforme_count  = Buyforme::where('team_id',auth()->user()->team_id )->count();
    
            $team_count = Team::where('team_id',auth()->user()->team_id )->count();
    
            $balance = 0;
            
            $packages=Package::where('team_id',auth()->user()->team_id )->where('packages.payment_status','=','Unpaid')->where('packages.price','>',0)->get(); 
            
            if ($packages) {
                foreach ($packages as $package) {
                    if ($package->payment_status !="paid") {
                        $balance += $package->price*$package->quantity;
                    }
                } 
            }
            
    
            $category = Package::where('team_id',auth()->user()->team_id )->join('categories', 'packages.category_id','categories.id')
                                       ->select( 'categories.name', 
                                         DB::raw('count(categories.name) as count'))
                                       ->groupBy('categories.name')->get();
              
            $categories = $category; 
            $category = $category->pluck('count','name'); 
            $category_name =null;
            $category_count =null;  
           foreach ($category as $key => $value) {
               $category_name[] = $key;
               $category_count []= $value;          
           } 
     
    
         $category_name =@json_encode($category_name);
         $category_count =@json_encode($category_count); 
    
    
       
        }else{

          abort(401);

        }   

   



      //  dd($category_count);
        return view('admin.dashboard', compact('merge_count','categories', 'category_name','category_count', 'package_count','invoice_count',
        'buyforme_count','user_count','team_count','balance'));
    } 



 
 
}
