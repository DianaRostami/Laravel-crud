<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function create()
    {
        return view('UserForm');
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }
}
