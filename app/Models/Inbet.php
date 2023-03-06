<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbet extends Model
{
    use HasFactory;

    protected $fillable = [
        'cashier_1',
        'cashier_2',
        'total_cash'
     ];
}
