@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="mb-4 text-primary">Add Offer</h1>
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <form action="{{ route('offers.store', $laptop->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="form-group">
                    <label for="offer_description" class="text-secondary">Offer Description</label>
                    <textarea name="offer_description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="discount_percentage" class="text-secondary">Discount Percentage</label>
                    <input type="number" name="discount_percentage" class="form-control" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="start_date" class="text-secondary">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_date" class="text-secondary">End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Add Offer</button>
            </form>
        </div>
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: none;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .card {
        background-color: #fff;
    }

    .card-body {
        padding: 20px;
    }

    .text-primary {
        color: #007bff;
    }

    .text-secondary {
        color: #6c757d;
    }
</style>
@endsection
