<table>
<thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th> 
        @foreach ($datos_demograficos as $dato)
            <th>{{$dato}}</th>
        @endforeach
        @foreach($preguntas as $pregunta)
            <th>{{$pregunta->pregunta}}</th>
        @endforeach
    </tr>  
</thead>
<tbody>
    @foreach ($datos as $dato)
        @php
            $viewDatos = json_decode($dato->datos_demograficos,true);
        @endphp
        <tr>
            <td>{{$dato->nombre}}</td>
            <td>{{$dato->mail}}</td>
            @foreach ($viewDatos as $item)
                <td>{{$item}}</td>
            @endforeach
            @foreach ($dato->encuesta_clima as $rta)
                <td>{{$rta->pivot->respuesta}}</td> 
            @endforeach
        </tr>
    @endforeach
</tbody>
</table>