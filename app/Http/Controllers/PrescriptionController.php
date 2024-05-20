<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\User;


class PrescriptionController extends Controller
{
    
    public function index()
    {
        $prescriptions = Prescription::with('user')->latest()->paginate(10); // Fetch prescriptions with user information
        return view('index', compact('prescriptions'));
    }


    public function showUploadForm()
    {
        return view('dashboard');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'prescription_images.*' => 'required|image|max:2048', // Max file size 2MB
            'notes' => 'nullable|string|max:255',
            'delivery_address' => 'nullable|string|max:255',
            'delivery_time_slot' => 'required|string|in:09:00-11:00,11:00-13:00', // Add more time slots if needed
        ]);

        $user = auth()->user(); // Get the authenticated user

        foreach ($request->file('prescription_images') as $image) {
            $imagePath = $image->store('prescriptions', 'public'); // Store image in public/prescriptions directory
            Prescription::create([
                'user_id' => $user->id,
                'image_path' => $imagePath,
                'notes' => $request->notes,
                'delivery_address' => $request->delivery_address,
                'delivery_time_slot' => $request->delivery_time_slot,
            ]);
        }

        return redirect()->back()->with('success', 'Prescription uploaded successfully!');
    }
}
