@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('admin')
<a class="show_admin" href="/publicevents">Site public </a>
@endsection

@section('bootstrap')
<!--bootstrap css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--bootstrap css-->

<!--bootstrap popper and js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--bootstrap popper and js-->
@endsection

@section('search_bar')
<div class="md-form mt-0">
    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
</div>
@endsection

@section('content')
<aside class="welcome">

    <img class="welcome_img" src="/img/fond_events.jpg" alt="Events">
    <h1 class="welcome_t"> PARTICIPEZ À NOS ÉVÈNEMENTS ! </h1>

</aside>

<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements du mois </h2>
    <p class="t2"> Inscrivez-vous à nos évènements du moment !</p>

    @foreach($monthEvents as $event)
    @include('adminevents.index_event', ['event' => $event])
    @endforeach
</article>


<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements à venir</h2>
    <p class="t2"> Inscrivez-vous pour plus tard !</p>

    @foreach($nextEvents as $event)
    @include('adminevents.index_event', ['event' => $event])
    @endforeach
</article>


<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements passés</h2>
    <p class="t2"> Commentez et ajoutez des photos !</p>

    @foreach($passedEvents as $event)
    @include('adminevents.index_event', ['event' => $event])
    @endforeach
</article>
@endsection