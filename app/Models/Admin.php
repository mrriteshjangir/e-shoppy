<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $fillable=[
        'name','email','mobile','password',
    ];

    protected $hidden=[
        'password','remember_token'
    ];

    // protected $casts=[
    //     'account_creation_date'=>'datetime'
    // ];
}