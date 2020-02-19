<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Title</title>

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> --}}

    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
{{-- <meta http-equiv="Content-Type" content="text/html"/> --}}
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

    <!-- Fonts -->

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
            font-size: 20px;
        }
        table{
            width: 100%;
            margin-bottom: 1rem;
            color: #343a40;
        }
        table > thead > tr > td{
            color: #343a40;
            padding: 5px;
        }
        table > thead > tr{
            border: 1px solid #343a40;
        }
    </style>
</head>
<body>
    <div id="app" class="contenido">
            @yield('content')
    </div>
</body>
</html>
