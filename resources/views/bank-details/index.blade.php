@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Bank Details</h1>
    <a href="{{ route('bank-details.create') }}" class="btn btn-primary mb-3">Add New Bank Detail</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>Branch</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bankDetails as $bankDetail)
            <tr>
                <td>{{ $bankDetail->bank_name }}</td>
                <td>{{ $bankDetail->account_number }}</td>
                <td>{{ $bankDetail->branch }}</td>
                <td>{{ $bankDetail->address }}</td>
                <td>
                    <a href="{{ route('bank-details.edit', $bankDetail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bank-details.destroy', $bankDetail->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
