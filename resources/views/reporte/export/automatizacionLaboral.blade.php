@foreach ($persona->datos_categorias as $categoria)
    <table>
        <thead>
            <tr>
                <th colspan="6">{{$categoria->nombre}}</th>
            </tr>
            <tr>
                <th></th> 
                <th>Completamente Verdadero[5]</th> 
                <th>Bastante Verdadero[4]</th> 
                <th>Ni verdadero ni falso[3]</th> 
                <th>Bastante Falso[2]</th> 
                <th>Completamente Falso[1]</th> 
            </tr>  
        </thead>
        <tbody>
            @foreach ($persona->encuesta_automatizacion as $encuesta)
                @if ($encuesta->category_id == $categoria->id)
                    <tr>
                        <td>{{$encuesta->pregunta}}</td>
                        <td>{{ $encuesta->pivot->respuesta == 5 ? 'Sí' : '' }}</td>
                        <td>{{ $encuesta->pivot->respuesta == 4 ? 'Sí' : '' }}</td>
                        <td>{{ $encuesta->pivot->respuesta == 3 ? 'Sí' : '' }}</td>
                        <td>{{ $encuesta->pivot->respuesta == 2 ? 'Sí' : '' }}</td>
                        <td>{{ $encuesta->pivot->respuesta == 1 ? 'Sí' : '' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endforeach