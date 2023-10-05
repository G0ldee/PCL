@php
  session_start();      
@endphp

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    <title>{{config('app.name', 'LSAPP')}}</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
    <body class="bg-secondary">
        <header class="container-header d-flex text-white">
            @section('header')
                @include('layouts.header')
            @show
        </header>
        
        <nav class="navbar rounded-3 navbar-expand-lg navbar-light mb-2 bg-light">
            @section('navbar')
                @include('layouts.navbar')
            @show
        </nav>
        <div class="container  rounded-3 mt-2 bg-light mb-2">
            @yield('content')    
        </div>
        
        <footer class="container-footer text-center text-white myfont ">
            <style>.myfont{ font-size: 0.6rem }</style>
            @section('footer')
                @include('layouts.footer')
        </footer>
    </body>    
</html>