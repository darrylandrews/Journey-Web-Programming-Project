<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Wonderful Journey</h1>
        <p class="lead font-weight-bold">Blog of Indonesia Tourism</p>
    </div>
    </div>

    <div class="container">
        @if(!Illuminate\Support\Facades\Auth::check())
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                    <a class="dropdown-item" href="{{ url('category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <a class="nav-link" href="/login">Login</a>
                        <a class="nav-link" href="/register">Register</a>
                    </form>
                </div>
            </nav>
        @else
            @if(Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/updateP">Admin</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/userP">User</a>
                            </li>
                        </ul>
           
                        <form class="form-inline my-2 my-lg-0">
                            <a class="nav-link" href="#">{{ Illuminate\Support\Facades\Auth::user()->name }}</a>
                            <a class="nav-link" href="/logout">Logout</a>
                        </form>
                    </div>
                </nav>
            @else
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/updateP">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/blog">Blog</a>
                            </li>
                        </ul>
           
                        <form class="form-inline my-2 my-lg-0">
                            <a class="nav-link" href="#">{{ Illuminate\Support\Facades\Auth::user()->name }}</a>
                            <a class="nav-link" href="/logout">Logout</a>
                        </form>
                    </div>
                </nav>
            @endif
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

<footer>
    <div class="row">
        <div class="col col-lg-12 text-center">
            <h5>Darryl Andrews - 2201767365</h5>
        </div>
    </div>
</footer>
</html>