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
    <h3>Comments: </h3>
    @foreach ($comments as $comment)
    <h4>Comment {{ $comment->id }}</h4>
    <ul>
      <li>{{ $comment->comment_date }} / {{ $comment->autor }}: </li>
      {{ $comment->comment_content }} 
    </ul>
    @endforeach
  </body>
</html>