<?php 
namespace App\Http\Controllers;  
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;

use App\Models\Contactsetting;

class ContactsettingController extends Controller
{
    
    public function index()
    {
        abort(401);
        //  return view('contactsettings.index');
    }


    public function create()
    { 
        return view('contactsettings.create');
    }


    public function edit($subdomain,$id)
    { 
        // $contactsetting = Contactsetting::findOrfail($id);
        abort(401);
        // return view('contactsettings.edit', compact('contactsetting'));
    }
    

    public function show($subdomain, $id)
    { 
      //  $contactsetting = Contactsetting::findOrfail($id);
        abort(401);
       // return view('contactsettings.show', compact('contactsetting'));
    }

 
}
 