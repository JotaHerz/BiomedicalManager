<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>"/sweetalert/sweetalert.min.js"</script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/sweetalert/sweetalert.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-fluid mb-0" src="/biomedica/storage/app/public/img/BIOMEDICALMANAGER.PNG" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{setActive('technology.index')}}" href="{{ route('technology.index') }}">
                               Inventario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{setActive('maintenance.*')}}" href="{{route('maintenance.index')}}">
                               Cronograma
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{setActive('workorders.*')}}" href="{{ route('workorders.index') }}">
                                Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{setActive('equipment.*')}}" href="{{ route('equipment.index') }}">
                               Tecnologías
                            </a>
                        </li>
                        @can('create',new App\Technology)
                        <li class="nav-item">
                            <a class= "nav-link {{setActive('technology.create')}} " href="{{route('technology.create')}}">
                              Crear Equipo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class= "nav-link " href="http://190.7.153.162:84/Proyect/public/">
                              Telemetría
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link {{setActive('users.*')}}" href="{{ route('users.index') }}">
                              Usuarios
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                @if(session()->has('success'))
                <div class="aler alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                @if(isset($errors) && $errors->any())
                <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $errors)
                                <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
            </div>
            @yield('content')
        </main>
    </div>
    @yield('js')
</body>
</html>
