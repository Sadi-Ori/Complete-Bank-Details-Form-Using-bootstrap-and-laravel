<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use Illuminate\Http\Request;

class BankDetailController extends Controller
{
    // Store bank details
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'branch' => 'required|string',
            'address' => 'required|string',
        ]);

        BankDetail::create($validated);

        return redirect()->route('bank-details.index');
    }

    // Edit bank details
    public function edit($id)
    {
        $bankDetail = BankDetail::findOrFail($id);
        return view('bank-details.edit', compact('bankDetail'));
    }

    // Update bank details
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'branch' => 'required|string',
            'address' => 'required|string',
        ]);

        $bankDetail = BankDetail::findOrFail($id);
        $bankDetail->update($validated);

        return redirect()->route('bank-details.index');
    }

    // Index of Bank Details
    public function index()
{
    $bankDetails = BankDetail::all();
    return view('bank-details.index', compact('bankDetails'));
}
}
