@extends('layouts.encuesta')
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        {!! $mensaje !!}
    </section>
    <form action="" method="post" class="acept--terms">
        @csrf
        <button class="btn-terms btn-no" name="false">No acepto</button>
        <button class="btn-terms btn-yes" name="true">Acepto</button>
    </form>
</article>
@endsection
