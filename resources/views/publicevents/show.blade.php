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


    <a href="">J'aime (15)</a>



    @if ($event-> state == 1)
    <a href="">Participer</a>
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

    <h3>Comment:</h3>

    <form action="/comments" method="POST">
    @csrf
      <div>
        <input type="text" name="autor" placeholder="Pseudo">
      </div>

      <div>
        <textarea name="comment_content" placeholder="..."></textarea>
      </div>

      <div>
        <button type="submit"> Comment </button>
      </div>

      <input type="hidden" name="idevent" value="{{$event->id}}">

    </form>
  </body>
</html>
