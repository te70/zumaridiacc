<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index()
    {   
        $complaints = Complaint::all();
        return view('complaints', compact('complaints'));
    }

    public function store(Request $request)
    {
        $complaint = new Complaint();
        $complaint->name = $request->name;
        $complaint->type = $request->type;
        $complaint->description = $request->description;
        $complaint->resolve = $request->resolve;
        $complaint->budget = $request->budget;
        $complaint->save();

        return redirect()->to('/complaints');
    }
}
