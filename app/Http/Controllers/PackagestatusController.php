<?php

namespace App\Http\Controllers;

use App\Models\Packagestatus;
use Illuminate\Http\Request;

class PackagestatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagestatuss = Packagestatus::all();
        return view('packagestatuss.index', compact('packagestatuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packagestatuss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packagestatus  $packagestatus
     * @return \Illuminate\Http\Response
     */
    public function show(Packagestatus $packagestatus)
    {
     //   return view('packagestatuss.show', compact('packagestatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packagestatus  $packagestatus
     * @return \Illuminate\Http\Response
     */
    public function edit($subdomain,$id)
    { 
        $packagestatus = Packagestatus::findorfail($id); 
        return view('packagestatuss.edit', compact('packagestatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packagestatus  $packagestatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packagestatus $packagestatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packagestatus  $packagestatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packagestatus $packagestatus)
    {
        //
    }
}
