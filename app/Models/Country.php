<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'icon',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

 

}
