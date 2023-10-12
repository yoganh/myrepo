<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <title>Klasemen Sepak Bola</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('clubs.home') }}">Klasemen Sepak Bola</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clubs.create') }}">Input Data Klub</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('skor.create') }}">Input Data Skor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clubs.klasemen') }}">Lihat Klasemen</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('scripts')
</body>
</html>
