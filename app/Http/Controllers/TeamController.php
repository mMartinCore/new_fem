<?php 
namespace App\Http\Controllers;  
use App\Models\Team;
use App\Models\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;   

class TeamController extends Controller
{
    
    public function index()
    {
         return view('teams.index');
    }


    public function create()
    { 
        return view('teams.create');
    }


    public function edit($subdomain,$id)
    { 
        $team = Team::findOrfail($id);
        
        return view('teams.edit', compact('team'));
    }
    

    public function show($subdomain, $id)
    {  
        $team_id = $id;
        return view('teams.show', compact('team_id'));
    }

 
}
 