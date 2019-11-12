<!DOCTYPE html>
<html>
  <head>
    <title>Event {{ $event->id }}</title>
  </head>
  <body>
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
    <a href="/adminevents/{{ $event->id }}/edit"> Edition </a>
    <a href="/adminevents/{{ $event->id }}/delete"> Delete </a>
  </body>
</html>