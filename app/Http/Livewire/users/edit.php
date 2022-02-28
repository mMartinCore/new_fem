<?php

namespace App\Http\Livewire\users;

use App\Models\User;
use Livewire\Component; 
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected User $model_data;
  
    public $modelId;
  
    public  $name;
    public  $email;
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
            'email' => 'required|email|max:100',
            'country_id' => 'required', 
            'address' => 'required|min:3|max:100',
            'city' => 'min:3|max:100',  
            'phone' => 'min:7|max:16',   
             'role' => 'required',   
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
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = $this->model_data; 
       
        // Assign the variables here

        $this->name = $data->name;
        $this->email = $data->email;
        $this->country_id = $data->country_id;
        $this->address = $data->address;
        $this->city = $data->city;
        $this->phone = $data->phone;
        if ($data->roles) {

            foreach ($data->roles as $role) {
                $this->role = $role->id;
            }
    
        }
        $this->team_id = $data->team_id; 

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
                   // 'email' => $this->email,
                    'country_id' => $this->country_id,
                    'address' => $this->address,
                    'city' => $this->city, 
                    'phone' => $this->phone,
                    // 'role' => $this->role, 
            ];
    }


    /**
     * The update function
     *
     * @return void
     */

    public function update()
    {
      $this->validate();
       $data_saved = User::findOrfail($this->modelId);
      
       $data_saved->update($this->modelData());
       $data_saved->roles()->sync($this->role);
 
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'User  successfully updated.');      
       return       redirect()->to('users/'. $data_saved->id.'/edit');

    }



     public function mount(User $user)
    {
        $this->model_data = $user;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
       
        $roles = Role::all(); 
        return view('livewire.users.edit' ,['roles' => $roles]);
    }
}