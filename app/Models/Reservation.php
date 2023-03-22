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
        'first_name',
        'last_name',
        'contact_number',
        'id_card_type',
        'id_number'
    ];
}
