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
        $tenants = Tenant::all();
        return view('rentals', compact('staffs', 'rentals', 'tenants'));
    }

    public function tenant(Request $request)
    {
        $tenant = new Tenant();
        $tenant->first_name = $request->first_name;
        $tenant->last_name = $request->last_name;
        $tenant->contact = $request->contact_number;
        $tenant->id_front = $request->id_front;
        $tenant->id_back = $request->id_back;
        $tenant->save();

        return redirect()->to('/rentals');
    }

    public function house(Request $request)
    {
        $house = new Rental();
        $house->house_number = $request->house_number;
        $house->rent = $request->rent;
        $house->save();

        return redirect()->to('/rentals');
    }

    public function tenantView()
    {
        $tenants = Tenant::all();

        return view('tenants', compact('tenants'));
    }

    public function bills(Request $request)
    {  
        $bills = Rental::find($request->house_id);
        $elec_consump = $request->elec - $bills->elec_prev;
        $elec_price = 33.3;
        $elec_total = $elec_consump * $elec_price;
        $water_consump = $request->water - $bills->water_prev;
        $water_price = 5;
        $water_total = $water_consump * $water_price;
        $total_bills = $elec_total + $water_total;
        $total_due = $bills->rent + $total_bills;

        $bills->elec_curr = $request->elec;
        $bills->water_curr = $request->water;
        $bills->elec_consump = $elec_consump;
        $bills->elec_total = $elec_total;
        $bills->water_consump = $water_consump;
        $bills->water_total =$water_total;
        $bills->total_bills = $total_bills;
        $bills->total_due = $total_due;
        $bills->update();

        return redirect()->to('/rentals');
    }

    public function rent(Request $request)
    {
        $rent = Rental::find($request->house_id);
        $rent->tenant_id = $request->tenant_id;
        $rent->update();

        return redirect()->to('/rentals');
    }

    public function show($id)
    {
        $tenant = Tenant::find($id);
        return view('tenantshow', compact('tenant'));
    }

}
