<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayStation extends Model
{
    use HasFactory;

    protected $fillable = [
       'games_played',
       'soda_sold',
       'sweets_sold',
       'cash',
       'expenses',
       'net_cash'
    ];
}
