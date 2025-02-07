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

    <h1 class="mb-4 text-primary">Edit Laptop</h1>
    <form action="{{ route('laptop.update', $laptop->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PATCH')

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="brand" class="text-secondary">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $laptop->brand }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="serial_number" class="text-secondary">Serial Number</label>
                <input type="text" name="serial_number" class="form-control" value="{{ $laptop->serial_number }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="processor" class="text-secondary">Processor</label>
                <input type="text" name="processor" class="form-control" value="{{ $laptop->processor }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="ram" class="text-secondary">RAM</label>
                <input type="text" name="ram" class="form-control" value="{{ $laptop->ram }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="storage" class="text-secondary">Storage</label>
                <input type="text" name="storage" class="form-control" value="{{ $laptop->storage }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="color" class="text-secondary">Color</label>
                <input type="text" name="color" class="form-control" value="{{ $laptop->color }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="text-secondary">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $laptop->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price" class="text-secondary">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $laptop->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update Laptop</button>
    </form>

    <h2 class="mt-5 text-primary">Existing Images</h2>
    <div class="d-flex flex-wrap">
        @foreach($laptop->attachements as $attachement)
            <div class="image-container position-relative m-2">
                <img src="{{ Storage::url($attachement->file_path) }}" alt="{{ $laptop->brand }}" width="150" class="img-thumbnail">
                <form action="{{ route('attachement.destroy', $attachement->id) }}" method="POST" class="position-absolute" style="top: 5px; right: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <a href="{{ route('laptop.add.images', $laptop->id) }}" class="btn btn-warning mt-3">Add Images</a>
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
</style>
@endsection
