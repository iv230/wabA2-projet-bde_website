<!DOCTYPE html>
<html>
  <head>
    <title>Article {{ $article->id }}</title>
  </head>
  <body>
    <h1>Article {{ $article->id }}</h1>
    <img src= 'storage/app/public/images/'.{{ $article->image }} alt="Ceci est une image" />
    <ul>
      <li>Nom image : {{ $article->image }}</li>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
      <li>Description: {{ $article->description }}</li>
      <li>Stock: {{ $article->stock }}</li>
      <li>Purchase number: {{ $article->purchaseNumber }}</li>
    </ul>
  </body>
</html>