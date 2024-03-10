<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditnote extends Model
{
    use HasFactory;

    protected $table = 'creditnote';

    protected $fillable = [
        'date',
        'creditno',
        'onaccountrecd',
        'cgst',
        'sgst',
        'igst',
        'netamount',
        'remark'

    ];
    
}
