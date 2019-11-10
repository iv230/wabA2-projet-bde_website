<!DOCTYPE html>
<html>
  <head>
    <title>Events</title>
  </head>
  <body>
    @foreach ($events as $event)
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
    @endforeach
  </body>
</html>