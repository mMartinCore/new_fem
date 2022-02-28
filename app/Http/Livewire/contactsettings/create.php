<?php

namespace App\Http\Livewire\contactsettings;

use App\Models\Contactsetting;
use Livewire\Component; 
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

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

    
    protected $listeners = ['setTeamId'];
 
    public function setTeamId($team_id)
    {
      
        $this->team_id = $team_id; 
    }
    
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
                 'email_1' => 'required|email|min:3|max:100',
                 'email_2' => 'nullable|email|min:3|max:100',
                'phone_no_1' => 'required|min:10|max:15', 
                'phone_no_2' => 'nullable|min:3|max:100',
                'contact_title' => 'min:3|max:100',  
                'content' => 'min:3|max:1500',   
                'google_map_1' => 'nullable|min:3|max:20000',   
                'google_map_2' => 'nullable|min:3|max:20000',
                'team_id' => 'required',
                'address_1' => 'nullable|min:3|max:200',
                'address_2' => 'nullable|min:3|max:200',

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

  
    public function create()
    {
      
       $this->validate();

       $dataInfo = Contactsetting::create($this->modelData());  
                     
       if($this->bg_img_contact!=null && isset($this->bg_img_contact)){         
          $dataInfo->addMedia($this->bg_img_contact->getRealPath())->toMediaCollection('bg_img_contact');    
       }
      
       session()->flash('message', 'Contactsetting  successfully created.');      
      // return redirect()->route('contactsettings.index');

    }

   
    public function render()
    {      
        return view('livewire.contactsettings.create');
    }
}