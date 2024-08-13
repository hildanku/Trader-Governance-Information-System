<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCredential extends Authenticatable
{
    use HasFactory;

    protected $table = 'userCredentials';
    protected $fillable = ['fullname', 'username', 'email', 'password'];
    protected $hidden = ['password'];
}
