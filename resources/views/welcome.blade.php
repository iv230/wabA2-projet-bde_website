@extends('template_welcome')

@section('home_scss')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection

@section('welcome')

<aside class="welcome">

      <img class="welcome_img" src="/img/bde.jpeg" alt="BDE"/>
      <div class="presentation">
          <img class="logo" src="/img/logo.png" alt="logo CESI">
          <h1 class="titre" >BDE CESI NICE</h1>
      </div>


</aside><div class="blue_bar"></div>

@endsection

@section('link_event')
<article class="welcome_link">

        <img class="welcome_img" src="/img/evenement.jpg" alt="Evenement"/>
    <h2 class="show"><a class="link" href="/publicevents"> ACCÉDEZ À NOS ÉVÈNEMENTS </a></h2>

    </article><div class="blue_bar"></div>
@endsection

@section('link_shop')

<article class="welcome_link">
            <img class="welcome_img" src="/img/boutique.jpg" alt="BDE"/>
            <h2 class="show"><a class="link" href="/articles">ACCÉDEZ À NOTRE BOUTIQUE</a></h2>

    </article>

@endsection
