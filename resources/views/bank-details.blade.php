<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank User</title>

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #0C4160;

    padding: 30px 10px;
}

.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px;
}

p {
    margin: 0px;
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto;

}


.btn.btn.btn-primary:hover {
    background-position: right center;
    text-decoration: none;
}



.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in;
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle;
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none;
}

.text {
    font-size: 14px;
    font-weight: 600;
}

::placeholder {
    font-size: 14px;
    font-weight: 600;
}
    </style>

</head>
<body>
<div class="container p-0"> 
    <div class="card px-4">
        <form action="{{ isset($bankDetail) ? route('bank-details.update', $bankDetail->id) : route('bank-details.store') }}" method="POST">
            @csrf
            @if(isset($bankDetail))
                @method('PUT')
            @endif
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">ব্যাংকের নাম</p>
                    <input class="form-control mb-3" type="text" name="bank_name" value="{{ $bankDetail->bank_name ?? '' }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">ব্যাংক অ্যাকাউন্ট নম্বর</p>
                    <input class="form-control mb-3" type="text" name="account_number" value="{{ $bankDetail->account_number ?? '' }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">শাখা</p>
                    <input class="form-control mb-3" type="text" name="branch" value="{{ $bankDetail->branch ?? '' }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">ঠিকানা</p>
                    <input class="form-control mb-3" type="text" name="address" value="{{ $bankDetail->address ?? '' }}" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3">
                    <span class="ps-3">পাঠান</span>
                    <span class="fas fa-arrow-right"></span>
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>