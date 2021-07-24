<table>
    <thead>
        <tr>
            <th colspan="6" align="center">BFQ</th>
        </tr>
        <tr>
            <th rowspan="2" align="center">N° de Pregunta</th> 
            <th>Completamente Verdadero para mí</th> 
            <th>Bastante Verdadero para mí</th> 
            <th>Ni verdadero ni falso para mí</th> 
            <th>Bastante Falso para mí</th> 
            <th>Completamente Falso para mí</th> 
        </tr>
        <tr>
            <th align="center">5</th>
            <th align="center">4</th>
            <th align="center">3</th>
            <th align="center">2</th>
            <th align="center">1</th>
        </tr>  
    </thead>
    <tbody>
        @php
            $i = 0;    
        @endphp
        @foreach ($persona as $pregunta)
            <tr>
                <td align="center">{{$i}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == '5' ? 'X' : ''}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == '4' ? 'X' : ''}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == '3' ? 'X' : ''}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == '2' ? 'X' : ''}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == '1' ? 'X' : ''}}</td>
            </tr>
            @php
                $i+=1
            @endphp
        @endforeach        
    </tbody>
</table>