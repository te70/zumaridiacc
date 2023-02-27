<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'open',
        'add',
        'total',
        'close',
        'difference',
        'price',
        'total_amount',
        'expenses',
        'gross_cash',
        'mpesa',
        'net_cash'
    ];
}
