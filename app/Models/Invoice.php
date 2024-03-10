<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    protected $fillable = [
        'invoiceno',
        'invoicedate',
        'invoice_suffix',
        'companyname',
        'customername',
        'cadd',
        'cemail',
        'customername',
        'cgstin',
        'custadd',
        'custemail',
        'custgstin',
        'amount',
        'taxamount',
        'tax',
        'totalamount',
        'balance',
        'user_id'
    ];


}
