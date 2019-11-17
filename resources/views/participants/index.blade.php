<!DOCTYPE html>
<html>
  <head>
    <title>Participants</title>
  </head>
  <body>
    <h2>Participants Evenements: </h2>
    @foreach ($participants as $participant)
    <ul>
      <li>Name: {{ $participant->id_event }}</li>
      <li>Email: {{ $participant->id_user }}</li>
    </ul>
    @endforeach
  </body>
</html>