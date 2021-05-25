@extends('layouts.app')
@section('title','Elegir Empresa - Empatia 360°')
@section('main')
<h2 class="h2__title">Elegir Empresa</h2>
    <ul class="ul__empresa">
        @foreach ($empresas as $empresa)
            <li><a href="{{request()->url()}}/{{$empresa->id}}">{{$empresa->nombre}}</a></li>
        @endforeach
    </ul>
@endsection