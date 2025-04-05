<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table ="invoice";
    protected $fillable =[
        "invoice_no",
        "company_name",
        "itemName",
        "totalTime",
        "TotalAmount",
        "TotalAmountGST",
        "paymentMode"
    ];
}
