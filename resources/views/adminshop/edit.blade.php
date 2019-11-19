<@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection


@section('content')
    <article class="creation">
        <h1 class="t1">Modifier Article #{{ $article->id }}</h1>
        <form action="/adminshop/{{ $article->id }}" method="POST" class="form-beau" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nom</label>
                <input type="text" name="name" placeholder="Nom de l'article" value="{{ $article->name }}"/>
            </div>
            <div class="input-group">
                <label>Prix</label>
                <input type="number" name="price" placeholder="Prix de l'article" value="{{ $article->price }}"/>
            </div>
            <div class="input-group">
                <label>Description</label>
                <textarea rows="10" cols="40" name="description" placeholder="Description">{{ $article->description }}</textarea>
            </div>
            <div class="input-group">
                <label>Categorie</label>
                <select name="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Valider</button>
            <input type="hidden" name="id" value="{{ $article->id }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        </form>
    </article>
@endsection
