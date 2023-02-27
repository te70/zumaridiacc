<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbet extends Model
{
    use HasFactory;

    protected $fillable = [
        'mpesa',
        'cash'
     ];
}
