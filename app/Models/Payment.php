<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'amount',
        'currency',
        'description',
        'status',
        'payment_mode', 
        'payment_id',
        'team_id',
    ];







    
    public function package()
    {
        return $this->belongsToMany(Package::class, 'packages_payments');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    

}
