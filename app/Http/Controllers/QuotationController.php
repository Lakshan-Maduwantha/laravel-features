<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Prescription;

class QuotationController extends Controller
{
    public function create(Request $request, Prescription $prescription)
    {
        $request->validate([
            'quotation_amount' => 'required|numeric|min:0',
            'terms' => 'nullable|string|max:255',
        ]);

        $quotation = Quotation::create([
            'prescription_id' => $prescription->id,
            'quotation_amount' => $request->quotation_amount,
            'terms' => $request->terms,
            // Add more fields as needed
        ]);

        $prescription->user->quotation()->save($quotation);
        Mail::to($prescription->user->email)->send(new QuotationCreated($prescription->user, $prescription, $quotation));

        return redirect()->route('index')->with('success', 'Quotation created successfully!');
    }

    public function accept(Request $request, Prescription $prescription)
    {
        $quotation = Quotation::findOrFail($request->quotation_id);
        $quotation->update(['status' => 'accepted']);
        // Update prescription status or perform any other actions

        return redirect()->back()->with('success', 'Quotation accepted successfully!');
    }

    public function reject(Request $request, Prescription $prescription)
    {
        $quotation = Quotation::findOrFail($request->quotation_id);
        $quotation->update(['status' => 'rejected']);
        // Update prescription status or perform any other actions

        return redirect()->back()->with('success', 'Quotation rejected successfully!');
    }

    // Add more methods as needed
}
