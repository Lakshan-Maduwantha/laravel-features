<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Hash;

class PharmacyController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register-pharmacy');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:pharmacies',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $pharmacy = Pharmacy::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pharmacy registration successful! Please log in.');
    }
}
