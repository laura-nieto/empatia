@foreach ($preguntas as $pregunta)
    <table>
        <thead>
            <tr>
                <th>{{$pregunta->pregunta}}</th>
                <th align="center">Más(+)</th>
                <th align="center">Menos(-)</th>
            </tr>  
        </thead>
        <tbody>
            @foreach (json_decode($pregunta->opciones) as $opcion)
                <tr>
                    <td>{{$opcion}}</td>
                    @foreach ($persona as $pregPers)
                        @if ($pregPers->id === $pregunta->id)
                            @php
                            if (!is_null(json_decode($pregPers->pivot->respuesta,true))) {
                                $asd =json_decode($pregPers->pivot->respuesta,true);
                                if (!is_null($asd['mas']) && !is_null($asd['menos'])) {
                                    $mas = $asd['mas'];
                                    $menos = $asd['menos'];
                                }
                            }  
                            @endphp
                            <td align="center">{{isset($mas) && $mas == $opcion ? 'X' : ''}}</td>
                            <td align="center">{{isset($menos) && $menos == $opcion ? 'X' : ''}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach        
        </tbody>
    </table>
@endforeach