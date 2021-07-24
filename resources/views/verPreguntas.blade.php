<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista preguntas</title>
</head>
<body>
    
    
    <main>
        <article class="article__agregar">
            @php
                $i = 1;
            @endphp
            @foreach ($preguntas as $pregunta)
            <ol>
                <h4>{{$pregunta->pregunta}}</h4>
                @if ($i == 7 ||$i == 38 ||$i == 42 ||$i == 49)
                        <img src="{{asset('img/wonderlick/'.$pregunta->imagen)}}" alt="">
                @endif
                @foreach(json_decode($pregunta->opciones) as $opcion)
                    
                    <li>{{$opcion}}</li>
                @endforeach  
            </ol>
                @php
                    $i+=1;
                @endphp
            @endforeach
        </article> 
        
    </main>

</body>
</html>
    
