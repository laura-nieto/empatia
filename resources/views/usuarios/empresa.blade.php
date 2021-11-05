@extends('layouts.app')
@section('title','Editar Imágen Empresa - Empatia 360°')
@section('main')
    <h2 class="h2__title">Editar Imágen Empresa</h2>
    <article class="article__logo">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-modify-logo">
                <div class="div__img">
                    @if ($empresa->logo != null)
                        <figure>
                            <img src="{{asset('img/empresas/'.$empresa->logo)}}" alt="Logo de la empresa" class="img-preview">
                            <figcaption class="figure-caption">Imágen cargada.</figcaption>
                        </figure>
                    @else
                        <p>No hay imágen cargada</p>
                    @endif
                </div>
                <div class="div__file">
                    <input type="file" name="logo" id="logo">
                </div>
            </div>
            <div class="mt-3 desempenio-modify">
                <input type="submit" value="Modificar" class="btn link-color">
            </div>
        </form>
    </article>
@endsection
