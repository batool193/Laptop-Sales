@extends('layouts.layout')

@section('content')
<div>
    <h1 class="mb-4 text-center text-primary">Frequently Asked Questions</h1>
    @auth
    <div class="text-right mb-3">
        <a href="{{ route('question.create') }}" class="btn btn-primary">Add New Question</a>
    </div>
    @endauth
    <div class="row">
        @foreach($questions as $question)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <h5 class="card-title">{{ $question->question }}</h5>
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('question.show', $question->id) }}" class="btn btn-info btn-sm">Show Answer</a>
                        @auth
                        <a href="{{ route('question.edit', $question->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('question.destroy', $question->id) }}" method="POST" class="d-inline">
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
        {{ $questions->links() }}
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
</style>
@endsection
