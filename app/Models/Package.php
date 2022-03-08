<?php

namespace App\Models;

use App\Models\Payment;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Packagestatus;


class Package extends Model  implements HasMedia
{
    use HasFactory;   
    use InteractsWithMedia;
 
 

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

  
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $casts = [
        // 'estimate_date' => 'date:Y-m-d',
        // 'handover_date' => 'date:Y-m-d H:i:s',
    ];


    protected $fillable = [
        'name', 
        'courier',
        'courier_status',
        'packagestatus_id',
        'package_id',   
        'tracking_number',
        'payment_mode',
        'quantity',
        'payment_status',
        'status',
        'package_status_date',
        'price',
        'weight',
        'length',
        'width',
        'height',
        'description',
        'created_at',
        'destination',
        'handovername',
        'handover_date', 
        'category_id',
        'estimate_date',
        // 'updated_at', 
        'user_id',
        'team_id',

       //invoice 
    ];

      public static function boot(){
        parent::boot();
        static::creating(function($model){
        
         $team = Team::findorfail(auth()->user()->team_id);
        
         $model->package_id = $team->prefix.str_pad($team->max_number + 1, 6, '0', STR_PAD_LEFT);
         $team->increment('max_number');

        });
 }


 

   public function user(){
         return $this->belongsTo(User::class);
   }
   public function paid(){
       return  $this->payment()->first();
   }
   
   public function payment()
   {
       return $this->belongsToMany( Payment::class, 'packages_payments')->withPivot( 'payment_id');
   }

    public function packages()
    {
        return $this->belongsTo(Package::class, 'packages');
    }
    public function merge(){
        return $this->belongsToMany( Package::class, 'packages_merges')->withPivot( 'package_id');
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function packagestatus(){
        return  $this->belongsTo(Packagestatus::class);
    }

    public function dimension(){

        $width  = $this->width  ?? 0;
        $height = $this->height ?? 0;
        $length = $this->length ?? 0;

        return  $width * $height *  $length; 

    }

    public function dimensionWeight( $courier_dim_weight = 5000 ){
               $dimension= $this->dimension();
             return $dimension / $courier_dim_weight;
    }


    public function registerMediaConversions(Media $media = null): void
    {


        // $thumbnailWidth  = 50;
        // $thumbnailHeight = 50;

      
        // logo
        $thumbnailHeight = 800;
        $thumbnailWidth  = 550;



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
        $this->addMediaCollection('invoice')
            //  ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif','application/pdf']);

            $this->addMediaCollection('confirmation_photo')
            //  ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }


    public function getConfirmationPhotoAttribute()
    {
 
        $file = $this->getMedia('confirmation_photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumbnail');
            $file->preview   = $file->getUrl('preview_thumbnail');
        }

        return $file;
    }
    

    public function getInvoiceAttribute()
    {
 
        $file = $this->getMedia('invoice')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumbnail');
            $file->preview   = $file->getUrl('preview_thumbnail');
        }

        return $file;
    }



}
