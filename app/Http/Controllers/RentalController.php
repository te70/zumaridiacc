<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Staff;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        $staffs = Staff::all();
        return view('rentals', compact('staffs', 'rentals'));
    }

    public function tenant(Request $request)
    {
        if($request->hasfile('id_front'))
            {
                foreach($request->file('id_front') as $image)
                {
                    $id_front= base64_encode(Carbon::now()).$image->getClientOriginalName();
                    $image->move(public_path('images/'),$id_front);
                }
            }
        
            if($request->hasfile('id_back'))
            {
                foreach($request->file('id_back') as $image)
                {
                    $id_back= base64_encode(Carbon::now()).$image->getClientOriginalName();
                    $image->move(public_path('images/'),$id_back);
                }
            }

        $tenant = new Tenant();
        $tenant->first_name = $request->first_name;
        $tenant->last_name = $request->last_name;
        $tenant->contact = $request->contact;
        $tenant->id_front = $id_front;
        $tenant->id_back = $id_back;
        $tenant->save();

        return redirect()->to('/rentals');
    }

    public function house(Request $request)
    {
        $house = new Rental();
        $house->house_number = $request->house_number;
        $house->save();

        return redirect()->to('/rentals');
    }
}
