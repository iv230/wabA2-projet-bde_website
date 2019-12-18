@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('admin')
<a class="show_admin" href="/publicevents">Site public </a>
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
<a class="create" href="/adminevents/create"> Ajouter un évènement </a>
<a class="create" href="{{ route('zip-archive',['download'=>'zip']) }}"> Télécharger toutes les photos </a>

<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements passés</h2>
    <p class="t2"> Commentez et ajoutez des photos !</p>

    @foreach($passedEvents as $event)
    @include('adminevents.index_event', ['event' => $event])
    @endforeach
</article>
@endsection