<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ToDo') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme|Pacifico&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand  ml-1" href="{{ url('/') }}">
                    <i class="lni-slack"></i>
                    <span class="brand">Hash</span>
                </a>
                <div class="navbar" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-2">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link p-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="container-fluid">
                <div class="content">
                    <div class="row justify-content-center show-task">
                        <div class="col-md-6 p-0">
                            <div class="log-img">
                                <img src="/img/log.png" alt="">
                                <div class="heading">
                                    <h2 class="p-4 mt-2 col-md-6 font-weight-bold">Easy Way To Create Your Tasks
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="card log-card"
                                style="background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%);">
                                <div class="card-body pt-1">
                                    <h2 class="p-4 font-weight-bold" style="color: #5E52F6">{{ __('Sign Up') }}</h2>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        {{-- name --}}
                                        <div class="form-group row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                    name="name" value="{{ old('name') }}" placeholder="Full Name"
                                                    required autofocus>

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- email --}}
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ old('email') }}" required
                                                    placeholder="Email Address">

                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- password --}}
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    placeholder="Password" name="password" required autocomplete="none">

                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- repassword --}}
                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required placeholder="Confirm Password"
                                                    autocomplete="none">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" class="btn btn-primary" style="width:100%">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="/js/script.js"></script>

</html>