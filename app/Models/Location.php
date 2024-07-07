<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = ['locationCode', 'locationDescription', 'locationLatitude', 'locationLongitude', 'areaId'];

    // relation to area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
