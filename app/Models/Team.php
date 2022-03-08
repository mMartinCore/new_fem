<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Contactsetting;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Jetstream\Team as JetstreamTeam;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Team extends JetstreamTeam  implements HasMedia
{
    use HasFactory; 
    use SoftDeletes;
    use InteractsWithMedia;
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];
    public $orderable = [
        'domain',
        'logot_itle',
        'carousel_txt_1',
    ];

    public $filterable = [
        'domain',
        'logo_title',
        'theme_color',
        'theme_color_hover',
        'instagram_link',
        'fackbook_link',
        'whatsapp_link',
        'twitter_link',
        'content_link',
        'content_title',
        'content',
        'personal_team',
        'user_id',
        'carousel_txt_1',
        'carousel_txt_2',
        'carousel_txt_3',
        'max_number',
        'prefix',
        'virtual_number',
        'country_id',


    ];

 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'logo',
        'carousel_img_1',
        'carousel_img_2',
        'carousel_img_3',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'personal_team',
        'domain',
        'logo_title',
        'carousel_txt_1',
        'carousel_txt_2',
        'carousel_txt_3',
        'theme_color',
        'theme_color_hover',
        'instagram_link',
        'fackbook_link',
        'whatsapp_link',
        'twitter_link',
        'content',
        'content_link',
        'content_title',
        'max_number',
        'prefix',
    ];




    public function contact(){
        return $this->hasOne(Contactsetting::class);
    }

    public function country(){
        return $this->belongsTo( Country::class,'country_id');
    }


    public function registerMediaConversions(Media $media = null): void
    {


        // $thumbnailWidth  = 50;
        // $thumbnailHeight = 50;

      
        // logo
        $thumbnailHeight = 100;
        $thumbnailWidth  = 250;



        // $thumbnailPreviewWidth  = 120;
        // $thumbnailPreviewHeight = 120;

        $thumbnailPreviewWidth  = 1200;
        $thumbnailPreviewHeight = 768;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->sharpen(10);
            // ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight) 
            ->sharpen(10);
            // ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('team_logo')
            //  ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }

    
    public function getLogoAttribute()
    {
        // return $this->getMedia('team_logo')->map(function ($item) {
        //     $media = $item->toArray();
        //     $media['url'] = $item->getUrl();
        //     $media['thumbnail'] = $item->getUrl('thumbnail');
        //     $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

        //     return $media;
        // });

        $file = $this->getMedia('team_logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumbnail');
            $file->preview   = $file->getUrl('preview_thumbnail');
        }

        return $file;
    }

    public function getCarouselImg1Attribute()
    {
             //   vteam_carousel_img_1
            $file = $this->getMedia('carousel_img_1')->last();

            if ($file) {
                $file->url       = $file->getUrl();
                $file->thumbnail = $file->getUrl('thumbnail');
                $file->preview   = $file->getUrl('preview_thumbnail');
            }
    
            return $file;
    }

    public function getCarouselImg2Attribute()
    {
        // team_carousel_img_2
            $file = $this->getMedia('carousel_img_2')->last();

            if ($file) {
                $file->url       = $file->getUrl();
                $file->thumbnail = $file->getUrl('thumbnail');
                $file->preview   = $file->getUrl('preview_thumbnail');
            }
    
            return $file;
    }

    public function getCarouselImg3Attribute()
    {
          // team_carousel_img_3
          $file = $this->getMedia('carousel_img_3')->last();

          if ($file) {
              $file->url       = $file->getUrl();
              $file->thumbnail = $file->getUrl('thumbnail');
              $file->preview   = $file->getUrl('preview_thumbnail');
          }
  
          return $file;
  }
    

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }










    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];
}
