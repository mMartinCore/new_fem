<?php

namespace App\Http\Livewire\buyformes;

use App\Models\Buyforme;
use Livewire\Component; 
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

    public  $name;
    public  $link;
    public  $piece;
    public  $status;
    public  $description;
    public  $reference;
    

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
                    'status' => 'Unpaid',
                    'description' => $this->description, 
                    'reference' => $this->reference, 
                    'user_id' => auth()->user()->id,
                    'team_id' => auth()->user()->team_id,
            ];
    }

  
    public function create()
    {
       $this->validate();

       $dataInfo = Buyforme::create($this->modelData());  
                     
    //    if($this->images!=null && isset($this->images)){         
    //       $dataInfo->addMedia($this->images->getRealPath())->toMediaCollection('images');    
    //    }
      
       session()->flash('message', 'Product successfully added.');      
       return redirect()->route('buyformes.index');

    }

   
    public function render()
    {      
        return view('livewire.buyformes.create');
    }
}