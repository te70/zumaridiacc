<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $usercreate = new User();
        $usercreate->name = $request->name;
        $usercreate->email = $request->email;
        $usercreate->password = Hash::make($request->password);
        $usercreate->save();

        return redirect()->to('/users');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function update(Request $request)
    {
        $updateUser = User::find($request->id);
        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->password = Hash::make($request->password);
        $updateUser->update();

        return redirect()->to('/settings');
    }
}
