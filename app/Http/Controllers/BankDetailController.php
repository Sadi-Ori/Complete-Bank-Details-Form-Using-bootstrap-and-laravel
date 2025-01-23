<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class BankDetailController extends Controller
{
    public function create()
    {
        return view('bank_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'branch' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);
        BankDetail::create([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'branch' => $request->branch,
            'address' => $request->address,
        ]);
        return redirect()->route('bank-details.create')->with('success', 'Bank details saved successfully!');
    }
}
