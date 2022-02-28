<?php

namespace App\Http\Livewire\contactsettings;

use App\Models\Contactsetting;
use Livewire\Component; 
use Livewire\WithFileUploads;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected Contactsetting $model_data;
  
    public $modelId;
  
    public  $email_1;
    public  $email_2;
    public  $phone_no_1;
    public  $phone_no_2;
    public  $contact_title;
    public  $content;
    public  $google_map_1;
    public  $google_map_2;
    public  $team_id;
    public  $address_1;
    public  $address_2;
    public $bg_img_contact;
    public $bg_img_contact_new;


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
            'email_1' => 'required|email|min:3|max:100',
            'email_2' => 'nullable|email|min:3|max:100',
           'phone_no_1' => 'required|min:10|max:15', 
           'phone_no_2' => 'nullable|min:3|max:100',
           'contact_title' => 'min:3|max:100',  
           'content' => 'min:3|max:1500',   
           'google_map_1' => 'nullable|min:3|max:20000',   
           'google_map_2' => 'nullable|min:3|max:20000', 
           'address_1' => 'nullable|min:3|max:200',
           'address_2' => 'nullable|min:3|max:200',


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

        $this->email_1 = $data->email_1;
        $this->email_2 = $data->email_2;
        $this->phone_no_1 = $data->phone_no_1;
        $this->phone_no_2 = $data->phone_no_2;
        $this->contact_title = $data->contact_title;
        $this->content = $data->content;
        $this->google_map_1 = $data->google_map_1;
        $this->google_map_2 = $data->google_map_2;
        $this->team_id = $data->team_id; 
        $this->bg_img_contact = $data->bg_img_contact;
        $this->address_1 = $data->address_1;
        $this->address_2 = $data->address_2;

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
                'email_1' => $this->email_1,
                'email_2' => $this->email_2,
                'phone_no_1' => $this->phone_no_1,
                'phone_no_2' => $this->phone_no_2,
                'contact_title' => $this->contact_title, 
                'content' => $this->content,
                'google_map_1' => $this->google_map_1,
                'google_map_2' => $this->google_map_2,
                'team_id' => $this->team_id, 
                'address_1' => $this->address_1,
                'address_2' => $this->address_2,
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
       $data_saved = Contactsetting::findOrfail($this->modelId);
       $data_saved->update($this->modelData());

       if($this->bg_img_contact_new!=null && isset($this->bg_img_contact_new)){         
        $data_saved->addMedia($this->bg_img_contact_new->getRealPath())->toMediaCollection('bg_img_contact');   
        if ( isset($this->bg_img_contact->bg_img_contact)) {
            $this->bg_img_contact->bg_img_contact->delete();
        }  
    }
        
      /* 
         if($this->images!=null && isset($this->images)){ 

            if(isset($data_saved->image_name)) {

                $data_saved->image_name->delete();

            }   

            $data_saved->addMedia($this->images->getRealPath())->toMediaCollection('images');

          }
        */

       session()->flash('message', 'Contact Setting  successfully updated.');      
    //    return redirect()->route('contactsettings.index');

    }



     public function mount(Contactsetting $contactsetting =null)
    {
         if ($contactsetting != null) {
            $this->model_data = $contactsetting;
            $this->modelId    = $this->model_data->id;
            $this->loadModel(); 
         }
    }

 

    public function render()
    {
 
        return view('livewire.contactsettings.edit');
    }
}