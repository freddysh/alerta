<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="{{ asset('js/plugins-admin.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Font Awesome JS -->
     <script  src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script  src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
    @if (!isset($id))
        @php
            $id=0;
        @endphp
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        <main>
            <div class="wrapper">
                <!-- Sidebar -->
                <nav id="sidebar">
                    {{-- <div class="sidebar-header">
                        <h3>Bootstrap Sidebar</h3>
                    </div> --}}

                    <ul class="list-unstyled components">
                        {{-- <p>Dummy Heading</p> --}}
                        {{-- <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#">Home 1</a>
                                </li>
                                <li>
                                    <a href="#">Home 2</a>
                                </li>
                                <li>
                                    <a href="#">Home 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="#">Page 1</a>
                                </li>
                                <li>
                                    <a href="#">Page 2</a>
                                </li>
                                <li>
                                    <a href="#">Page 3</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="@if(url()->current()==route('planta')||url()->current()==route('planta.create')||url()->current()==route('planta.edit',$id)) active @endif">
                            <a href="{{ route('planta') }}"><i class="fas fa-industry"></i> PLANTA</a>
                        </li>
                        <li class="@if(url()->current()==route('sistema')||url()->current()==route('sistema.create')||url()->current()==route('sistema.edit',$id)) active @endif">
                            <a href="{{ route('sistema') }}"><i class="fas fa-project-diagram"></i> SISTEMA</a>
                        </li>
                        <li class="@if(url()->current()==route('equipo')||url()->current()==route('equipo.create')||url()->current()==route('equipo.edit',$id)) active @endif">
                            <a href="{{ route('equipo') }}"><i class="fas fa-hdd"></i> EQUIPO</a>
                        </li>

                        <li class="@if(url()->current()==route('componente')||url()->current()==route('componente.create')||url()->current()==route('componente.edit',$id)) active @endif">
                            <a href="{{ route('componente') }}"><i class="fas fa-puzzle-piece"></i> COMPONENTE</a>
                        </li>
                        <li class="@if(url()->current()==route('lectura')) active @endif">
                            <a href="{{ route('lectura') }}"><i class="fas fa-clipboard"></i> LECTURA</a>
                        </li>
                    </ul>
                </nav>

                <!-- Page Content -->
                <div id="content" class="no-gutters container-fluid">
                <div class="row">

                    <div class="col-10">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                    </div>
                    <div class="col-2  text-right">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            {{-- <div class="container"> --}}
                                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                                    <i class="fas fa-align-left"></i>
                                    <span></span>
                                </button>

                            {{-- </div> --}}
                        </nav>
                    </div>
                </div>
                    @yield('contenido')
                </div>


            </div>

        </main>
    </div>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        @if (Session::has('success'))
            toastr.success('{!! Session::get('success') !!}','MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
        @elseif (Session::has('info'))
            toastr.info('{!! Session::get('info') !!}','MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
        @elseif (Session::has('warning'))
            toastr.warning('{!! Session::get('warning') !!}','MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
        @elseif (Session::has('error'))
            toastr.error('{!! Session::get('error') !!}','MENSAJE DEL SISTEMA',{"progressBar":true,"closeButton":true})
        @endif
    </script>
</body>
</html>
