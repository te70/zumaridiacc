<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(){
        $products = Room::all();
        return view('rooms', compact('products'));
    }

    public function manage(){
        $rooms = Room::all();
        return view('mrooms', compact('rooms'));
    }

    public function addRooms(Request $request){
        $room_price = '';

        if($request->room_type == 'economy'){
            $room_price = '500';
        } else if($request->room_type == 'double_bed'){
            $room_price ='800';
        } else if($request->room_type == 'executive'){
            $room_price = '1000';
        } else{
            $room_price = 'NA';
        }

        $addRooms = new Room();
        $addRooms->room_number = $request->room_number;
        $addRooms->room_type = $request->room_type;
        $addRooms->room_price = $room_price;
        $addRooms->save();

        return redirect('/rooms/manage');
    }

    public function reserveRoom(Request $request){
        $reserveRoom = new Reservation();
        $reserveRoom->room_type = $request->room_type;
        $reserveRoom->room_number = $request->room_number;
        $reserveRoom->check_in_date = $request->check_in_date;
        $reserveRoom->check_out_date = $request->check_out_date;
        $reserveRoom->number_of_days = $request->number_of_days;
        $reserveRoom->room_price = $request->price_per_day;
        $reserveRoom->total_price = $request->total_price;
        $reserveRoom->first_name = $request->first_name;
        $reserveRoom->last_name = $request->last_name;
        $reserveRoom->contact_number = $request->contact_number;
        $reserveRoom->contact_type = $request->contact_type;
        $reserveRoom->id_number = $request->id_number;
        $reserveRoom->save();

        return response(200);
    }
}
