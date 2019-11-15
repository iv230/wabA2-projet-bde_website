<!DOCTYPE html>
<html>
  <head>
    <title>Articles</title>
  </head>
  <body>
    <input type='button' value='Panier' onclick="location.href='/basket';">
    @foreach ($articles as $article)
    <h1><a href='/shop/{{ $article->id }}'>Article {{ $article->id }}</a></h1>
    <img src='{{ $article->image }}' alt='Ceci est une image'/>
    <ul>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
    </ul>
    @endforeach
  </body>
</html>