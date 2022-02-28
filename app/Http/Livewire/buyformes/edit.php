<?php

namespace App\Http\Livewire\buyformes;

use App\Models\Buyforme;
use Livewire\Component; 
use Livewire\WithFileUploads;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected Buyforme $model_data;
  
    public $modelId;
  
    public  $name;
    public  $link;
    public  $piece;
    public  $status;
    public  $description;
    public  $reference;
 
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
            'link' => 'required|min:7|max:200',
            'piece' => 'required|min:3|max:100', 
         //  'status' => 'required|min:3|max:100',
            'description' => 'min:3|max:500',  
            'reference' => 'nullable|min:3|max:100',  
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
        $this->link = $data->link;
        $this->piece = $data->piece;
        $this->status = $data->status;
        $this->description = $data->description;
        $this->reference = $data->reference;
        

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
                    'link' => $this->link,
                    'piece' => $this->piece,
                    'status' => $this->status ?? 'Pending',
                    'description' => $this->description, 
                    'reference' => $this->reference,
                
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
       $data_saved = Buyforme::findOrfail($this->modelId)->update($this->modelData());
        
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'Product information successfully updated.');      
       return redirect()->route('buyformes.index');

    }



     public function mount(Buyforme $buyforme)
    {
        $this->model_data = $buyforme;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
 
        return view('livewire.buyformes.edit');
    }
}