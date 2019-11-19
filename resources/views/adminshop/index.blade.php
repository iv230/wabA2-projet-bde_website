<@extends ('template_shop')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection


@section('content')

    <article class="creation">

    <input type='button' value='Panier' onclick="location.href='/basket';">
    @foreach ($articles as $article)
    <h1 class="t1"><a href='/adminshop/{{ $article->id }}'>Article {{ $article->id }}</a></h1>
    <img src='{{ $article->image }}' alt='Ceci est une image'/>
    <ul>
      <li>Nom: {{ $article->name }}</li>
      <li>Prix: {{ $article->price }}</li>
    </ul>
    @endforeach
    <div>
      <input type='button' value='Ajouter un article' onclick="location.href='/articles/create';">
    </div>
    </article>
@endsection
