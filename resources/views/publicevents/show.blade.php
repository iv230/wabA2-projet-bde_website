<!DOCTYPE html>
<html>
  <head>
    <title>Event {{ $event->id }}</title>
  </head>
  <body>
    <div>
        <h1>Event {{ $event->id }}</h1>
      <ul>
        <li>Name: {{ $event->name }}</li>
        <li>Description: {{ $event->description }}</li>
        <li>Location: {{ $event->location }}</li>
        <li>Recurrence: {{ $event->recurrence }}</li>
        <li>Event date: {{ $event->date_event }}</li>
        <li>Price: {{ $event->price }}</li>
        <li>State: {{ $event->state }}</li>
      </ul>
    </div>

    {!! Form::open(array('method'=>'post','class'=>$event->id,
  'action'=>'HomeController@imagelike')) !!}
    {!! Form::hidden('idevent', $event->id) !!}
    {!! Form::submit('',array('class'=>'btn btn-primary cherry','id'=>$event->id)) !!}
    {!!$event->likes!!}
    <a class="btn btn-default" role="button" data-toggle="modal" data-target="#mypop{{$index}}">Comment</a>
    {!! Form::close() !!}

    <span class="likebtn-wrapper" data-lang="fr" data-ef_voting="heartbeat" data-identifier="item_1"></span>
    <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>

    @if(session()->has('user'))
    @if (session('role') == 2)
        <a href="/participants/{{ $event->id }}">Dl</a>
    <!--<a href="http://localhost:3000/participants/{{ $event->id }}" download="Liste_des_participants.csv">Liste des participants</a>-->
    @endif
    @endif

    @if ($event-> state == 1)

    <form action="/participants" method="POST">
    @csrf

      <div>
        <button type="submit"> Participate </button>
      </div>

      <input type="hidden" name="iduser" value="{{ session('user') }}">

      <input type="hidden" name="idevent" value="{{$event->id}}">
    </form>

    @endif

    @if($event-> state == 0)

    @endif

    <h3>Comments: </h3>
    @foreach ($comments as $comment)
    @if ($comment->id_event == $event->id)
    <!--<h4>Comment {{ $comment->id }}</h4>-->
    <ul>
      <li>{{ $comment->comment_date }} | {{ $comment->autor }}: </li>
      {{ $comment->comment_content }}
    </ul>
    @endif
    @endforeach

    @if(session()->has('user'))

    <h3>Comment:</h3>

    <form action="/comments" method="POST">
    @csrf

      <div>
        <input type="hidden" name="autor" value="{{ session('username') }}">
      </div>

      <div>
        {!! $errors->first('comment_content', '<small>:message</small>') !!}
        <textarea name="comment_content" placeholder="..."></textarea>
      </div>

      <div>
        <button type="submit"> Comment </button>
      </div>

      <input type="hidden" name="idevent" value="{{$event->id}}">

    </form>
    @endif


  </body>
</html>
