@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection


@section('content')

    <article class="creation">
        <h1>Créer une catégorie</h1>
        <form action="/categories" method="POST" class="form-beau" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nom</label>
                <input type="text" name="name" placeholder="Nom de la catégorie"/>
            </div>
            <button type="submit">Ajouter</button>
            {{ csrf_field() }}
        </form>
    </article>
@endsection
