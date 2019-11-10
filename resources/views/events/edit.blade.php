<!DOCTYPE html>
<html>
  <head>
    <title>Event Edition {{ $event->id }}</title>
  </head>
  <body>

    <h1>Edition Event {{ $event->id }} :</h1>


  <form action="/events/{{$event->id}}" method="POST">
  @csrf
  {{ method_field('PATCH') }}

    <div>
      <input type="text" name="name" value="{{ $event-> name }}" placeholder="New name">
    </div>

    <div>
      <textarea name="description" placeholder="New description">{{ $event-> description }}</textarea>
    </div>

    <div>
      <input type="text" name="location" value="{{ $event-> location }}" placeholder="New location">
    </div>

    <div>
      <input type="text" name="recurrence" value="{{ $event-> recurrence }}" placeholder="New recurrence">
    </div>

    <div>
      <input type="date" name="date_event" value="{{ $event-> date_event }}" placeholder="New date">
    </div>

    <div>
      <input type="number" name="price" value= "{{ $event-> price}}" placeholder="New price">
    </div>

    <div>
      <input type="number" name="state" value= "{{ $event-> state}}" min="0" max="1" placeholder="New state">
    </div>

    <div>
      <button type="submit"> Edit </button>
    </div>

  </form>

  </body>
</html>