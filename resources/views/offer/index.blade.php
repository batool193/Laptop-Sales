@extends('layouts.layout')

@section('content')
<div>
    <h1 class="mb-4 text-primary">Offers List</h1>
    <div class="row">
        @foreach ($laptops as $laptop)
            @if ($laptop->attachements->isNotEmpty())
                <div class="col-md-4 mb-4">
                    <div class="card border-info shadow-sm">
                        <img src="{{ Storage::url($laptop->attachements->first()->file_path) }}" alt="{{ $laptop->brand }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-info">{{ $laptop->brand }}</h5>
                            <a href="{{ route('laptop.show', $laptop->id) }}" class="btn btn-info btn-block">Show Details</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-title {
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
