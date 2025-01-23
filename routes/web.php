<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BankDetailController;

Route::get('bank-details/create', [BankDetailController::class, 'create'])->name('bank-details.create');
Route::post('bank-details', [BankDetailController::class, 'store'])->name('bank-details.store');