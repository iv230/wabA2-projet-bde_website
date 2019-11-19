@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/index_categories.css') }}" />
@endsection


@section('content')

    <article class="categories">

    @foreach ($categories as $category)
        <h1 class="t1">Categorie : {{ $category->id }}</h1>
        <ul>
            <li>Nom : {{ $category->name }}</li>
        </ul>
        <input type='button' value='edit' onclick="location.href='/categories/{{ $category->id }}/edit';">
    @endforeach
    <div>
        <input type='button' value='create' onclick="location.href='/categories/create';">
    </div>

    </article>
@endsection



