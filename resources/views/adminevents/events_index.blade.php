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
<button onclick="download_images_into_zip();">Télécharger toutes les photos</button>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/js/jszip.debug.js" charset="utf-8"></script>

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
