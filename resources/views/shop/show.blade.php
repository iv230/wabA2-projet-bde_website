@extends('template_shop')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_shop.css') }}" />
@endsection

@section('article')

    <article class="article">
        <div class="container_article1">
            <p class="title_article1">T-shirt manches courtes - BELIEVE</p>
            <div class="container_img_articles1">
                <img class="img_article1" src="public/img/tshirt3.jpg" alt="logo cesi ingenieur">
            </div>

            <div class="description1">
                <p><strong>Description :</strong><br><br><strong>Prix :</strong> 39.99 EUR<br><strong>Taille :</strong>
                    M<br><strong>Couleur :</strong> Noir<br><strong>Matière :</strong> 100% coton</p>
                <a href="#" class="purchase1"> Ajouter au panier</a>
            </div>
        </div>
    </article>

@endsection
