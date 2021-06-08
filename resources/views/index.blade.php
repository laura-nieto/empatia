@extends('layouts.app')
@section('title','Empatia 360°')
@section('main')  
    @if (session('create.empresa') || session('create.encuesta') || session('create.dato'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            {{ session('create.empresa') }}
            {{ session('create.encuesta') }}
            {{ session('create.dato') }}
        </div>
    @endif
    <article class="article__index">
        <section>
            <h3>Enviar</h3>
            <ul class="section--ul">
                <li><a href="/enviar/clima-laboral">Clima Laboral</a></li>
                <li><a href="/enviar/desempenio-laboral">Evaluación de Desempeño</a></li>
                <li><a href="/enviar/automatizacion">Automatización de Pruebas</a></li>
            </ul>
        </section>
        <section>
            <h3>Reportes</h3>
            <ul class="section--ul">
                <li><a href="/reporte/clima-laboral">Clima Laboral</a></li>
                <li><a href="/reporte/desempenio-laboral">Evaluación de Desempeño</a></li>
                <li><a href="/reporte/automatizacion">Automatización de Pruebas</a></li>
            </ul>
        </section>
        <section>
            <h3>Modificar</h3>
            <ul class="section--ul">
                <li><a href=""></a></li>
                <li><a href="">E-mail</a></li>
                <li><a href="">Mensaje de Bienvenida</a></li>
            </ul>
        </section>
        <section>
            <h3>Empresa</h3>
            <ul class="section--ul">
                <li><a href="/new/empresa">Agregar empresa</a></li>
            </ul>
        </section>
        <section>
            <h3>Dato Demográfico</h3>
            <ul class="section--ul">
                <li><a href="/new/dato">Agregar dato nuevo</a></li>              
            </ul>
        </section>
    </article>
@endsection