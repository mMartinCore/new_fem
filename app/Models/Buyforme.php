<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buyforme extends Model
{
    use HasFactory;

    public const BUY_FORME_FEE=25;

    protected $table = 'buyformes';

    protected $fillable = [
        'user_id',
        'team_id',
        'payment_id',
        'name',
        'link',
        'piece',
        'status',
        'description',
        'reference',
    ];

    public function payment()
    {
        return $this->belongsTo( Payment::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

   
    

    // public function getStatus()
    // {
    //     if ($this->status == 'Unpaid') {
    //         return   '<span class="px-2 text-gray-200 bg-yellow-200 ">Pending</span>';
    //     } elseif ($this->status == 'Paid') {
    //         return '<span class="px-2 text-gray-200 bg-green-200">Approved</span>';
    //     }  
    // }
}