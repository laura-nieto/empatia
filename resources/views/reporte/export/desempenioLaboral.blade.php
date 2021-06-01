<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Evaluado</th>
            <th>Puesto del evaluado</th>
            @foreach($preguntas as $item)
                <th>{{$item->pregunta}}</th>
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($autoevaluacion as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta) 
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>  
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Evaluado</th>
            <th>Puesto del evaluado</th>
            @foreach($preguntas as $item)
                <th>{{$item->pregunta}}</th>
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($supervisor as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Evaluado</th>
            <th>Puesto del evaluado</th>
            @foreach($preguntas as $item)
                <th>{{$item->pregunta}}</th>
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($subalterno as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Evaluado</th>
            <th>Puesto del evaluado</th>
            @foreach($preguntas as $item)
                <th>{{$item->pregunta}}</th>
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($companiero as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>