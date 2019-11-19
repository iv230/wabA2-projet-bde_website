<!DOCTYPE html>
<html>
  <head>
    <title>Panier</title>
  </head>
  <body>
    <h1>Votre panier :</h1>
    @foreach ($articles as $article)
    <h2><a href='/shop/{{ $article->id }}'>Article {{ $article->id }}</a></h2>
    <ul>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
    </ul>
    @endforeach
    <input type='button' value='Valider les achats'>
  </body>
</html>
