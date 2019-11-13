<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Events</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  </head>
  <body>
    <aside>
      
      <img class="welcome" src="/img/fond_events.jpg" alt="Events">
      <h1> PARTIPEZ À NOS ÉVÈNEMENTS ! </h1>
      
      

    </aside>
    <div class="blue_bar">
    </div>


    <main>

      <article>
      <h2> Évènements actuels </h2>
      <h3> Inscrivez-vous à nos évènements du moment !</h2>

      
      @foreach ($events as $event)
      @if ($event->state == 1)

        <div class="event">
        <img class="img_event" src="/img/event.jpg" > 
        <div class=texte>
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h1 class="name">{{ $event->name }}</h1>
        <p class="description">{{ $event->description }}</p>
        
        <p>State: {{ $event->state }}</p>
        <a class="show" href="/publicevents/{{ $event->id }}"> En savoir plus </a>
        </div>
        </div>
      @endif
      @endforeach
      </article>
      <div class="blue_bar">
    </div>
    <article>
      <h2> Évènements passés </h2>
      <h3> Commentez et ajoutez des photos !</h2>


      @foreach ($events as $event)
      @if ($event->state == 0)

        <div class="event">
        <img class="img_event" src="/img/event.jpg" > 
        <div class=texte>
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h1 class="name">{{ $event->name }}</h1>
        <p class="description">{{ $event->description }}</p>
        
        <p>State: {{ $event->state }}</p>
        <a class="show" href="/publicevents/{{ $event->id }}"> En savoir plus </a>
        </div>
        </div>
      @endif
      @endforeach
    </main>
  </body>
</html>