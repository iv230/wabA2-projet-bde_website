<!DOCTYPE html>
<html>
  <head>
    <title>Comments</title>
  </head>
  <body>
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