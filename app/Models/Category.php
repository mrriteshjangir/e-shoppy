<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory;

    use Notifiable;
    
    protected $fillable=[
        'category_title','category_slug','category_details',
    ];
}
