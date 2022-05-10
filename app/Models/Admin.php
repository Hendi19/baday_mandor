<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admin";

    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'role', 'email', 'password','token', 'status',
    ];

    protected $hidden = [
        'password', 'token',
    ];
}