@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection


@section('content')

    <article class="creation">
        <h1 class="t1">Créer un article</h1>
        <form action="/articles" method="POST" class="form-beau" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nom</label>
                <input type="text" name="name" placeholder="Nom de l'article"/>
            </div>
            <div class="input-group">
                <label>Prix</label>
                <input type="number" name="price" placeholder="Prix de l'article" />
            </div>
            <div class="input-group">
                <label>Description</label>
                <textarea rows="10" cols="40" name="description" placeholder="Description"></textarea>
            </div>
            <div class="input-group">
                <label>Categorie</label>
                <select name="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Ajouter</button>
            {{ csrf_field() }}
        </form>

    </article>
@endsection
