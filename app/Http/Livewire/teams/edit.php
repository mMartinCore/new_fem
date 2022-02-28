<?php

namespace App\Http\Livewire\teams;

use App\Models\Team;
use Livewire\Component; 
use Livewire\WithFileUploads;


class edit extends Component
{ 
    use WithFileUploads;
   
    protected Team $model_data;
  
    public $modelId;
  
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

    public  $logo;
    public  $carousel_img_1;
    public  $carousel_img_2;
    public  $carousel_img_3;

    
    public  $prefix;
    public  $virtual_number;    
    public  $max_number;

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
            'logo' => 'image|nullable|max:1999', 
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
            'carousel_img_1' => 'image|nullable|max:1999', 
            'carousel_txt_2' => 'nullable|string|min:3|max:180', 
            'carousel_img_2' => 'image|nullable|max:1999', 
            'carousel_text_3' => 'nullable|string|min:3|max:180', 
            'carousel_img_3' => 'image|nullable|max:1999', 

            'virtual_number' => 'integer|string|min:1|max:9',
            'prefix' => 'nullable|string|min:1|max:4', 
            'max_number' => 'integer|string|min:1|max:9',  

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
        $this->domain = $data->domain;
        $this->logo_title = $data->logo_title;
        $this->team_logo = $data->logo;
        $this->theme_color = $data->theme_color;
        $this->theme_color_hover = $data->theme_color_hover;
        $this->instagram_link = $data->instagram_link;
        $this->fackbook_link = $data->fackbook_link;
        $this->whatsapp_link = $data->whatsapp_link;
        $this->twitter_link = $data->twitter_link;
        $this->content_link = $data->content_link;
        $this->content_title = $data->content_title;
        $this->content = $data->content;
        $this->carousel_txt_1 = $data->carousel_txt_1;
        $this->team_carousel_img_1 = $data->carousel_img_1;
        $this->carousel_txt_2 = $data->carousel_txt_2;
        $this->team_carousel_img_2 = $data->carousel_img_2;
        $this->carousel_text_3 = $data->carousel_text_3;
        $this->team_carousel_img_3 = $data->carousel_img_3; 

        $this->prefix = $data->prefix;
        $this->virtual_number = $data->virtual_number;
        $this->max_number = $data->max_number;

        // dd($data->carousel_img_1->getUrl('preview_thumbnail'));

    }


    public function updateData()
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

                'prefix' => $this->prefix,
                'virtual_number' => $this->virtual_number,
                'max_number' => $this->max_number,
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

                    'prefix' => $this->prefix,
                    'virtual_number' => $this->virtual_number,
                    'max_number' => $this->max_number,

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
       $update = Team::findOrfail($this->modelId);
       $update->update($this->updateData());
       


       if($this->logo!=null && isset($this->logo)){  

            $update->addMedia($this->logo->getRealPath())->toMediaCollection('team_logo');  
            
            if ( isset($this->team_logo->logo)) {
                $this->team_logo->logo->delete();
            }  
        }

        if($this->carousel_img_1!=null && isset($this->carousel_img_1)){         
            $update->addMedia($this->carousel_img_1->getRealPath())->toMediaCollection('carousel_img_1');   
            if (  isset($this->team_carousel_img_1->carousel_img_1)) {
                $this->team_carousel_img_1->carousel_img_1->delete();
            }  

        }
        if($this->carousel_img_2!=null && isset($this->carousel_img_2)){         
            $update->addMedia($this->carousel_img_2->getRealPath())->toMediaCollection('carousel_img_2');    
            if ( isset($this->team_carousel_img_2->carousel_img_2)) {
                $this->team_carousel_img_2->carousel_img_2->delete();
            } 
        }
        if($this->carousel_img_3!=null && isset($this->carousel_img_3)){         
            $update->addMedia($this->carousel_img_3->getRealPath())->toMediaCollection('carousel_img_3');   
            if ( isset($this->team_carousel_img_3->carousel_img_3)) {
                $this->team_carousel_img_3->carousel_img_3->delete();
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

       session()->flash('message', 'Client  successfully updated.');     
        
       return redirect()->route('teams.index');

    }



     public function mount(Team $team)
    {
        
        $this->model_data = $team;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
 
        return view('livewire.teams.edit');
    }
}