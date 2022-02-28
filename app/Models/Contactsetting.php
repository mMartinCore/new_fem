<?php

namespace App\Models;

use \DateTimeInterface; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Contactsetting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
    use SoftDeletes;

    public $table = 'contactsettings';

    public $orderable = [
        'id',
        'team.domain',
        'email_1',
        'phone_no_1',
        'contact_title',
        'content',
    ];

    public $filterable = [
        'id',
        'team.domain',
        'email_1',
        'phone_no_1',
        'contact_title',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'email_1',
        'email_2',
        'phone_no_1',
        'phone_no_2', 
        'google_map_1',
        'google_map_2',
        'contact_title',
        'address_1',
        'address_2',
        'content',
    ];




    

 public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }


    /**
     * Register the media collections SINGLE IMAGE
     */
    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('images')
    //          ->singleFile()
    //         ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    // }
    

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //      $this->addMediaConversion('preview')->fit('crop', 120, 120);
    //     //$this->addMediaConversion('preview')->fit('crop', 320, 120);
    //     $this->addMediaConversion('profile_view')->fit('crop', 350, 380);
    // }




    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailHeight = 400;
        $thumbnailWidth  = 400;



        // $thumbnailPreviewWidth  = 120;
        // $thumbnailPreviewHeight = 120;

        $thumbnailPreviewWidth  = 1900;
        $thumbnailPreviewHeight = 1900;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->sharpen(10);
            // ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight) 
            ->sharpen(10);
    }



    public function getBgImgContactAttribute()
    {
        $file = $this->getMedia('bg_img_contact')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumbnail');
            $file->preview   = $file->getUrl('preview_thumbnail');
        }

        return $file;
    }
  

 
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}