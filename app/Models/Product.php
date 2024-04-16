<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "purchase_price",
        "mrp"
    ];

    function product_data()
    {
        return $this->hasMany(Saleproduct::class);
    }
}
