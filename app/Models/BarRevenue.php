<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarRevenue extends Model
{
    use HasFactory;

    protected $filable = [
        'expenses',
        'gross_cash',
        'mpesa',
        'net_cash'
    ];
}
