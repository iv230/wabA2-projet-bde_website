<!DOCTYPE html>
<html>
  <head>
    <title>Articles</title>
  </head>
  <body>
    @foreach ($articles as $article)
    <h1>Article {{ $article->id }}</h1>
    <ul>
      <li>{{ $article->urlImage}}</li>
      <li>Name: {{ $article->name }}</li>
      <li>Price: {{ $article->price }}</li>
      <li>Description: {{ $article->description }}</li>
      <li>Stock: {{ $article->stock }}</li>
      <li>Purchase number: {{ $article->purchaseNumber }}</li>
    </ul>
    @endforeach
  </body>
</html>