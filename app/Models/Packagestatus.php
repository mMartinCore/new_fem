<?php

namespace App\Models;

use App\Models\User;
use App\Models\Merge;
use App\Models\Package;
use Laravel\Jetstream\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packagestatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'user_id', 'team_id',
    ];
public const STATUS_PENDING= 1;//'Pending';
public const STATUS_RECEIVED=2;// 'Received';
public const STATUS_INTRANSIT=3;//'Intransit';
public const STATUS_PENDING_QUOTE=4;//'Pending Quote'; 
public const STATUS_READY_FOR_PICKUP=5;//'Ready for Pickup';
public const STATUS_DELIVERED=6;//'Delivered';

    public function merges()
    {
        return $this->hasMany(Merge::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

}
