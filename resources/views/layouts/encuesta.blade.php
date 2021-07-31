<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empatia 360</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <header class="header--encuesta">
        @yield('encabezado')
    </header>
    <main>
        <div class="container">
            @yield('main')
        </div>
    </main>
    @yield('js')
</body>
</html>