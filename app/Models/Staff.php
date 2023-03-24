<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_type',
        'shift',
        'first_name',
        'last_name',
        'contact_number',
        'id_type',
        'id_number',
        'residential_address',
        'salary'

    ];
}
