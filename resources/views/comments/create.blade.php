<!--<!DOCTYPE html>
<html>
  <head>
    <title>Comment</title>
  </head>
  <body>
    <h3>Comment:</h3>

    <form action="/comments/create" method="POST">
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
</html>-->