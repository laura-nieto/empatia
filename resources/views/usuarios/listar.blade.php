@extends('layouts.app')
@section('title','Usuario - Empatia 360°')
@section('main')
    <h2 class="h2__title">Usuarios</h2>
    <div class="mb-3 desempenio-modify">
        <a href="{{route('usuarios.create')}}" class="btn link-color">Nuevo</a>
    </div>
    <article class="article-users-index">
        <table class="form--clima__table ancho-completo">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td class="break-word">{{$user->email}}</td>
                    <td>{{$user->empresas->nombre}}</td>

                    <td class="text-center desempenio-modify">
                        <a href="{{url('/usuarios/'.$user->id.'/edit')}}"><img src="{{asset('/img/edit.png')}}" alt="Icono editar" class="img--success mr-1"></a>
                        <form action="{{route('usuarios.destroy',$user->id)}}" method="post" id="form-borrar">
                            @csrf
                            @method('delete')
                            <button type="submit" class="no-button"><img src="{{asset('/img/cancel.png')}}"
                                    alt="Icono borrar" class="img--success mr-1"></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
@endsection
