<!DOCTYPE html>
<html>
  <head>
    <title>Article {{ $article->id }}</title>
  </head>
  <body>
    <h1>Article {{ $article->id }}</h1>
    <ul>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
      <li>Description: {{ $article->description }}</li>
      <li>Catégorie: {{ $category->name }}</li>
    </ul>
    <form action="/shop/{{ $article->id }}/addtocart" method="POST">
        {{ csrf_field() }}
      <button type=submit>Ajouter au panier</button>
    </form>
    <div>
      <input type='button' value='Supprimer' onclick="location.href='/adminshop/{{ $article->id }}/delete';">
    </div>
    <div>
      <input type='button' value='Modifier' onclick="location.href='/adminshop/{{ $article->id }}/edit';">
    </div>
  </body>
</html>
