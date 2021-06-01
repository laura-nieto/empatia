<table>
<thead>
    <tr>
        <th>Nombre</th>
        <th>Género</th> 
        <th>Título</th>
        @foreach($preguntas as $pregunta)
            <th>{{$pregunta->pregunta}}</th>
        @endforeach
    </tr>  
</thead>
<tbody>
    @foreach ($datos as $dato)
        <tr>
            <td>{{$dato->nombre}}</td>
            <td>{{$dato->genero}}</td>
            <td>{{$dato->titulo}}</td>
            @foreach ($dato->encuesta_clima as $rta)
                <td>{{$rta->pivot->respuesta}}</td> 
            @endforeach
        </tr>
    @endforeach
</tbody>
</table>