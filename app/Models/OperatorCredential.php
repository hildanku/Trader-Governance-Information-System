<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OperatorCredential extends Authenticatable
{
    use HasFactory;

    protected $table = 'operatorCredentials';
    protected $fillable = ['fullname', 'username', 'email', 'password'];
    protected $hidden = [
        'password',
    ];
}

