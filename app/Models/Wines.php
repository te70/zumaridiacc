<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wines extends Model
{
    use HasFactory;

    protected $fillable = [
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
