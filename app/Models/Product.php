<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;

    use Notifiable;
    protected $fillable=[
        'product_name','product_slug','product_brand','category_id','product_model','product_details','product_keywords','product_tech_speci','product_uses','prooduct_warranty',
    ];
}
