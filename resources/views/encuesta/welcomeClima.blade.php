@extends('layouts.encuesta')
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        <h2>Bienvenido!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam nemo voluptatibus, quis aliquam placeat ullam
            blanditiis aut officiis sed iste? Distinctio accusamus cum accusantium eum? Repudiandae tempore deleniti natus
            obcaecati ut vitae non culpa aperiam eligendi est ab, animi inventore, magnam suscipit, quia quisquam saepe?
            Inventore minima placeat animi possimus repellendus officiis architecto nobis quisquam error iure iste ullam
            accusantium dolor earum quidem aspernatur, distinctio vel odit esse reiciendis porro, nam ea dolores? Architecto
            cumque aperiam totam voluptas, hic repudiandae nam quod consequatur accusamus, expedita mollitia ipsum maiores
            minus sunt ex explicabo laboriosam obcaecati quis dolore ratione numquam reiciendis optio.
        </p>
    </section>
    <section class="section--margin">
        <h4 class="">Lorem ipsum dolor sit.</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis quae maxime accusantium autem nulla in,
            voluptate facere quo dolores odit hic. Harum aliquid labore delectus. Praesentium eum, vel quisquam magni
            laboriosam reiciendis cumque aspernatur delectus fugiat sit, ab rerum sint libero pariatur impedit repellendus.
            Totam minus tenetur, hic eos expedita error. Debitis dolorem corporis ea. Consectetur nam itaque asperiores
            deserunt sunt voluptas eaque? Quidem, minima, quae delectus hic optio laudantium placeat facilis recusandae
            eligendi quos nemo ipsa nobis! Doloribus nam sint, adipisci quaerat consectetur eveniet amet quae vitae
            mollitia, iste id cupiditate provident? Dolorum voluptatem, neque totam iure distinctio repellendus?
        </p>
    </section>
    <section class="section--margin">
        <h4 class="">Lorem ipsum dolor sit.</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis quae maxime accusantium autem nulla in,
            voluptate facere quo dolores odit hic. Harum aliquid labore delectus. Praesentium eum, vel quisquam magni
            laboriosam reiciendis cumque aspernatur delectus fugiat sit, ab rerum sint libero pariatur impedit repellendus.
            Totam minus tenetur, hic eos expedita error. Debitis dolorem corporis ea. Consectetur nam itaque asperiores
            deserunt sunt voluptas eaque? Quidem, minima, quae delectus hic optio laudantium placeat facilis recusandae
            eligendi quos nemo ipsa nobis! Doloribus nam sint, adipisci quaerat consectetur eveniet amet quae vitae
            mollitia, iste id cupiditate provident? Dolorum voluptatem, neque totam iure distinctio repellendus?
        </p>
    </section>
    <form action="" method="post" class="acept--terms">
        @csrf
        <a class="btn-terms btn-no" href="/">No acepto</a>
        <button class="btn-terms btn-yes">Acepto</button>
    </form>
</article>
@endsection
