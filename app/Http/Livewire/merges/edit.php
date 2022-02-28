<?php

namespace App\Http\Livewire\merges;

use App\Models\Merge;
use Livewire\Component; 
use App\Models\Packagestatus;
use Livewire\WithFileUploads;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected Merge $model_data;
    protected Merge $model_data_old;
    public $modelId;
  
    public  $name;
    public  $status;
    public  $user_id;
    public  $team_id;
    public  $packagestatus_id; 
    public  $package_status_date;
    public $images;
    public $original_status;
    public  $now;

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
               'packagestatus_id' => 'required|min:1|max:100', 

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
        $this->status = $data->status;
        $this->user_id = $data->user_id;
        $this->team_id = $data->team_id; 
        $this->packagestatus_id = $data->packagestatus_id; 
        $this->original_status = $data->packagestatus_id;
    }

    public function setAllMergePackageStatus()
    { 
        $this->setPackageStatus();  
         
         $merge= Merge::findorfail($this->modelId);
       
        foreach ($merge->packages as $package) {
            $package->update([
                'packagestatus_id' => $this->packagestatus_id,
                'package_status_date' => $this->now,
                ]);
        }
    }


    Public function setPackageStatus(){
        $this->now = now();
        if ($this->original_status == $this->packagestatus_id) { 
    
        }else{
        
              if ($this->packagestatus_id==Packagestatus::STATUS_PENDING) {
                  $this->packagestatus_id = Packagestatus::STATUS_PENDING;
                  $this->package_status_date = $this->now;
             
              }
    
              if ($this->packagestatus_id==Packagestatus::STATUS_RECEIVED) {
                  $this->packagestatus_id = Packagestatus::STATUS_RECEIVED;
                  $this->package_status_date = $this->now;
              }
    
              if ($this->packagestatus_id==Packagestatus::STATUS_INTRANSIT) {
                  $this->packagestatus_id = Packagestatus::STATUS_INTRANSIT;
                  $this->package_status_date = $this->now;
              }
    
              if ($this->packagestatus_id==Packagestatus::STATUS_DELIVERED) {
                  $this->packagestatus_id = Packagestatus::STATUS_DELIVERED;
                  $this->package_status_date =$this->now;
              }
    
              if ($this->packagestatus_id==Packagestatus::STATUS_PENDING_QUOTE) {
                  $this->packagestatus_id = Packagestatus::STATUS_PENDING_QUOTE;
                  $this->package_status_date = $this->now;
              }
    
              if ($this->packagestatus_id==Packagestatus::STATUS_READY_FOR_PICKUP) {
                  $this->packagestatus_id = Packagestatus::STATUS_READY_FOR_PICKUP;
                  $this->package_status_date = $this->now;
              }
    
        }
      }

    public function modelData()
    {
        $this->setAllMergePackageStatus();
        return
              [  
                   'name' => $this->name,
                   'packagestatus_id' => $this->packagestatus_id,  
                   'package_status_date' => $this->now,
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
       $data_saved = Merge::findOrfail($this->modelId)->update($this->modelData());
        
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'Merge  successfully updated.');      
       return redirect()->route('merges.index');

    }



     public function mount(Merge $merge)
    {
        $this->model_data = $merge;
        $this->model_data_old = $merge;   
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
        $statuses = Packagestatus::all();

        return view('livewire.merges.edit',  ['statuses' => $statuses]);
    }
}