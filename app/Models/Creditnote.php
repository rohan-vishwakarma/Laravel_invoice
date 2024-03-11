<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditnote extends Model
{
    use HasFactory;

    protected $table = 'creditnote';

    protected $fillable = [
        'invoiceno',
        'credit_date',
        'credit_no',
        'on_account_received',
        'cgst',
        'sgst',
        'igst',
        'net_amount',
        'remark',
        'invoice_id'

    ];
    
}
