@extends('layouts.app')
@section('title','Eliminar Empresa - Empatia 360°')
@section('main')
    @if (session('delete.empresa'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('delete.empresa')}}</p>
        </div>
    @endif
    <h2 class="h2__title">Eliminar Empresa</h2>
    <ul class="ul__persona">
        @foreach ($empresas as $empresa)
            <li>
                <a href="/delete/empresa/{{$empresa->id}}">
                    {{$empresa->nombre}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection