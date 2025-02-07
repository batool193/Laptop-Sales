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

    <h1 class="mb-4 text-primary">Add New Article</h1>
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <form action="{{ route('article.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="title" class="text-secondary">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content" class="text-secondary">Content</label>
                    <textarea name="content" class="form-control" rows="8" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Add Article</button>
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
