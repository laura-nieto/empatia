<table>
    <thead>
        <tr>
            <th>Evaluadores</th>
            <th>Correo electrónico</th>
            <th>Evaluados</th>
            <th>Puesto del evaluado</th>
            <th>Relación Jerárquica</th>
            @foreach($preguntas as $item)
                <th>{{$item->pregunta}}</th>
            @endforeach
        </tr>  
    </thead>
    <tbody>
        @foreach ($autoevaluacion as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->mail}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta) 
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                        <td>
                            @switch($rta->pivot->tipo)
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
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>  
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tbody>
        @foreach ($supervisor as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->mail}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                        <td>
                            @switch($rta->pivot->tipo)
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
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tbody>
        @foreach ($subalterno as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->mail}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                        <td>
                            @switch($rta->pivot->tipo)
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
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tbody>
        @foreach ($companiero as $dato)
            <tr>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->mail}}</td>
                @foreach ($dato->encuesta_desempenio as $key => $rta)
                    @if($key==0)
                        <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                        <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                        <td>
                            @switch($rta->pivot->tipo)
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
                    @endif 
                    <td>{{$rta->pivot->respuesta}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>