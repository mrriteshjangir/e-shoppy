<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Size extends Model
{
    use HasFactory;

    use Notifiable;
    protected $fillable=[
        'size_title','size_unit','size_details',
    ];
}

