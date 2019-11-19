@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection


@section('content')

    <article class="creation">
        <h1 class="t1">Créer une catégorie</h1>
        <form action="/categories/{{$category->id}}" method="POST" class="form-beau" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nom</label>
                <input type="text" name="name" placeholder="Nom de la catégorie" value="{{ $category->name }}"/>
            </div>
            <button type="submit">Modifier</button>
            <input type="hidden" name="id" value="{{ $category->id }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        </form>
    </article>
@endsection
