<!DOCTYPE html>
<html>
<head>
    <title>Laptop Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </main>
    <br>
    @auth
    <div class="text-right">
        <form class="mr-auto" action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    @endauth
    <br>
    <footer class="text-center mt-4">
        <p>© 2024 Laptop Management. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
