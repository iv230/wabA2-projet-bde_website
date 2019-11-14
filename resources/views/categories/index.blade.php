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
    <input type='button' value='edit' onclick="location.href='/categories/{{ $category->id }}/edit';">
    @endforeach
    <div>
      <input type='button' value='create' onclick="location.href='/categories/create';">
    </div>
  </body>
</html>