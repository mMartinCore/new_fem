<?php 
namespace App\Http\Controllers;  
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;

use App\Models\UserADmin;

class UserADminController extends Controller
{
    
    public function index()
    {
         return view('user-a-dmins.index');
    }


    public function create()
    { 
        return view('user-a-dmins.create');
    }


    public function edit($subdomain,$id)
    { 
        $user-a-dmin = UserADmin::findOrfail($id);
        
        return view('user-a-dmins.edit', compact('user-a-dmin'));
    }
    

    public function show($subdomain, $id)
    { 
        $user-a-dmin = UserADmin::findOrfail($id);

        return view('user-a-dmins.show', compact('user-a-dmin'));
    }

 
}
 