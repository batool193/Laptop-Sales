@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Laptop Info</h1>
    <div class="card mb-4 border-primary shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">{{ $laptop->brand }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th class="bg-light">Brand</th>
                        <td>{{ $laptop->brand }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Serial Number</th>
                        <td>{{ $laptop->serial_number }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Processor</th>
                        <td>{{ $laptop->processor }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">RAM</th>
                        <td>{{ $laptop->ram }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Storage</th>
                        <td>{{ $laptop->storage }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Color</th>
                        <td>{{ $laptop->color }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Price</th>
                        <td>${{ number_format($laptop->price, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-3 text-muted">{{ $laptop->description }}</p>
            <div class="mt-4">
                <h5 class="text-primary">Images</h5>
                <div class="d-flex flex-wrap">
                    @foreach ($laptop->attachements as $attachement)
                        <img src="{{ Storage::url($attachement->file_path) }}" alt="{{ $laptop->brand }}" width="150" class="img-thumbnail mr-2 mb-2">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if ($laptop->offers()->exists())
    <div class="card border-warning shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="card-title mb-0">Offers</h5>
        </div>
        <div class="card-body">
            @foreach ($laptop->offers as $offer)
            <div class="mb-3">
                <label class="d-block"><strong>Offer Description:</strong> {{ $offer->offer_description }}</label>
                <label class="d-block"><strong>Discount Percentage:</strong> {{ $offer->discount_percentage }}%</label>
                <label class="d-block"><strong>Start Date:</strong> {{ $offer->start_date }}</label>
                <label class="d-block"><strong>End Date:</strong> {{ $offer->end_date }}</label>
                @auth
                <div class="text-right">
                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                @endauth
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
