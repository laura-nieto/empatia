<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header class="header-index">
        <nav>
            <div class="div__home">
                @if (Auth::user()->admin == 0)
                <a href="/"><img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="" class="img--logo"></a>
                <a href="/" class="ml-3 border-white">Home</a>
                @else
                <a href="/dashboard"><img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="" class="img--logo"></a>
                <a href="/dashboard" class="ml-3 border-white">Home</a>
                @endif   
            </div>
            <a href="/logout" class="border-white">Cerrar sesión</a>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    @yield('js')
</body>
</html>