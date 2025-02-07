@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary text-center">Users List</h1>
    @auth
    <div class="text-right mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    @endauth
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        margin-bottom: 0;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .card {
        margin-top: 20px;
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

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-primary {
        color: #007bff;
    }
</style>
@endsection
