<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\BarRevenue;
use App\Models\PlayStation;
use App\Models\Inbet;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Staff;
use App\Models\Wines;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        $winesRevenue = Revenue::whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('net_cash');
        $barRevenue = BarRevenue::whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('net_cash');
        $psRevenue = PlayStation::whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('net_cash');
        $ibRevenue = Inbet::whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('net_cash');
        $roomRevenue = Reservation::whereBetween('created_at', [$weekStartDate, $weekEndDate])->sum('total_price');
        $rooms = Room::all();
        $reservations = Reservation::all();
        $staff = Staff::all();
        $bookedRooms = Reservation::all()->where('check_in_date', '>=', $now && 'check_out_date', '<=', $now);
        $wines = Wines::all();
        $users = User::all();
        // $winesChart = Revenue::select('id', 'created_at')
        //                 ->get()
        //                 ->groupBy(function($date) {
        //                 return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by date
        //             });
        // $labels = [];
        // $data = [];
        // foreach($winesChart as $key=>$group){
        //     $labels[] = $key;
        //     $data[] = $group->count();
        // }
        return view('dashboard', compact('rooms', 'reservations', 'staff', 'wines','bookedRooms','winesRevenue', 'barRevenue', 'psRevenue', 'ibRevenue', 'roomRevenue', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
