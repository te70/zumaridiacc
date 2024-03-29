<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index(){
        $staffs = Staff::all();
        return view('staff', compact('staffs'));
    }

    public function store(Request $request){
        $staff = new Staff();
        $staff->staff_type = $request->staff_type;
        $staff->shift = $request->shift;
        $staff->first_name =$request->first_name;
        $staff->last_name = $request->last_name;
        $staff->contact_number = $request->contact_number;
        $staff->id_type = $request->id_type;
        $staff->id_number = $request->id_number;
        $staff->residential_address = $request->residential_address;
        $staff->salary = $request->salary;
        $staff->save();

        return redirect('/staff');
    }

    public function view($id)
    {
        $staff = Staff::find($id);
        return view('staffhist', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('staffedit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->contact_number = $request->contact_number;
        $staff->shift = $request->shift;
        $staff->residential_address = $request->residential_address;
        $staff->update();

        return redirect()->to('/staff');
    }

    public function delete(Request $request)
    {
        $deleteStaff = Staff::find($request->id);
        $deleteStaff->delete();
        return redirect()->to('/staff');
    }
}
