<?php

namespace App\Http\Controllers;

   use App\Models\BankDetail;
   use Illuminate\Http\Request;

   class BankDetailController extends Controller
   {
       public function index()
       {
           $bankDetails = BankDetail::all();
           return view('bank-details.index', compact('bankDetails'));
       }

       public function create()
       {
           return view('bank-details.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'bank_name' => 'required',
               'account_number' => 'required',
               'branch' => 'required',
               'address' => 'required',
           ]);

           BankDetail::create($request->all());

           return redirect()->route('bank-details.index')->with('success', 'Bank Detail Created Successfully');
       }

       public function edit($id)
       {
           $bankDetail = BankDetail::findOrFail($id);
           return view('bank-details.edit', compact('bankDetail'));
       }

       public function update(Request $request, $id)
       {
           $request->validate([
               'bank_name' => 'required',
               'account_number' => 'required',
               'branch' => 'required',
               'address' => 'required',
           ]);

           $bankDetail = BankDetail::findOrFail($id);
           $bankDetail->update($request->all());

           return redirect()->route('bank-details.index')->with('success', 'Bank Detail Updated Successfully');
       }

       public function destroy($id)
       {
           $bankDetail = BankDetail::findOrFail($id);
           $bankDetail->delete();

           return redirect()->route('bank-details.index')->with('success', 'Bank Detail Deleted Successfully');
       }
   }
