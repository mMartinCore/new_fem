<?php 
namespace App\Http\Controllers;  
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller
{
    
    public function index()
    {
         return view('countries.index');
    }


    public function create()
    { 
        return view('countries.create');
    }


    public function edit($subdomain,$id)
    { 
        $Country = Country::findOrfail($id);
        
        return view('countries.edit', compact('Country'));
    }
    

    public function show($subdomain, $id)
    { 
        $Country = Country::findOrfail($id);

        return view('countries.show', compact('Country'));
    }

 
}
 