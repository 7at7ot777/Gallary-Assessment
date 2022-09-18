<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"></script>
</head>
<body>
{{--Navigation Bar--}}

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <a class="navbar-brand" href="#">Code Assessment</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{--if the authenticated uses visited the site --}}
    @auth()
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('AllAlbum')}}">All Album</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('AddAlbum')}}">Add Album</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('image/create')}}">Add Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('logout')}}">Logout</a>
                </li>

            </ul>
        </div>
    @endauth

    {{-- if guest visit the site --}}
    @guest()



        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('register')}}">Register</a>
                </li>


            </ul>
        </div>
    @endguest


</nav>

@yield('content')
</body>
</html>
