<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav>
            <div class="div__home">
                <a href="/"><img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="" class="img--logo"></a>
                <a href="/">Home</a>            
            </div>
            <a href="/logout">Cerrar sesión</a>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    @yield('js')
</body>
</html>