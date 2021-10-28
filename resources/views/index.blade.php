@extends('layouts.app')
@section('title','Empatia 360°')
@section('main')  
    @if (session('create.empresa') || session('create.encuesta') || session('create.dato') || session('create.automatizacion') || session('update.mensaje') || session('import.emails'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('create.empresa')}}</p>
            <p>{{session('create.encuesta')}}</p>
            <p>{{session('create.dato')}}</p>
            <p>{{session('create.automatizacion')}}</p>
            <p>{{session('update.mensaje')}}</p>
            <p>{{session('import.emails')}}</p>
        </div>
    @endif
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
            </ul>
        </section>
    </article>
@endsection