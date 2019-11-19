@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<article class="events">

    <h1 class="name">{{ $event->name }}</h1>
    <h3 class="event_date">{{ $event->date_event }} {{ $event->recurrence }}</h3>
    <p class="location">{{ $event->location }}, {{$event->time_event}}</p>

    <div class="event">
        @if(isset($event->image))
        <img class="img_event" src="{{ $event->image->path }}" alt="Image de couverture">
        @else
        <img class="img_event" src="/img/event.jpg" alt="Image de couverture">
        @endif
        <div class=texte>
            <p class="description">{{ $event->description}}</p>
        </div>
    </div>
    @if($event->price == 0)
    <p class="price">Participation gratuite</p>
    @else
    <p class="price">Coût de l'évènement : {{$event->price}} EUR</p>
    @endif



    @if(session()->has('user'))
    @if (session('role') == 2)
    <div class="participate">
        <a href="/participants/{{ $event->id }}">Dl</a>
        <!--<a href="http://localhost:3000/participants/{{ $event->id }}" download="Liste_des_participants.csv">Liste des participants</a>-->
    </div>
    @endif
    @endif
    <div class="buttons_action">
        <a class="like" href="">J'aime (15)</a><br>
    </div>
    @if ($event-> state == 1)

    <div class="participate">
        <form action="/participants" method="POST">
            @csrf

            <div>
                <button type="submit"> Participer </button>
            </div>

            <input type="hidden" name="iduser" value="{{ session('user') }}">


            <input type="hidden" name="idevent" value="{{$event->id}}">
        </form>
    </div>
    @endif
    <br>
    <div class="adminevents">
        <form method="POST" action="/adminevents/{{ $event->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="show" value="Supprimer" />
        </form>
        <a class="show" href="/adminevents/{{ $event->id }}/edit"> Editer </a>

    </div>

    <div class="action">
        <a class="show" href="/adminevents"> Retourner à la liste des évènements </a>
        @if(session()->has('user'))
        @if (session('role') == 2 || session('role') == 4)

        <a class="show" href="/participants/{{ $event->id }}">Télécharger la liste des participants</a>

        @endif
        @endif
    </div>
</article>


@if($event->state == 0)
<article class="comments">
@foreach ($comments as $comment)
    @if ($comment->id_event == $event->id)
    <p class="comment">{{ $comment->comment_date }} | {{ $comment->autor }}: <br> {{ $comment->comment_content }}</p>
    @endif
    @endforeach

    @if(session()->has('user'))

    <div class="to_comment">
        <h3 class="t3">Commenter:</h3>

        <form action="/comments" method="POST">
            {{ csrf_field() }}

            <div>
                {!! $errors->first('comment_content', '<small>:message</small>') !!}

                <textarea name="comment_content" rows="3" cols="30" placeholder="..."></textarea>

            </div>


            <button type="submit"> Ajouter </button>
            <input type="hidden" name="idevent" value="{{$event->id}}">
            <input type="hidden" name="autor" value="{{ session('username') }}">

        </form>
    </div>
    @endif
</article>
@endif

@endsection