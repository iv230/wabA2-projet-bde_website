
@extends('template_welcome')

@section('index_scss')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('admin')
    <a class="show_admin" href="/adminevents">Administration </a>
@endsection

@section('welcome_events')
<aside class="welcome">

      <img class="welcome_img" src="/img/fond_events.jpg" alt="Events">
      <h1 class="welcome_t"> PARTICIPEZ À NOS ÉVÈNEMENTS ! </h1>

</aside>
@endsection


@section('actual_events')
<article class="events">
      <h2 class="t1"> Évènements actuels </h2>
      <p class="t2"> Inscrivez-vous à nos évènements du moment !</p>


      @foreach ($events as $event)
      @if ($event->state == 1)

        <div class="event">
            @if(isset($event->image))
                <img class="img_event" src="{{ $event->image->path }}" alt="Image de couverture">
            @else
                <img class="img_event" src="/img/event.jpg" alt="Image de couverture">
            @endif
        <div class=texte>
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h2 class="name">{{ $event->name }}</h2>
        <p class="description">{{ substr($event->description,0,150) }}...</p>

        <a class="show" href="/publicevents/{{ $event->id }}"> En savoir plus </a>
        </div>
        </div>

      @endif
      @endforeach
</article>
@endsection

@section('past_events')
<article class="events">
      <h2 class="t1"> Évènements passés</h2>
      <p class="t2"> Commentez et ajoutez des photos !</p>

      @foreach ($events as $event)
      @if ($event->state == 0)

        <div class="event">
            @if(isset($event->image))
                <img class="img_event" src="{{ $event->image->path }}" alt="Image de couverture">
            @else
                <img class="img_event" src="/img/event.jpg" alt="Image de couverture">
            @endif
                <div class=texte>
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h2 class="name">{{ $event->name }}</h2>
        <p class="description">{{substr($event->description,0,100) }}...</p>

        <a class="show" href="/publicevents/{{ $event->id }}"> En savoir plus </a>
        </div>
        </div>

      @endif
      @endforeach

     </article>
@endsection
