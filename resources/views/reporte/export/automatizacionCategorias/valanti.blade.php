<table>
    <thead>
        <tr>
            <th colspan="4" align="center">VALANTI</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th colspan="4" align="center">La suma debe ser 3</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($persona as $pregunta)
            <tr>
                <td align="center">{{'Premisa '. $pregunta->pregunta}}</td>
                @foreach (json_decode($pregunta->pivot->respuesta) as $rta)
                    <td>{{$rta}}</td>
                @endforeach
                <td align="center">{{'Premisa '. $pregunta->pregunta}}</td>
            </tr>
        @endforeach
    </tbody>
</table>