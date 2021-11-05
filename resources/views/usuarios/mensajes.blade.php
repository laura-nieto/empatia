@extends('layouts.app')
@section('title','Editar Mensajes - Empatia 360°')
@section('main')
    <h2 class="h2__title">Editar Mensajes del E-mail</h2>
    <div class="modify_container">
        <form action="" method="post" class="modify__form">
            @csrf
            @if(Auth::user()->permisos->clima)
            <div class="mb-3">
                <h3 class="mb-1">Clima Laboral</h3>
                <textarea id="clima" class="ck-content" name="clima">
                    @if($mensajes->clima != null)
                        {!! $mensajes->clima !!}
                    @endif
                </textarea>
            </div>
            @endif
            @if(Auth::user()->permisos->desempenio)
            <div class="mb-3">
                <h3 class="mb-1">Desempeño Laboral</h3>
                <textarea id="desempenio" class="ck-content" name="desempenio">
                    @if($mensajes->desempenio != null)
                        {!! $mensajes->desempenio !!}
                    @endif
                </textarea>
            </div>
            @endif
            @if(Auth::user()->permisos->automatizacion())
            <div class="mb-3">
                <h3 class="mb-1">Automatización de Pruebas</h3>
                <textarea id="automatizacion" class="ck-content" name="automatizacion">
                    @if($mensajes->automatizacion != null)
                        {!! $mensajes->automatizacion !!}
                    @endif
                </textarea>
            </div>
            @endif
            <input type="submit" value="Modificar" class="btn editor__submit margin-bot">
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/es.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#clima'), {
                language: 'es',
                toolbar: ['heading', '|', 'bold', 'italic', ],
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#desempenio'), {
                language: 'es',
                toolbar: ['heading', '|', 'bold', 'italic', ],
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#automatizacion'), {
                language: 'es',
                toolbar: ['heading', '|', 'bold', 'italic', ],
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
