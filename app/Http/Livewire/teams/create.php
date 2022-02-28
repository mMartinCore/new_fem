<?php

namespace App\Http\Livewire\teams;

use App\Models\Team;
use Livewire\Component; 
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

    public  $name;
    public  $domain;
    public  $logo_title;
    public  $team_logo;
    public  $theme_color;
    public  $theme_color_hover;
    public  $instagram_link;
    public  $fackbook_link;
    public  $whatsapp_link;
    public  $twitter_link;
    public  $content_link;
    public  $content_title;
    public  $content;
    public  $carousel_txt_1;
    public  $team_carousel_img_1;
    public  $carousel_txt_2;
    public  $team_carousel_img_2;
    public  $carousel_text_3;
    public  $team_carousel_img_3;
    public  $personal_team;
    public  $var21; 
    public $images;

    
    public  $prefix;
    public  $virtual_number;    
    public  $max_number;
    
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
              
            'logo_title' => 'nullable|string|min:3|max:250',
            'name' => 'required|string|max:30',
            'domain' => 'required|string|min:3|max:30',
            'team_logo' => 'image|nullable|max:1999', 
            'theme_color' => 'nullable|string|min:3|max:100',
            'theme_color_hover' => 'nullable|string|min:3|max:100',  
            'instagram_link' => 'nullable|string|min:3|max:100',   
            'fackbook_link' => 'nullable|string|min:3|max:100',   
            'whatsapp_link' => 'nullable|string|min:3|max:100',
            'twitter_link' => 'nullable|string|min:3|max:100',  
            'content_link' => 'nullable|string|min:3|max:150000',   
            'content_title' => 'nullable|string|min:3|max:100',   
            'content' => 'nullable|string|min:3|max:500', 
            'carousel_txt_1' => 'nullable|string|min:3|max:180',   
            'team_carousel_img_1' => 'image|nullable|max:1999', 
            'carousel_txt_2' => 'nullable|string|min:3|max:180', 
            'team_carousel_img_2' => 'image|nullable|max:1999', 
            'carousel_text_3' => 'nullable|string|min:3|max:180', 
            'team_carousel_img_3' => 'image|nullable|max:1999',  
            
            'virtual_number' => 'integer|string|min:1|max:9',
            'prefix' => 'nullable|string|min:1|max:4', 
            'max_number' => 'integer|string|min:1|max:9',  
     
        

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
                'domain' => $this->domain,
                'logo_title' => $this->logo_title, 
                'theme_color' => $this->theme_color, 
                'theme_color_hover' => $this->theme_color_hover,
                'instagram_link' => $this->instagram_link,
                'fackbook_link' => $this->fackbook_link,
                'whatsapp_link' => $this->whatsapp_link,
                'twitter_link' => $this->twitter_link, 
                'content_link' => $this->content_link,
                'content_title' => $this->content_title,
                'content' => $this->content,
                'carousel_txt_1' => $this->carousel_txt_1, 
                'carousel_txt_2' => $this->carousel_txt_2, 
                'carousel_text_3' => $this->carousel_text_3, 
                'user_id' => auth()->user()->id,
                'personal_team' => false,

                'prefix' => $this->prefix,
                'virtual_number' => $this->virtual_number,
                'max_number' => $this->max_number,
            ];
    }

  
    public function create()
    {  
       $this->validate();

       $dataInfo = auth()->user()->ownedTeams()->create( $this->modelData() ); 
    // Team::create($this->modelData());  
                     
       if($this->team_logo!=null && isset($this->team_logo)){         
          $dataInfo->addMedia($this->team_logo->getRealPath())->toMediaCollection('team_logo');    
       }
       if($this->team_carousel_img_1!=null && isset($this->team_carousel_img_1)){         
         $dataInfo->addMedia($this->team_carousel_img_1->getRealPath())->toMediaCollection('carousel_img_1');    
     }
     if($this->team_carousel_img_2!=null && isset($this->team_carousel_img_2)){         
        $dataInfo->addMedia($this->team_carousel_img_2->getRealPath())->toMediaCollection('carousel_img_2');    
     }
     if($this->team_carousel_img_3!=null && isset($this->team_carousel_img_3)){         
        $dataInfo->addMedia($this->team_carousel_img_3->getRealPath())->toMediaCollection('carousel_img_3');    
     }
      
       session()->flash('message', 'Client  successfully created.');  
       $this->emit('setTeamId',  $dataInfo->id);    
    //    return redirect()->route('teams.index');

    }

   
    public function render()
    {      
        return view('livewire.teams.create');
    }
}