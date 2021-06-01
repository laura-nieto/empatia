@extends('layouts.encuesta')
@section('main')
    <article class="article__instruction">
        <section class="section__instruction">
            <h4>Instrucciones Genereales</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque ut delectus, ea accusantium consequuntur
                quod, aliquid alias porro eaque consectetur perspiciatis, debitis optio eius nobis odit blanditiis. Quos rem
                libero exercitationem minima necessitatibus placeat voluptas voluptatem illo sapiente quasi quibusdam,
                obcaecati facere quis aut rerum repudiandae optio nihil officiis? Alias.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque ut delectus, ea accusantium consequuntur
                quod, aliquid alias porro eaque consectetur perspiciatis, debitis optio eius nobis odit blanditiis. Quos rem
                libero exercitationem minima necessitatibus placeat voluptas voluptatem illo sapiente quasi quibusdam,
                obcaecati facere quis aut rerum repudiandae optio nihil officiis? Alias.</p>
        </section>
        <section class="section__instruction2">
            <h4>Instrucciones para el llenado</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora ad dicta eligendi nesciunt aspernatur
                deserunt velit natus unde eaque inventore veniam animi rerum delectus earum, dignissimos iusto, numquam,
                laborum molestiae!</p>
            <ol>
                <li>No satisfecho</li>
                <li>Poco satisfecho</li>
                <li>Moderadamente satisfecho</li>
                <li>Muy satisfecho</li>
                <li>Extremadamente satisfecho</li>
            </ol>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo maxime similique soluta excepturi sunt! Nam?
            </p>
        </section>
        <form action="" method="post">
            @csrf
            <input type="submit" value="Siguiente" class="btn">
        </form>
    </article>
@endsection
