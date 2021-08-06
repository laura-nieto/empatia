@php
    $max = 0;
    foreach($all as $persona){
        if (count($persona)>$max) {
            $max = count($persona);
        }
    }
@endphp
<table>
    <thead>
        <tr>
            <th>Evaluado</th>
            <th>Puesto Evaluado</th>
            @for ($i = 0; $i < $max; $i++)
                <th>Evaluador</th>
                <th>Puesto del Evaluador</th>
                <th>Jerarquía</th>
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
            @endfor
        </tr>  
    </thead>
    <tbody>
        @foreach ($all as $persona)
            <tr>
                <td>{{$persona[0]->evaluado}}</td>
                <td>{{$persona[0]->puesto_evaluado}}</td>
                @foreach ($persona as $evaluacion)
                    <td>{{$evaluacion->evaluador}}</td>
                    <td>{{$evaluacion->puesto_evaluador}}</td>
                    <td>
                        @switch($evaluacion->jerarquia)
                                @case('autoevaluacion')
                                    Autoevaluación
                                    @break
                                @case('supervisor')
                                    Es su Supervisor
                                    @break
                                @case('subalterno')
                                    Es su Subalterno
                                    @break
                                @case('companiero')
                                    Es su Compañero
                                    @break         
                            @endswitch
                    </td>
                    @foreach ($evaluacion->encuesta_desempenio as $rta)
                        <td>{{$rta->pivot->respuesta}}</td>
                    @endforeach
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>