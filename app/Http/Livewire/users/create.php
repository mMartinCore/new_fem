<?php

namespace App\Http\Livewire\users;

use App\Models\User;
use Livewire\Component; 
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

    public  $name;
    public  $Email;
    public  $country_id;
    public  $address;
    public  $city;
    public  $phone;
    public  $role;
    public  $team_id;
    public  $var9;
    public  $var10;
    public  $var11;
    public  $var12;
    public  $var13;
    public  $var14;
    public  $var15;
    public  $var16;
    public  $var17;
    public  $var18;
    public  $var19;
    public  $var20;
    public  $var21; 

    public $images;

    
    
   // public function mount($data=null){

   // }


    /**
     * Put your custom public properties here!
     */

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [ 
               'name' => 'required|min:3|max:100',
               'Email' => 'required|min:3|max:100',
            // 'country_id' => 'required|min:3|max:100', 
            // 'address' => 'required|min:3|max:100',
            // 'city' => 'min:3|max:100',  
            // 'phone' => 'min:3|max:100',   
            // 'role' => 'min:3|max:100',   
            // 'team_id' => 'min:3|max:100',
            // 'var9' => 'min:3|max:100',  
            // 'var10' => 'min:3|max:100',   
            // 'var11' => 'min:3|max:100',   
            // 'var12' => 'min:3|max:100', 
            // 'var13' => 'min:3|max:100',   
            // 'var14' => '',   
            // 'var15' => '',   
            // 'var16' => '',   
            // 'var17' => '',  
            // 'var18' => '',   
            // 'var19' => '',  
            // 'var20' => '',   
            // 'var21' => '',  

        ];
    }


    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return
              [
                   'name' => $this->name,
                   'Email' => $this->Email,
                // 'country_id' => $this->country_id,
                // 'address' => $this->address,
                // 'city' => $this->city, 
                // 'phone' => $this->phone,
                // 'role' => $this->role,
                // 'team_id' => $this->team_id,
                // 'var9' => $this->var9,
                // 'var10' => $this->var10, 
                // 'var11' => $this->var11,
                // 'var12' => $this->var12,
                // 'var13' => $this->var13,
                // 'var14' => $this->var14,
                // 'var15' => $this->var15,
                // 'var16' => $this->var16,
                // 'var17' => $this->var17,
                // 'var18' => $this->var18,
                // 'var19' => $this->var19,
                // 'var20' => $this->var20,
                // 'var21' => $this->var21,
            ];
    }

  
    public function create()
    {
       $this->validate();

       $dataInfo = User::create($this->modelData());  
                     
       if($this->images!=null && isset($this->images)){         
          $dataInfo->addMedia($this->images->getRealPath())->toMediaCollection('images');    
       }
      
       session()->flash('message', 'User  successfully created.');      
       return redirect()->route('users.index');

    }

   
    public function render()
    {      
        return view('livewire.users.create');
    }
}