<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Merge;
use Illuminate\Http\Request;

class MergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $subdomain, $id = null )
    {
        $user_id=$id;   //$id is the user_id
        if ($id) {
           
             User::findorfail($id)->pluck('id');

            return view('merges.index', compact('user_id'));

        }
        
         
        return view('merges.index', compact('user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Merge  $merge
     * @return \Illuminate\Http\Response
     */
    public function show($subdomain, $id)
    {
        $merge = Merge::findorfail($id);
        $price=null;
        $description=null;
        $name=null;
        foreach ($merge->packages as $package )
        {
            $name []= $package->name;

            $description []=$package->description; 
            
            if ($package->payment ) {  
                $total= $package->quantity * $package->price;
                $price += $total;  
             
            }
        } 
      
        $name = implode(', ', $name);
        $description = implode(', ', $description);

      
        Session::put('merge_id',$merge->id);
        Session::put('amount',$price);
        
 
        return view('merges.show', compact('merge','name','description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merge  $merge
     * @return \Illuminate\Http\Response
     */
    public function edit($subdomain, $id)
    {
        $merge = Merge::findorfail($id);
        return view('merges.edit', compact('merge'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merge  $merge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merge $merge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merge  $merge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merge $merge)
    {
        //
    }
}
