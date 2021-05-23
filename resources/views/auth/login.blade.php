<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Empetia 360</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
   <header>
       <img src="" alt="">
   </header>
   <section class="section--login">
        <article class="section--login--article__title">
            <h1>Iniciar Sesión</h1>
        </article>
        <article class="section--login--article__login">
            <form action="" method="post">
                @csrf
                @error('password')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
                <div class="div__login">
                    <label for="nickname">E-mail</label>
                    <input type="text" id="nickname" name="email">
               
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="div__login__remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Recuerdame</label>
                </div>
                <button class="btn">Ingresar</button>
            </form>
        </article>
   </section> 
</body>
</html>