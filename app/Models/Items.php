<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = "items";

    protected $fillable = [
        "invoiceno","description","note","quantity","rate","amount","user_id"
    ];
}
