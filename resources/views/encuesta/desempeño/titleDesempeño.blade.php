@extends('layouts.encuesta')
@section('main')
    <section class="desempeño--title">    
        <h1 class="margin-bot">Evaluado</h1>
        <h2 class="
                @switch(key($persona))
                    @case('autoevaluacion')
                        color-violet
                        @break
                    @case('supervisor')
                        color-red
                        @break
                    @case('subalterno')
                        color-blue
                        @break
                    @case('companiero')
                        color-orange
                        @break
                @endswitch
        ">
            @foreach ($persona as $cargo => $datos)
                {{$datos[0]}} - {{$datos[1]}}
            @endforeach
        </h2>

        <form action="" method="post">
            @csrf
            <div class="div__btn">
                <input type="button" value="Atrás" onclick='goBack()' class="btn btn-no">
                <input type="submit" value="Siguiente" class="btn">
            </div>
        </form>
    </section>
    
@endsection
@section('js')
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
@endsection