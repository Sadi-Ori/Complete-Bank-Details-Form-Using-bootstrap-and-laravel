@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Bank Detail</h1>

    <form action="{{ route('bank-details.update', $bankDetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="bank_name" class="form-label">ব্যাংকের নাম</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $bankDetail->bank_name }}" required>
        </div>
        <div class="mb-3">
            <label for="account_number" class="form-label">ব্যাংক অ্যাকাউন্ট নম্বর</label>
            <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $bankDetail->account_number }}" required>
        </div>
        <div class="mb-3">
            <label for="branch" class="form-label">শাখা</label>
            <input type="text" class="form-control" id="branch" name="branch" value="{{ $bankDetail->branch }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">ঠিকানা</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $bankDetail->address }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
