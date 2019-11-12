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


    <main>
      <article>
      <h2> Évènements actuels </h2>
      <h3> Inscrivez-vous à nos évènements du moment !</h2>

      
      @foreach ($events as $event)

        <div class="image_event">  
        <img class="event" src="/img/event.jpg" > 
        </div>

        <div class="event">
        
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h1 class="name">{{ $event->name }}</h1>
        <p class="description">{{ $event->description }}</p>
        
        <p>State: {{ $event->state }}</p>
        <a class="show" href="/adminevents/{{ $event->id }}/edit"> En savoir plus </a>
        </div>
    
      @endforeach
      </article>
    </main>
  </body>
</html>