<!DOCTYPE html>
<html>
  <head>
    <title>Articles</title>
  </head>
  <body>
    @foreach ($articles as $article)
    <h1>Article {{ $article->id }}</h1>
    <img src='{{ $article->image }}' alt='Ceci est une image'/>
    <ul>
      <li>Nom image : {{ $article->image }}</li>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
      <li>Description: {{ $article->description }}</li>
      <li>Stock: {{ $article->stock }}</li>
      <li>Purchase number: {{ $article->purchaseNumber }}</li>
      <li>Catégorie: {{ $article->category }}</li>
    </ul>
    @endforeach
  </body>
</html>