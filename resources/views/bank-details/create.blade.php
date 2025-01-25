@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Bank Detail</h1>

    <form action="{{ route('bank-details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="bank_name" class="form-label">ব্যাংকের নাম</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name" required>
        </div>
        <div class="mb-3">
            <label for="account_number" class="form-label">ব্যাংক অ্যাকাউন্ট নম্বর</label>
            <input type="text" class="form-control" id="account_number" name="account_number" required>
        </div>
        <div class="mb-3">
            <label for="branch" class="form-label">শাখা</label>
            <input type="text" class="form-control" id="branch" name="branch" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">ঠিকানা</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
