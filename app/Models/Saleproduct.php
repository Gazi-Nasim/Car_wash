<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleproduct extends Model
{
    use HasFactory;
    protected $fillable = [
        "sale_id",
        "product_id",
        "quantity",
        "date",
        "price"
    ];

    // function To_sale()
    // {
    //     return $this->hasMany(Sale::class, 'sale_id', 'id');
    // }
    
    function saleProduct_data()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    function product_data()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
