<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'receipt_number',
        'total_amount',
        'gross_cash',
        'mpesa',
        'net_cash',
        'room_price'
    ];
}
