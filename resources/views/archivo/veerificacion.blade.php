<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
<body style="background: #546E7A">
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
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card" style="margin-top: 20%">
                                <div class="card-header text-white text-center" style=" background: #000000">{{ __('trdc.HHMMCDVC') }}</div>
                                    <div class="card-body" style=" background: #CFD8DC">
                                        <form method="POST" action="{{ url('verificacion') }}" >
                                            @csrf
                                            <br>
                                            <div class="form-group row">
                                                <label for="password_code" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMCDOP') }}</label>
                                                <div class="col-md-8">
                                                    <input id="password_code" type="text" class="form-control @error('password_code') is-invalid @enderror" name="password_code" value="{{ old('password_code') }}" required autocomplete="password_code" autofocus>
                                                    @error('password_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                                            <center>
                                                <button type="submit" class="btn btn-primary">{{ __('trdc.HHMMVRFC')}}</button>
                                            </center>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @include('sweetalert::alert')
    @yield('script')
    <script src="{{ asset('js/modal.js') }}" defer></script>
</body>
</html>
