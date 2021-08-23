<table>
    <thead>
        <tr>
            <th>Evaluado</th>
            <th>Puesto Evaluado</th>
           
            <th>Evaluador</th>
            <th>Puesto del Evaluador</th>
            @php
                $j=1;    
            @endphp
            @foreach($preguntas as $item)
                @if ($item->id > 10)
                    <th>Pregunta {{$j}}</th>
                    @php
                        $j+=1;    
                    @endphp
                @else
                    <th>{{$item->pregunta}}</th>
                @endif
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($all as $persona)
            <tr>
                <td>{{$persona->evaluado}}</td>
                <td>{{$persona->puesto_evaluado}}</td>
                <td>{{$persona->evaluador}}</td>
                <td>{{$persona->puesto_evaluador}}</td>
                @foreach ($persona->encuesta_desempenio as $rta)
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>