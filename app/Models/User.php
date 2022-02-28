<?php

namespace App\Models;

use App\Mail\register;
use App\Models\Country;
use App\Models\Package;
use App\Models\Buyforme;
use Laravel\Cashier\Billable;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
 
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable  implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use InteractsWithMedia;
    use Billable;
    use HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password','phone','team_id','address','country_name',
        'line1', 'line2', 'city', 'state', 'country_id', 'postal_code','virtual_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public static function  boot() {
        parent::boot();

        self::updated(function ($model) {
           
           
   
          });
          

          static::created(function($model){
      
            //   dd($team->prefix.str_pad($team->virtual_number + 1, 6, '0', STR_PAD_LEFT)); 
   
           });

        // $this->addGlobalScope('team', function ($builder) {
        //     // $builder->where('team_id', session('client_team')); 
        // });
    }

 

    public function buyforme()
    {
        return $this->hasMany( Buyforme::class );   
    }


    public function package(){

        return $this->hasMany(Package::class);
    }

    public function country(){
        return $this->belongsTo( Country::class,'country_id');
    }
    public function invoiceCount()
    {
         
        $count =null;

           $count  = DB::table('packages')
            ->join('users', 'packages.user_id','users.id')   
            ->where('packages.user_id',auth()->user()->id)
            ->where('packages.payment_status','=','Unpaid')
            ->where('packages.price','>',0) 
            ->select(   DB::raw('count(packages.id) as count'))->count('packages.id'); 
    // dd($count);    







//         $count  = DB::table('packages')
//         ->join('users', 'packages.user_id','users.id')
//         ->join('packages_payments', 'packages.id', 'packages_payments.package_id') 
//         ->join('payments', 'payments.id','packages_payments.payment_id')
        
//         ->where('packages_payments.payment_id',null)
//         ->where('packages_payments.package_id',null)


//         ->where('packages.user_id',auth()->user()->id)
//         ->where('packages.price','>',0)
//         ->select('packages.price' ) ->sum('packages.price'); ; 
//         // ->select(   DB::raw('count(packages.price) as count')  ) ->count('packages.price'); 
//  dd($count);    

            // $count  = DB::table('payments')
            // ->join('packages_payments', 'payments.id','packages_payments.payment_id')
            // ->join('packages', 'packages_payments.package_id','packages.id')
            // // ->join('users', 'packages.user_id','users.id') 

            // ->where('packages_payments.payment_id',null)
            // ->where('packages_payments.package_id',null)


            // // ->where('packages.user_id',auth()->user()->id)
            // // ->where('packages.price','>',0)
            // ->select('packages.price' ) ->sum('packages.price'); ; 
            // // ->select(   DB::raw('count(packages.price) as count')  ) ->count('packages.price'); 
            // dd($count);  

        return  $count;
    }



    public function mergeCount()
    {
            
            $count =null; 
            $count  = DB::table('merges') 
            ->join('users', 'merges.user_id','users.id')  
            ->join('merges_packages', 'merges.id','merges_packages.merge_id')
                ->join('packages', 'merges_packages.package_id','packages.id') 
            // ->where('packages.user_id',auth()->user()->id)
            ->where('merges.user_id',auth()->user()->id) 
            ->select(   DB::raw('count(merges.id) as count'))->distinct()->count('merges.id'); 
        
        return  $count;
    }


    public function balance()
    {        
        $balance = 0;

        foreach ($this->package as $package) {  
                if ( $package->payment_status !="paid"  ) {
                    $balance += $package->price*$package->quantity;
                }
          
        }
        return  $balance;

    }






   
    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }
    
    ////////////////////////////////////////////////////////////////////////

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getBgImgAttribute()
    {
        return $this->getMedia('bg_img')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }
 
}
