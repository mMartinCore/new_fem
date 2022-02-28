<?php 
namespace App\Http\Controllers;  
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;

use App\Models\Counrty;

class CounrtyController extends Controller
{
    
    public function index()
    {
         return view('counrtys.index');
    }


    public function create()
    { 
        return view('counrtys.create');
    }


    public function edit($subdomain,$id)
    { 
        $counrty = Counrty::findOrfail($id);
        
        return view('counrtys.edit', compact('counrty'));
    }
    

    public function show($subdomain, $id)
    { 
        $counrty = Counrty::findOrfail($id);

        return view('counrtys.show', compact('counrty'));
    }

 
}
 