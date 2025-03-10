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
                    <a class= "nav-link " href="http://190.7.153.162:84/Proyect/public/sensors">
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
