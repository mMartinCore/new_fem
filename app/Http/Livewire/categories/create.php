<?php

namespace App\Http\Livewire\categories;

use App\Models\Category;
use Livewire\Component; 
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

    public  $name;
    public  $description;
    public  $var3;
    public  $var4;
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
               'description' => 'required|min:3|max:100',
            // 'var3' => 'required|min:3|max:100', 
            // 'var4' => 'required|min:3|max:100',
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
                // 'var3' => $this->var3,
                // 'var4' => $this->var4,
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

  
    public function create()
    {
       $this->validate();

       $dataInfo = Category::create($this->modelData());  
                     
       if($this->images!=null && isset($this->images)){         
          $dataInfo->addMedia($this->images->getRealPath())->toMediaCollection('images');    
       }
      
       session()->flash('message', 'Category  successfully created.');      
       return redirect()->route('categories.index');

    }

   
    public function render()
    {      
        return view('livewire.categories.create');
    }
}