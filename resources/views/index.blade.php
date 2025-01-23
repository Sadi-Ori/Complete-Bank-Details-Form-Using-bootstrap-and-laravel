<html>
<div class="container p-0">
    <div class="card px-4">
        <h4>Bank Details</h4>
        <a href="{{ route('bank-details.create') }}" class="btn btn-primary mb-3">Add New</a>
        <ul>
            @foreach($bankDetails as $bankDetail)
                <li>
                    {{ $bankDetail->bank_name }} - 
                    <a href="{{ route('bank-details.edit', $bankDetail->id) }}">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</html>