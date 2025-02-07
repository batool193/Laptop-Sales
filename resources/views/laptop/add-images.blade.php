@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Add Images for {{ $laptop->brand }}</h1>
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <form action="{{ route('laptop.store.images', $laptop->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="images" class="text-secondary">Select Images</label>
                    <input type="file" name="images[]" class="form-control-file" accept="image/*" multiple required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Add Images</button>
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

    .form-control-file {
        border: 2px dashed #007bff;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        background-color: #e9ecef;
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
