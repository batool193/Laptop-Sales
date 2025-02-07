@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center text-primary">{{ $article->title }}</h1>
    <p class="text-center text-muted">{{ $article->created_at->format('F d, Y') }}</p>
    <div class="content border rounded p-4 bg-white shadow-sm">
        {!! nl2br(e($article->content)) !!}
    </div>
</div>

<style>
    .container {
        max-width: 800px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    h1.text-primary {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .text-muted {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .content {
        line-height: 1.7;
        font-size: 1.2rem;
        color: #343a40;
    }

    .border {
        border-color: #007bff;
    }

    .bg-white {
        background-color: #ffffff;
    }

    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.075);
    }

    .p-4 {
        padding: 1.5rem !important;
    }
</style>
@endsection
