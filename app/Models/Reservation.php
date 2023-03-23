<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'room_price',
        'check_in_date',
        'check_out_date',
        'number_of_days',
        'first_name',
        'last_name',
        'contact_number',
        'contact_type',
        'id_number',
        'total_price'
    ];
}
