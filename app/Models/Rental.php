<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'house_number',
        'elec_prev',
        'elec_curr',
        'elec_consump',
        'elec_total',
        'water_prev',
        'water_curr',
        'water_consump',
        'water_total',
        'total_bills',
        'total_due',
        'rent',
        'arrears',
    ];

   
}
