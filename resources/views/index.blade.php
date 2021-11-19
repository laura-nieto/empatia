@extends('layouts.home')
@section('title','Psicologia y Emprendimiento')
@section('main')  
    {{--@if (session('create.empresa') || session('create.encuesta') || session('create.dato') || session('create.automatizacion') || session('update.mensaje') || session('import.emails'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('create.empresa')}}</p>
            <p>{{session('create.encuesta')}}</p>
            <p>{{session('create.dato')}}</p>
            <p>{{session('create.automatizacion')}}</p>
            <p>{{session('update.mensaje')}}</p>
            <p>{{session('import.emails')}}</p>
        </div>
    @endif--}}
    <article class="article__index">
        <section>
            <h3>Enviar</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/enviar/clima-laboral">Clima Laboral</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/enviar/desempenio-laboral">Evaluación de Desempeño</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/enviar/automatizacion">Automatización de Pruebas</a>
                </li>
            </ul>
        </section>
        <section>
            <h3>Reportes</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/reporte/clima-laboral">Clima Laboral</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/reporte/desempenio-laboral">Evaluación de Desempeño</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/reporte/automatizacion">Automatización de Pruebas</a>
                </li>
            </ul>
        </section>
        <section>
            <h3>Modificar</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/clima-laboral">Mensaje de Clima Laboral</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/desempenio-laboral">Mensaje de Bienvenida Desempeño Laboral</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/instrucciones/desempenio-laboral">Mensaje de Instrucciones Desempeño Laboral</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/automatizacion-laboral">Mensaje de Automatizacion Laboral</a>
                </li>
            </ul>
        </section>
        <section>
            <h3>Empresa</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/new/empresa">Agregar empresa</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/delete/empresa">Borrar empresa</a>
                </li>
            </ul>
        </section>
        <section>
            <h3>Dato Demográfico</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/new/dato">Agregar dato nuevo</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/agregar/dato">Agregar dato a una empresa</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/delete/dato">Eliminar dato</a>
                </li>         
            </ul>
        </section>
        <section>
            <h3>Usuarios</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/usuarios">Ver Usuarios</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/edit/setting/{{Auth::id()}}">Configurar</a>
                </li>
            </ul>
        </section>
    </article>
@endsection
@section('js')
<script>
    $.ajax({
        url: '{{url("/settings/")}}',
        data: {
            '_token': '{{ csrf_token() }}',
            'id': '{{Auth::user()->id}}',
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (res) {
            if (res.logo != null) {
                $('nav img').attr('src', "{{asset('img/empresas')}}" + '/' + res.logo);
            }
            if (res.color_header != null) {
                $('header').css('background-color', res.color_header);
            }
            if (res.letras_header != null) {
                $('nav a').css('color', res.letras_header);
                $('nav a').css('border-color', res.letras_header);
            }
            if (res.color_menu != null) {
                $('.li__index').css('background-color', res.color_menu);
            }
            if (res.letras_menu != null) {
                $('.li__index a').css('color', res.letras_menu);
            }
            if (res.color_main) {
                $('body').css('background-color', res.color_main);
            }
            if (res.letras_main) {
                $('body').css('color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection