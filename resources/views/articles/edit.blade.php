<!DOCTYPE html>
<html>
    <head>
        <title>Modifier Article #{{ $article->id }}</title>
    </head>
    <body>
        <h1>Modifier Article #{{ $article->id }}</h1>
        <div class="input-group">
            <label>Nom</label>
            <input type="text" name="name" placeholder="Nom de l'article" value="{{ $article->name }}"/>
        </div>
        <div class="input-group">
            <label>Prix</label>
            <input type="number" name="price" placeholder="Prix de l'article" value="{{ $article->price }}"/>
        </div>
        <div class="input-group">
            <label>Image</label>
            <input type="text" name="urlImage" placeholder="Image de l'article" value="{{ $article->urlImage }}"/>
        </div>
        <div class="input-group">
            <label>Description</label>
            <textarea rows="10" cols="40" name="description" placeholder="Description">{{ $article->description }}</textarea>
        </div>
        <button type="submit">Valider</button>
        <input type="hidden" name="id" value="{{ $article->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    </body>
</html>