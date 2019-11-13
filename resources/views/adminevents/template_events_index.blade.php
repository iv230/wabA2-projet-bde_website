@extends('welcome')

@section('welcome_events')
<aside>
      
      <img class="welcome" src="/img/fond_events.jpg" alt="Events">
      <h1> PARTIPEZ À NOS ÉVÈNEMENTS ! </h1>
      
</aside>
@endsection


@section('actual_events')
<article>
      <h2> Évènements actuels </h2>
      <h3> Inscrivez-vous à nos évènements du moment !</h2>

      
      @foreach ($events as $event)

        <div class="event">
        <img class="img_event" src="/img/event.jpg" > 
        <div class=texte>
        <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
        <p class="location">{{ $event->location }}</p>
        <h1 class="name">{{ $event->name }}</h1>
        <p class="description">{{ $event->description }}</p>
        
        <p>State: {{ $event->state }}</p>
        <a class="show" href="/adminevents/{{ $event->id }}"> Editer </a>
        </div>
        </div>
    
      @endforeach
</article>
@endsection

@section('past_events')
<article>
      <h2> Évènements passés </h2>
      <h3> Commentez et ajoutez des photos !</h2>
</article>
@endsection