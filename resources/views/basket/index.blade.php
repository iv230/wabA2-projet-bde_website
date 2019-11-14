<!DOCTYPE html>
<html>
  <head>
    <title>Panier</title>
  </head>
  <body>
    <h1>Votre panier :</h1>
    @foreach ($articles as $article)
    <h2><a href='/articles/{{ $article->articleId }}'>Article {{ $article->articleId }}</a></h2>
    <img src='{{ $article->image }}' alt='Ceci est une image'/>
    <ul>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
    </ul>
    @endforeach
    <input type='button' value='Valider les achats' onclick="location.href='/purchases/';">
  </body>
</html>