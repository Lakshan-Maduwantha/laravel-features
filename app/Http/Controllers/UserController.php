<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'dob' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
