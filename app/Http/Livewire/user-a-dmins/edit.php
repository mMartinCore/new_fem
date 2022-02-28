<?php

namespace App\Http\Livewire\user-a-dmins;

use App\Models\UserADmin;
use Livewire\Component; 
use Livewire\WithFileUploads;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected UserADmin $model_data;
  
    public $modelId;
  
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
        $this->Email = $data->Email;
        $this->country_id = $data->country_id;
        $this->address = $data->address;
        $this->city = $data->city;
        $this->phone = $data->phone;
        $this->role = $data->role;
        $this->team_id = $data->team_id;
        $this->var9 = $data->var9;
        $this->var10 = $data->var10;
        $this->var11 = $data->var11;
        $this->var12 = $data->var12;
        $this->var13 = $data->var13;
        $this->var14 = $data->var14;
        $this->var15 = $data->var15;
        $this->var16 = $data->var16;
        $this->var17 = $data->var17;
        $this->var18 = $data->var18;
        $this->var19 = $data->var19;
        $this->var20 = $data->var20;
        $this->var21 = $data->var21;

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


    /**
     * The update function
     *
     * @return void
     */

    public function update()
    {
       $this->validate();
       $data_saved = UserADmin::findOrfail($this->modelId)->update($this->modelData());
        
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'UserADmin  successfully updated.');      
       return redirect()->route('user-a-dmins.index');

    }



     public function mount(UserADmin $user-a-dmin)
    {
        $this->model_data = $user-a-dmin;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
 
        return view('livewire.user-a-dmins.edit');
    }
}