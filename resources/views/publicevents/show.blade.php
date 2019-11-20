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



    <div class="buttons_action">
        <form action="/like" method="POST">
            {{ csrf_field() }}
            <button type="submit"> Like ({{ $likeCount }}) </button>
            <input type="hidden" name="id_event" value="{{ $event->id }}">
            <input type="hidden" name="id_user" value="{{ session('user') }}">
        </form>
        <br>
    </div>

    @if ($event-> state == 1)

    <div class="participate">
        <form action="/participants" method="POST">
            @csrf

            <div>
                <button type="submit"> Participer </button>
            </div>

            <input type="hidden" name="id_user" value="{{ session('user') }}">

            <input type="hidden" name="id_event" value="{{$event->id}}">
        </form>
    </div>

    <br>

    @endif
    <div class="action">
        <a class="show" href="/publicevents"> Retourner à la liste des évènements </a>
        @if(session()->has('user'))
        @if (session('role') == 2 || session('role') == 4)

        <a class="show" href="/participants/{{ $event->id }}">Télécharger la liste des participants</a>

        @endif
        @endif
    </div>
</article>


@if($event->state == 0)
<article class="comments">

    <h3 class="t3">Photos des utilisateurs :</h3>
    <div class="add_img">
        @foreach($images as $image)
        <img class="added_img" src="{{ $image->path }}" alt="Image de l'évènement" />
        @endforeach
    </div>

    @if(session()->has('user'))

    <form action="/publicevents/postphoto" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            {!! $errors->first('photo', '<small>:message</small>') !!}
            <input type="file" name="photo">
        </div>

        <div>
            <button type="submit"> Ajouter une photo </button>
        </div>

        <input type="hidden" name="id_user" value="{{ session('user') }}">

        <input type="hidden" name="id_event" value="{{$event->id}}">
    </form>
    @endif

    <hr>

    @foreach ($comments as $comment)
    @if ($comment->id_event == $event->id)
    <p class="comment">{{ $comment->comment_date }} | {{ $comment->autor }}: <br> {{ $comment->comment_content }}</p>

    @if(session()->has('user'))
    @if(session('role') >= 3)
    <form action="/comments/{{ $comment->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit"> Supprimer </button>
    </form>
    @endif
    @endif
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
