@extends('layouts.layout')

@section('content')
<div>
    <h1 class="mb-4 text-primary">Articles</h1>
    @auth
    <div class="text-right">
        <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">Add New Article</a>
    </div>
    @endauth
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-primary shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <h5 class="card-title text-info">{{ $article->title }}</h5>
                        <small class="text-muted">{{ $article->created_at->format('M d, Y') }}</small>
                    </div>
                    <p class="card-text flex-grow-1">{{ Str::limit($article->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm">Read More</a>
                        @auth
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
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

    .card-body {
        padding: 20px;
    }

    .btn-sm {
        margin-right: 5px;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #218838;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .text-primary {
        color: #007bff;
    }

    .text-info {
        color: #17a2b8;
    }
</style>
@endsection
