@extends('template_shop')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_shop.css') }}" />
@endsection

@section('content')

    <article class="article">

            <h1 class="title_article">{{ $article->name }}</h1>
            <div class="container_img_article">
                <!--<img class="img_article" src="/img/tshirt1.jpg" alt="article">-->
                <img class="img_article" src="/img/tshirt1.jpg" alt="article">
            </div>

            <div class="description">
                <p><strong>Description : {{ $article->description }}</strong><br><br><strong>Prix : {{ $article->price }} EUR</strong><br><br>
                    <strong>Catégorie : {{ $article->category }}</strong> </p>
                <a href="" class="purchase"> Ajouter au panier</a>
            </div>

    </article>

@endsection
