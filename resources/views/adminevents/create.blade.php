<!DOCTYPE html>
<html>
  <head>
    <title>Creation</title>
  </head>
  <body>

    <h1>Event Creation :</h1>


  <form action="/adminevents" method="POST">
  @csrf

    <div>
      <input type="text" name="name" placeholder="Event name">
    </div>

    <div>
      <textarea name="description" placeholder=" Event description"></textarea>
    </div>

    <div>
      <input type="text" name="location" placeholder="Event location">
    </div>

    <div>
      <input type="text" name="recurrence" placeholder="Event recurrence">
    </div>

    <div>
      <input type="date" name="date_event" placeholder="Event date">
    </div>

    <div>
      <input type="number" name="price" placeholder="Price">
    </div>

    <div>
      <button type="submit"> Add </button>
    </div>

  </form>

  </body>
</html>