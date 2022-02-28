<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Session;
class PackageController extends Controller
{
    public function index()
    {
        // abort(401);
        return view('packages.index');
    }


    public function list( $subdomain, $id = null)
    {
        $user_id=$id;   //$id is the user_id

        if(!auth()){
            return redirect('/login');
        }
        Session::forget('package_id');
        Session::forget('amount');

       

        if(auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin') &&  $user_id !=''){
                
            return view('packages.list', compact('user_id'));
        }  
        return view('packages.list', compact('user_id'));
    
    }


    public function create()
    { 
        return view('packages.create');
    }


    public function edit($subdomain,$id)
    { 
        $package = Package::findOrfail($id);
        // abort(401);
        return view('packages.edit', compact('package'));
    }
    

    public function show($subdomain, $id)
    { 
        $package = Package::findOrfail($id);
        // abort(401);  
        // dd($package->packagestatus_id);
        $total=$package->price * $package->quantity;
        Session::put('package_id',$package->id);
        Session::put('amount', $total);
        

       // abort(401);
     return view('packages.show', compact('package'));
    }
}
