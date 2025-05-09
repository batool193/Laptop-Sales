@extends('layouts.layout')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('content')
<div>
    <h1 class="mb-4">Laptops List</h1>
    @auth
    <div class="text-right">
        <a href="{{ route('laptop.create') }}" class="btn btn-primary mb-3">Add New Laptop</a>
    </div>
    @endauth
    <div class="row">
        @foreach($laptops as $laptop)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if ($laptop->attachements->isNotEmpty())
                    <img src="{{ Storage::url($laptop->attachements->first()->file_path) }}" alt="{{ $laptop->brand }}" class="card-img-top img-fluid">
                @else
                    <img src="path/to/placeholder-image.jpg" alt="No Image Available" class="card-img-top img-fluid">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $laptop->brand }}</h5>
                    <p class="card-text"><strong>Serial Number:</strong> {{ $laptop->serial_number }}</p>
                    <p class="card-text"><strong>Processor:</strong> {{ $laptop->processor }}</p>
                    <p class="card-text"><strong>RAM:</strong> {{ $laptop->ram }}</p>
                    <p class="card-text"><strong>Storage:</strong> {{ $laptop->storage }}</p>
                    <p class="card-text"><strong>Color:</strong> {{ $laptop->color }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ number_format($laptop->price, 2) }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('laptop.show', $laptop->id) }}" class="btn btn-info btn-sm">Show Details</a>
                    @auth
                    <a href="{{ route('laptop.edit', $laptop->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="{{ route('laptop.add.images', $laptop->id) }}" class="btn btn-warning btn-sm">Add Images</a>
                    <a href="{{ route('offers.create', $laptop->id) }}" class="btn btn-warning btn-sm">Add Offers</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $laptops->links() }}
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .card-footer {
        padding: 10px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .text-primary {
        color: #007bff;
    }
</style>
@endsection
