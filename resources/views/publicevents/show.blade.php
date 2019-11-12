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
    @foreach ($comments as $comment)
    <h2>Comments {{ $comment->id }}</h2>
    <ul>
      <li>Autor: {{ $comment->autor }}</li>
      <li>Content: {{ $comment->comment_content }}</li>
      <li>Date: {{ $comment->comment_date }}</li>
    </ul>
    @endforeach
  </body>
</html>