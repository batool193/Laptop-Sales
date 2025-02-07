@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Search Results for "{{ $query }}"</h1>

    @if($laptops->isEmpty() && $offers->isEmpty() && $articles->isEmpty() && $questions->isEmpty())
        <div class="alert alert-warning" role="alert">
            No results found.
        </div>
    @else
        @if(!$laptops->isEmpty())
        <h2 class="mt-4">Laptops</h2>
        <div class="list-group">
            @foreach($laptops as $laptop)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $laptop->brand }} - {{ $laptop->serial_number }}</h5>
                    <a href="{{ route('laptop.show', $laptop->id) }}" class="btn btn-info btn-sm">Show Details</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(!$offers->isEmpty())
        <h2 class="mt-4">Offers</h2>
        <div class="list-group">
            @foreach($offers as $offer)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1">{{ $offer->description }}</p>
                    <a href="{{ route('laptop.show', $offer->laptop_id) }}" class="btn btn-info btn-sm">Show Details</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(!$articles->isEmpty())
        <h2 class="mt-4">Articles</h2>
        <div class="list-group">
            @foreach($articles as $article)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $article->title }}</h5>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(!$questions->isEmpty())
        <h2 class="mt-4">Questions</h2>
        <div class="list-group">
            @foreach($questions as $question)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $question->question }}</h5>
                    <a href="{{ route('question.show', $question->id) }}" class="btn btn-info btn-sm">Show Answer</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    @endif
</div>

<style>
    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .text-primary {
        color: #007bff;
    }

    .list-group-item {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        transition: transform 0.2s ease-in-out;
    }

    .list-group-item:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-sm {
        margin-left: 5px;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }
</style>
@endsection
