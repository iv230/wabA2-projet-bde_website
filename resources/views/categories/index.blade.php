<!DOCTYPE html>
<html>
  <head>
    <title>Categories</title>
  </head>
  <body>
    @foreach ($categories as $category)
    <h1>Category {{ $category->id }}</h1>
    <ul>
      <li>Name: {{ $category->name }}</li>
    </ul>
    @endforeach
  </body>
</html>