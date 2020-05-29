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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <link href="{{asset('select2//dist/css/select2.css')}}" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


{!!Html::script('select2-4.0.3/vendor/jquery-2.1.0.js')!!}
<!-- Include all compiled plugins (below), or include individual files as needed -->

    {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
    {!!Html::style('select2-4.0.3/dist/css/select2.css',['rel'=>"stylesheet"])!!}


</head>


<body>
    <div id="app"  >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container col-md-12">
                <a class="navbar-brand" >
                    {{ __('SR. T') }}


                </a>





                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                        @can('Navegar usuarios')
                            <a href="{{ url('Usuario')}}" class="nav-link">Usuarios</a>
                        @endcan

                            @can('Navegar Bateria')
                                <a href="{{url('Bateria')}}" class="nav-link">Bateria</a>
                            @endcan
                            @can('Navegar Lugar')
                                <a href="{{url('Lugar')}}" class="nav-link">Lugar</a>
                            @endcan
                            @can('Navegar Marca')
                                <a href="{{url('Marca')}}" class="nav-link">Marca</a>
                            @endcan
                            @can('Navegar Negocio')
                                <a href="{{url('Negocio')}}" class="nav-link">Negocio</a>
                            @endcan
                            @can('Navegar Pantalla')
                                <a href="{{url('Pantalla')}}" class="nav-link">Pantalla</a>
                            @endcan
                            @can('Navegar Tipo_Reparacion')
                                <a href="{{url('Tipo_Reparacion')}}" class="nav-link">Tipo de Reparacion</a>
                            @endcan
                            @can('Navegar Modelo')
                                <a href="{{url('Modelo')}}" class="nav-link">Modelo</a>
                            @endcan

                            @can('Navegar Especificaciones')
                                <a href="{{url('Especificaciones')}}" class="nav-link">Especificaciones</a>
                            @endcan
                            @can('Navegar Factura')
                                <a href="{{url('Factura')}}" class="nav-link">Factura</a>
                            @endcan
                            @can('Navegar Producto')
                                <a href="{{url('Producto')}}" class="nav-link">Producto</a>
                            @endcan
                            @can('Navegar Reservacion')
                                <a href="{{url('Reservacion')}}" class="nav-link">Reservacion</a>
                            @endcan


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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Seccion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')




        </main>
    </div>





    <script src="{{asset('select2//dist/js/select2.js')}}"></script>

    <script src="{{asset('jquery/dist/jquery.js')}}"></script>


@yield('select2')
</body>
</html>
