<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBusiness extends Model
{
    use HasFactory;

    protected $table = 'userBusiness';

    protected $fillable = [
        'userId',
        'businessName',
        'businessType',
        'businessOwner',
        'businessContactNumber',
        // 'businessPhoto',
    ];
}
