@extends('layouts.app')
@section('title','Usuario - Empatia 360°')
@section('main')
    <h2 class="h2__title">Usuarios</h2>
    <article class="article-users-index">
        <form class="dg form--modify" method="POST" action="{{route('usuarios.store')}}">
            @csrf
            <div>
                <div class="form--desempeño__div">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name">
                    @error('name')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="form--desempeño__div mt-3">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
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
                        <option selected disabled hidden>Seleccionar Empresa</option>
                        @foreach ($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
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
                    <input type="checkbox" name="clima" id="clima" value="1">
                    <label for="clima">Clima</label>
                </div>
                <div class="mb-3 form-check-column">
                    <input type="checkbox" name="desempenio" id="desempenio" value="1">
                    <label for="desempenio">Desempeño</label>
                </div>
                <div class="mb-3">
                    <p class="mb-1"><strong>Automatización</strong></p>
                    <ul class="section--ul">
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="kenstel" id="kenstel" value="1">
                                <label for="kenstel">Kenstel</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="moss" id="moss" value="1">
                                <label for="moss">Moss</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="barsit" id="barsit" value="1">
                                <label for="barsit">Barsit</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="kostick" id="kostick" value="1">
                                <label for="kostick">Kostick</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="valanti" id="valanti" value="1">
                                <label for="valanti">Valanti</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="wonderlick" id="wonderlick" value="1">
                                <label for="wonderlick">Wonderlick</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="bfq" id="bfq" value="1">
                                <label for="bfq">BFQ</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="disc" id="disc" value="1">
                                <label for="disc">Disc</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="asertividad" id="asertividad" value="1">
                                <label for="asertividad">Asertividad</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="liderazgo" id="liderazgo" value="1">
                                <label for="liderazgo">Liderazgo</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="estres" id="estres" value="1">
                                <label for="estres">Estres</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check-column pl-3">
                                <input type="checkbox" name="ice" id="ice" value="1">
                                <label for="ice">ICE</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="submit" class="btn" value="Crear">
        </form>
    </article>
@endsection