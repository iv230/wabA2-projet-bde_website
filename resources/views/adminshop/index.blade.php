@extends('template_shop')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index_shop.css') }}" />
@endsection

@section('admin')
    <a class="show_admin" href="/shop">Site public </a>
    <a class="show_admin" href="/categories">Catégories</a>
    <a class="show_admin" href="/adminshop/create">Ajouter un article</a>
@endsection

@section('bootstrap')
<!--bootstrap css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--bootstrap css-->

<!--bootstrap popper and js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--bootstrap popper and js-->
@endsection


@section('content')

<script src="https://kit.fontawesome.com/9555223555.js" crossorigin="anonymous"></script>

<aside class="welcome">

    <img class="welcome_img" src="/img/fond_shop.jpg" alt="Events">
    <h1 class="welcome_t"> BIENVENUE SUR NOTRE BOUTIQUE ! </h1>

</aside>


<div class="carousel_container">
    <div class="carousel_title_container">
        <h2 class="carousel_title"> Nos trois produits les plus vendus</h2>
    </div>
    <div id="carouselExemple" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="img/tshirt1.jpg" class="d-block">

            </div>

            <div class="carousel-item">
                <img src="img/tshirt2.jpg" class="d-block">

            </div>

            <div class="carousel-item">
                <img src="img/tshirt3.jpg" class="d-block">

            </div>

        </div>

        <a href="#carouselExemple" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"> Previous</span>
        </a>

        <a href="#carouselExemple" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"> Next</span>
        </a>

    </div>
</div>

<!--ARTICLES-->

<div class="articles">
    <div class="container_articles">
        <div class="articles_title_container">
            <h2 class="articles_title"> Nos articles</h2>
        </div>

        <div class="articles_items">
        @foreach ($articles as $article)

            <a href="/adminshop/{{ $article->id }}" class="article" style="background-image: url('img/tshirt1.jpg'); background-size: cover;">
                <div class="article_icon"><i class="fas fa-info"></i></div>
            </a>

            <!--<a href="" class="article" style="background-image: url('img/tshirt2.jpg'); background-size: cover;">
                <div class="article_icon"><i class="fas fa-info"></i></div>
            </a>

            <a href="" class="article" style="background: url('img/tshirt3.jpg'); background-size: cover;">
                <div class="article_icon"><i class="fas fa-info"></i></div>
            </a>-->
        @endforeach

        </div>
    </div>
</div>

<!--ARTICLES-->

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="public/js/app.js" charset="utf-8"></script>


@endsection
