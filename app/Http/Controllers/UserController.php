<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function create()
    {
        return view('create-user');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user with hashed password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password before storing it
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }
}
