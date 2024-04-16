<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "service_id",
        "employee_id",
        "name",
        "phone",
        "address",
        "photo",
        "invoiceID",
        "price",
        "invoice_date",
    ];

    function service_name()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    function service_data()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    function employee_name()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    // function saleProduct_data()
    // {
    //     return $this->belongsTo(Saleproduct::class, 'id', 'sale_id');
    // }
}
