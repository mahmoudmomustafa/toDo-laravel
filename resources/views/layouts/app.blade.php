<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Hash') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two&display=swap" rel="stylesheet">
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
                <a class="navbar-brand ml-1" href="{{ url('/') }}">
                    <i class="lni-slack"></i>
                    <span class="brand">Hash</span>
                    {{-- <i class="lni-sun"></i>
                    <i class="lni-night"></i>
                     --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-2" style="flex-direction:row;">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link p-2" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="/tasks">Tasks</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle p-2" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right m-2" aria-labelledby="navbarDropdown"
                                style="position: absolute !important;">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container-fluid">
                <div class="content">
                    <div class="row justify-content-center show-task">
                        @yield('content')
                        @auth
                        {{-- sidebar --}}
                        <div class="col-lg-3 mx-4">
                            {{-- incomplete --}}
                            <div class="card mt-2">
                                <h4 class="p-4 font-weight-bold" style="color: #5E52F6">
                                    {{ __('Incomplete Tasks') }}<span
                                        class="text-muted pl-1"><small>({{$incompletedTasks->count()}})</small></span>
                                </h4>
                                @if (!$incompletedTasks->count())
                                <p class="font-weight-bold text-center" style="color: #5b6f82;">No
                                    InCompleted
                                    Tasks</p>
                                @else
                                <div class="card-body pt-1">
                                    <div class="tasks row">
                                        @foreach ($incompletedTasks as $incompletedTask)
                                        <div class="row addTask incompleted">
                                            <div class="col">
                                                <a class="float-left font-weight-bold"
                                                    href="/tasks/{{$incompletedTask->id}}">
                                                    <p>
                                                        {{$incompletedTask->task_title}}
                                                    </p>
                                                </a>
                                                <a class="float-right" href="/tasks/{{$incompletedTask->id}}">
                                                    <i class="lni-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            {{-- complete --}}
                            <div class="card mt-2">
                                <h4 class="p-4 font-weight-bold" style="color: #5E52F6">{{ __('Completed Tasks') }}<span
                                        class="text-muted pl-1"><small>({{$completedTasks->count()}})</small></span>
                                </h4>
                                @if (!$completedTasks->count())
                                <p class="font-weight-bold text-center" style="color: #5b6f82;">No Completed Tasks</p>
                                @else
                                <div class="card-body pt-1">
                                    <div class="tasks row">
                                        @foreach ($completedTasks as $completedTask)
                                        <div class="row addTask completed">
                                            <div class="col">
                                                <a class="float-left font-weight-bold"
                                                    href="/tasks/{{$completedTask->id}}">
                                                    <p>
                                                        {{$completedTask->task_title}}
                                                    </p>
                                                </a>
                                                <a class="float-right" href="/tasks/{{$completedTask->id}}"><i
                                                        class="lni-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endauth
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