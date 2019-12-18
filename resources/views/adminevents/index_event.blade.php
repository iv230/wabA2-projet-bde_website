<hr>
@if($event->hidden)
    <p class="masked"> Cet évennement est masqué au public !</p>
    @endif
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