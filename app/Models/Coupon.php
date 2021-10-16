<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coupon extends Model
{
    use HasFactory;

    use Notifiable;
    protected $fillable=[
        'coupon_title','coupon_code','coupon_details',
    ];
}
