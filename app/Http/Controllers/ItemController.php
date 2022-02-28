<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $subdomain)
    {
        // dd( $subdomain);
        $items=Item::all();
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Item  $cr
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Item $model)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\cr  $cr
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Item $model)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\cr  $cr
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Item $cr)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\cr  $cr
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Item $cr)
    // { 
    //     //
    // }
}
