@extends('layouts.app')
@section('title','Empatia 360°')
@section('main')
    @if (session('create.encuesta') || session('create.automatizacion') || session('import.emails'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('create.encuesta')}}</p>
            <p>{{session('create.automatizacion')}}</p>
            <p>{{session('import.emails')}}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="div--error">
            <img src="{{asset('/img/cancel.png')}}" alt="Wrong Image" class="img--success">    
            <p>{{session('error')}}</p>
        </div>
    @endif
    <article class="article__index">
        @if (Auth::user()->permisos->clima)
            <section>
                <h3>Clima Laboral</h3>
                <ul class="section--ul">
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
    </article>
@endsection