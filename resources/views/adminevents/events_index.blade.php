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
    <h2 class="t1"> Évènements du mois</h2>
    <p class="t2"> Inscrivez-vous à nos évènements du moment !</p>


    @foreach ($events as $event)
    @if ($event->state == 1)

    <hr>
    <div class="event">
        @if(isset($event->image))
        <img class="img_event" src="{{ $event->image->path }}" alt="Image de couverture">
        @else
        <img class="img_event" src="/img/event.jpg" alt="Image de couverture">
        @endif
        <div class=texte>
            <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
            <p class="location">{{ $event->location }}, {{$event->time_event}}</p>
            <h2 class="name">{{ $event->name }}</h2>
            <p class="description">{{ substr($event->description,0,150) }}...</p>

            <a class="show" href="/adminevents/{{ $event->id }}"> Éditer </a>
        </div>
    </div>
    @endif

    @endforeach
</article>
<a class="create" href="/adminevents/create"> Ajouter un évènement </a>
<a class="create" href="{{ route('zip-archive',['download'=>'zip']) }}"> Télécharger toutes les photos </a>

<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements passés</h2>
    <p class="t2"> Commentez et ajoutez des photos !</p>

    @foreach ($events as $event)
    @if ($event->state == 0)

    <hr>
    <div class="event">
        @if(isset($event->image))
        <img class="img_event" src="{{ $event->image->path }}" alt="Image de couverture">
        @else
        <img class="img_event" src="/img/event.jpg" alt="Image de couverture">
        @endif
        <div class=texte>
            <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
            <p class="location">{{ $event->location }}, {{$event->time_event}}</p>
            <h2 class="name">{{ $event->name }}</h2>
            <p class="description">{{substr($event->description,0,100) }}...</p>

            <a class="show" href="/adminevents/{{ $event->id }}"> Editer </a>
        </div>
    </div>

    @endif
    @endforeach
</article>

@endsection
