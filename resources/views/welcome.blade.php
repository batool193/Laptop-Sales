<!DOCTYPE html>
<html>

<head>
    <title>Laptop Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark justify-content-between">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="laptops-tab" data-toggle="tab" href="#laptops" role="tab" aria-controls="laptops" aria-selected="true">Laptops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="false">Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="articles-tab" data-toggle="tab" href="#articles" role="tab" aria-controls="articles" aria-selected="false">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="false">Frequently Questions</a>
                </li>
            </ul>
            <form class="form-inline" action="{{ route('search') }}" method="GET">
             <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search" required>
              <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
              </form>

            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    <form class="ml-auto" action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="laptops" role="tabpanel" aria-labelledby="laptops-tab">
                <!-- Content for Laptops will be loaded here -->
            </div>
            <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                <!-- Content for Offers will be loaded here -->
            </div>
            <div class="tab-pane fade" id="articles" role="tabpanel" aria-labelledby="articles-tab">
                <!-- Content for Articles will be loaded here -->
            </div>
            <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                <!-- Content for Frequently Asked Questions will be loaded here -->
            </div>
        </div>
    </main>
    <br>

    <script>
        $(document).ready(function() {
            function loadContent(target, url) {
                $(target).load(url);
            }

            $('#laptops-tab').on('click', function() {
                loadContent('#laptops', '{{ route('laptop.index') }}');
            });

            $('#offers-tab').on('click', function() {
                loadContent('#offers', '{{ route('offers.index') }}');
            });

            $('#articles-tab').on('click', function() {
                loadContent('#articles', '{{ route('article.index') }}');
            });

            $('#questions-tab').on('click', function() {
                loadContent('#questions', '{{ route('question.index') }}');
            });

            // Load default tab content
            loadContent('#laptops', '{{ route('laptop.index') }}');
        });
    </script>
</body>

</html>
