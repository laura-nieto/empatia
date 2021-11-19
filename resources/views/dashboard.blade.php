@extends('layouts.home')
@section('title','Psicologia y Emprendimiento')
@section('main')
    {{--@if (session('create.encuesta') || session('create.automatizacion') || session('import.emails') || session('msj'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('create.encuesta')}}</p>
            <p>{{session('create.automatizacion')}}</p>
            <p>{{session('import.emails')}}</p>
            <p>{{session('msj')}}</p>
        </div>
    @endif--}}
    {{--@if (session('error'))
        <div class="div--error">
            <img src="{{asset('/img/cancel.png')}}" alt="Wrong Image" class="img--success">    
            <p>{{session('error')}}</p>
        </div>
    @endif--}}
    <article class="article__index">
        @if (Auth::user()->permisos->clima)
            <section>
                <h3>Clima Laboral</h3>
                <ul class="section--ul">
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/new/dato">Nuevo Dato</a>
                    </li>
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/agregar/dato/{{Auth::user()->empresa_id}}">Agregar Datos</a>
                    </li>
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/enviar/clima-laboral/{{Auth::user()->empresa_id}}">Enviar Encuesta</a>
                    </li>       
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/reporte/clima-laboral/{{Auth::user()->empresa_id}}">Ver Reporte</a>
                    </li>
                </ul>
            </section>
        @endif
        @if (Auth::user()->permisos->desempenio)
            <section>
                <h3>Desempeño Laboral</h3>
                <ul class="section--ul">
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/enviar/desempenio-laboral/{{Auth::user()->empresa_id}}">Enviar Encuesta</a>
                    </li>
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/reporte/desempenio-laboral/{{Auth::user()->empresa_id}}">Ver Reporte</a>
                    </li>
                </ul>
            </section>
        @endif
        @if (Auth::user()->permisos->automatizacion())
            <section>
                <h3>Automatización de Pruebas</h3>
                <ul class="section--ul">
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/enviar/automatizacion/{{Auth::user()->empresa_id}}">Enviar Encuesta</a>
                    </li>
                    <li class="li__index">
                        <i class="fas fa-caret-right fa-2x"></i>
                        <a href="/reporte/automatizacion/{{Auth::user()->empresa_id}}">Ver Reporte</a>
                    </li>
                </ul>
            </section> 
        @endif     
        <section>
            <h3>Modificar</h3>
            <ul class="section--ul">
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/email/{{Auth::user()->empresa_id}}">Mensajes E-mail</a>
                </li>
                <li class="li__index">
                    <i class="fas fa-caret-right fa-2x"></i>
                    <a href="/modificar/empresa/{{Auth::user()->empresa_id}}">Empresa</a>
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
                $('#img-home').attr('src', "{{asset('img/empresas')}}" + '/' + res.logo);
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
                $('.btn').css('border-color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection