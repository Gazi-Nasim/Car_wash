<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "vehicle_id",
        "name",
        "price",
    ];

    function vehicle_name()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
    function saleTbl()
    {
        return $this->hasMany(Sale::class);
    }
    
}
