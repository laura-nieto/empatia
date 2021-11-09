@extends('layouts.app')
@section('title','Usuario - Empatia 360°')
@section('main')
    <h2 class="h2__title">Usuarios</h2>
    <article class="article-users-index">
        <form class="dg form--modify" method="POST" action="{{route('usuarios.update',$user->id)}}">
            @csrf
            @method('PUT')
            <div>
                <div class="form--desempeño__div">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="form--desempeño__div mt-3">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}">
                    @error('email')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="form--desempeño__div mt-3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                    @error('password')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="form--desempeño__div mt-3">
                    <label for="name">Empresa</label>
                    <select name="empresa_id" id="empresa_id">
                        @foreach ($empresas as $empresa)
                            @if ($empresa->id == $user->empresa_id)
                                <option value="{{$empresa->id}}" selected>{{$empresa->nombre}}</option>
                            @else
                                <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('empresa_id')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div>
                <h3 class="mb-1">Accesos</h3>
                <div class="mb-3 form-check-column">
                    <input type="hidden" name="clima" value="0">
                    <input type="checkbox" name="clima" id="clima" value="1" {{$user->permisos->clima ? 'checked':''}}>
                    <label for="clima" class="color-modulo"><strong>Clima</strong></label>
                </div>
                <div class="mb-3 form-check-column">
                    <input type="hidden" name="desempenio" value="0">
                    <input type="checkbox" name="desempenio" id="desempenio" value="1" {{$user->permisos->desempenio ? 'checked':''}}>
                    <label for="desempenio" class="color-modulo"><strong>Desempeño</strong></label>
                </div>
                <div class="mb-3">
                    <div class="mb-3 form-check-column">
                        <input type="checkbox" id="automatizacion">
                        <label for="automatizacion" class="color-modulo"><strong>Automatización</strong></label>
                    </div>
                    <ul class="section--ul">
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="kenstel" value="0">
                                <input type="checkbox" name="kenstel" id="kenstel" value="1" {{$user->permisos->kenstel ? 'checked':''}} class="checked">
                                <label for="kenstel" class="color-cuestionarios">Kenstel</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="moss" value="0">
                                <input type="checkbox" name="moss" id="moss" value="1" {{$user->permisos->moss ? 'checked':''}} class="checked">
                                <label for="moss" class="color-cuestionarios">Moss</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="barsit" value="0">
                                <input type="checkbox" name="barsit" id="barsit" value="1" {{$user->permisos->barsit ? 'checked':''}} class="checked">
                                <label for="barsit" class="color-cuestionarios">Barsit</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="kostick" value="0">
                                <input type="checkbox" name="kostick" id="kostick" value="1" {{$user->permisos->kostcik ? 'checked':''}} class="checked">
                                <label for="kostick" class="color-cuestionarios">Kostick</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="valanti" value="0">
                                <input type="checkbox" name="valanti" id="valanti" value="1" {{$user->permisos->valanti ? 'checked':''}} class="checked">
                                <label for="valanti" class="color-cuestionarios">Valanti</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="wonderlick" value="0">
                                <input type="checkbox" name="wonderlick" id="wonderlick" value="1" {{$user->permisos->wonderlick ? 'checked':''}} class="checked">
                                <label for="wonderlick" class="color-cuestionarios">Wonderlick</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="bfq" value="0">
                                <input type="checkbox" name="bfq" id="bfq" value="1" {{$user->permisos->bfq ? 'checked':''}} class="checked">
                                <label for="bfq" class="color-cuestionarios">BFQ</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="disc" value="0">
                                <input type="checkbox" name="disc" id="disc" value="1" {{$user->permisos->disc ? 'checked':''}} class="checked">
                                <label for="disc" class="color-cuestionarios">Disc</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="asertividad" value="0">
                                <input type="checkbox" name="asertividad" id="asertividad" value="1" {{$user->permisos->asertividad ? 'checked':''}} class="checked">
                                <label for="asertividad" class="color-cuestionarios">Asertividad</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="liderazgo" value="0">
                                <input type="checkbox" name="liderazgo" id="liderazgo" value="1" {{$user->permisos->liderazgo ? 'checked':''}} class="checked">
                                <label for="liderazgo" class="color-cuestionarios">Liderazgo</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="estres" value="0">
                                <input type="checkbox" name="estres" id="estres" value="1" {{$user->permisos->estres ? 'checked':''}} class="checked">
                                <label for="estres" class="color-cuestionarios">Estres</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="hidden" name="ice" value="0">
                                <input type="checkbox" name="ice" id="ice" value="1" {{$user->permisos->ice ? 'checked':''}} class="checked">
                                <label for="ice" class="color-cuestionarios">ICE</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="submit" class="btn" value="Modificar">
        </form>
    </article>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#automatizacion').on('change',function(){
            if($(this).is(':checked')){
                $('.checked').each(function(){
                    $(this).attr("checked",true);
                })
            }else{
                $('.checked').each(function(){
                    $(this).attr("checked",false);
                })
            }
        })
    </script>
@endsection