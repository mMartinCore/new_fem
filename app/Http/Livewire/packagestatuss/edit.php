<?php

namespace App\Http\Livewire\packagestatuss;

use App\Models\Packagestatus;
use Livewire\Component; 
use Livewire\WithFileUploads;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected Packagestatus $model_data;
  
    public $modelId;
  
    public  $name;
    public  $description;
    public  $user_id;
    public  $team_id;
    public  $var5;
    public  $var6;
    public  $var7;
    public  $var8;
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
               'description' => 'required|min:3|max:100',
            // 'user_id' => 'required|min:3|max:100', 
            // 'team_id' => 'required|min:3|max:100',
            // 'var5' => 'min:3|max:100',  
            // 'var6' => 'min:3|max:100',   
            // 'var7' => 'min:3|max:100',   
            // 'var8' => 'min:3|max:100',
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
        $this->description = $data->description;
        $this->user_id = $data->user_id;
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
                   'description' => $this->description,
                // 'user_id' => $this->user_id,
                // 'team_id' => $this->team_id,
                // 'var5' => $this->var5, 
                // 'var6' => $this->var6,
                // 'var7' => $this->var7,
                // 'var8' => $this->var8,
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
       $data_saved = Packagestatus::findOrfail($this->modelId)->update($this->modelData());
        
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'Packagestatus  successfully updated.');      
       return redirect()->route('packagestatuss.index');

    }



     public function mount(Packagestatus $packagestatus)
    {
       
        $this->model_data = $packagestatus;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
 
        return view('livewire.packagestatuss.edit');
    }
}