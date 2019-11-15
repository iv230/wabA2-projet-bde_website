<!DOCTYPE html>
<html>
  <head>
    <title>Creation</title>
  </head>
  <body>

    <h1>Event Creation :</h1>


  <form action="/adminevents" method="POST" enctype="multipart/form-data">
  @csrf

    <div>
        {!! $errors->first('name', '<small>:message</small>') !!}
        <input type="text" name="name" placeholder="Event name">
    </div>

    <div>
        {!! $errors->first('description', '<small>:message</small>') !!}
        <textarea name="description" placeholder=" Event description"></textarea>
    </div>

    <div>
        {!! $errors->first('location', '<small>:message</small>') !!}
        <input type="text" name="location" placeholder="Event location">
    </div>

    <div>
        {!! $errors->first('recurrence', '<small>:message</small>') !!}
        <input type="text" name="recurrence" placeholder="Event recurrence">
    </div>

    <div>
        {!! $errors->first('date_event', '<small>:message</small>') !!}
        <input type="date" name="date_event" placeholder="Event date">
    </div>

      <div>
          {!! $errors->first('time', '<small>:message</small>') !!}
          <input type="time" name="time" placeholder="Heure de l'évènement">
      </div>

    <div>
        {!! $errors->first('price', '<small>:message</small>') !!}
        <input type="number" name="price" placeholder="Price">
    </div>

    <div>
        {!! $errors->first('photo', '<small>:message</small>') !!}
        <input type="file" name="photo">
    </div>

    <div>
      <button type="submit"> Add </button>
    </div>

  </form>

  </body>
</html>
