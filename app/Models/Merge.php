<?php

namespace App\Models;

use App\Models\Team;
use App\Models\User;
use App\Models\Package;
use Webpatser\Uuid\Uuid;
use App\Models\Packagestatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merge extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'package_status_date',
        'packagestatus_id',

        'payment_id',   
        'user_id',
        'team_id',
    ];

    public static function boot()
    {
        parent::boot(); 
        //UUI generate uuid
        self::creating(function ($model) { 
            $model->uuid = (string) Uuid::generate(); 
          });
         
      
          self::saving(function ($model) {
           //   $model->updated_at = now();
          });          
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packagestatus()
    {
        return $this->belongsTo(Packagestatus::class, 'packagestatus_id');
    }
        
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'merges_packages');
    }

}
