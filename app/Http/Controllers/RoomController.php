<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(){
        $products = Room::all();
        return view('rooms', compact('products'));
    }

    public function manage(){
        return view('mrooms');
    }
}
