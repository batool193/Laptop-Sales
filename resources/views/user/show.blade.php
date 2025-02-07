@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary text-center">User Info</h1>
    <div class="card border-primary shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
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

    .card {
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .table {
        margin-bottom: 0;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .text-primary {
        color: #007bff;
    }
</style>
@endsection
