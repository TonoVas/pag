<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/fbc887aaec.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body style="background:  #00B8D4">
          @if (!$user = $archivo->password_code)
          @elseif ($user == null)
          @elseif($user == $archivo->password_code)
          <div id="app">
            <nav class="navbar navbar-expand-md navbar-coral bg-coral">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto ">
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                            <li class="nav-item dropdown">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <br>
                <h1 class="text text-center" style=" color: #000"><strong>{{ $archivo->titulo }}</strong></h1>
                <br>
                <section class="icon">
                    <section class="icono">
                        <abbr title="Descargar Archivo">
                            <a href="{{ url('download/'.$archivo->name ) }}" style=" text-decoration: none; color: black"><i class="fas fa-cloud-download-alt fa-10x" ></i></a>
                        </abbr>
                    </section>
                </section>

        @if ($archivo->description == null)

        @else
            <section class="nueva">
                <section class="nacion">
                    <h5 style=" color: #000000">
                        {{ $archivo->description }}
                    </h5>
                </section>
            </section>

        @endif
        @if ($archivo->detalle == null)

        @else
            <section class="nuevo">
                <section class="notinacionales">
                    <h5 style=" color: #000000">
                        {{ $archivo->detalle }}
                    </h5>
                </section>
            </section>

        @endif

        <section class="estado">
            <section class="public_privado">
                @if ( $archivo->acceso == 0)
                    <h3>Publico</h3>

                @else
                    <h3>Privado</h3>

                @endif
            </section>
        </section>

            </div>
        </div>


          @endif
    @include('sweetalert::alert')
    @yield('script')
    <script src="{{ asset('js/modal.js') }}" defer></script>
</body>
</html>
