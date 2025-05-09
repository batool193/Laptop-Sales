@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-danger">Buy {{ $laptop->brand }}</h1>

    <div class="card border-danger shadow-sm">
        <div class="card-body">
            <form action="{{ route('buy.process', ['laptop' => $laptop->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Shipping Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="credit_card" class="form-label">Credit Card Number</label>
                    <input type="text" class="form-control" id="credit_card" name="credit_card" maxlength="10" minlength="10" required>
                </div>

                <button type="submit" class="btn btn-danger btn-lg">Confirm & Buy</button>
            </form>
        </div>
    </div>
</div>
@endsection
