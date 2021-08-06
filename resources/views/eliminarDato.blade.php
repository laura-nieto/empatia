@extends('layouts.app')
@section('title','Eliminar Dato Demográfico - Empatia 360°')
@section('main')
    @if (session('delete.dato'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('delete.dato')}}</p>
        </div>
    @endif
    <h2 class="h2__title">Eliminar Dato</h2>
    <ul class="ul__persona">
        @foreach ($datos as $dato)
            <li>
                <a href="/delete/dato/{{$dato->id}}">
                    {{$dato->nombre_dato}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection