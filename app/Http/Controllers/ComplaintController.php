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

    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('cedit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::find($id);
        $complaint->name = $request->name;
        $complaint->type = $request->type;
        $complaint->description = $request->description;
        $complaint->resolve = $request->resolve;
        $complaint->budget = $request->budget;
        $complaint->update();

        return redirect()->to('/complaints');
    }

    public function delete(Request $request)
    {
        $deleteComplaint = Complaint::find($request->id);
        $deleteComplaint->delete();
        return redirect()->to('/complaints');
    }
}
