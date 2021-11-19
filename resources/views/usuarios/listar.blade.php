@extends('layouts.app')
@section('title','Usuario - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Usuarios</h2>
    <div class="mb-3 desempenio-modify">
        <a href="{{route('usuarios.create')}}" class="btn link-color color-white">Nuevo</a>
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
