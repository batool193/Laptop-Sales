@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">{{ $question->question }}</h1>
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <p class="text-muted mb-4">{{ $question->created_at->format('F d, Y') }}</p>
            <div class="content">
                {!! nl2br(e($question->answer)) !!}
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    h1.text-primary {
        font-size: 2rem;
        font-weight: bold;
    }

    .text-muted {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .content {
        line-height: 1.6;
        font-size: 1.1rem;
        color: #343a40;
    }
</style>
@endsection
