<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'userDetails';
    protected $fillable = ['userId', 'gender', 'address', 'homePhoneNumber'];
}
