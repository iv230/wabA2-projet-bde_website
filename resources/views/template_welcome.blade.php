@extends('welcome')

@section('home_scss')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection

@section('welcome')

<aside class="welcome">
      
      <img class="welcome_img" src="/img/bde.jpeg" alt="BDE"/>
      <div class="presentation">
      <img class="logo" src="/img/logo.png"/>
      <h1 class="titre" >BDE CESI NICE</h1>
      </div>


</aside>

@endsection

@section('link_event')
<article class="welcome">
        
        <img class="welcome_img" src="/img/evenement.jpg" alt="Evenement"/>
        <a class="show" href="/publicevents"> ACCÉDEZ À NOS ÉVÈNEMENTS </a>
    
    </article>
@endsection

@section('link_shop')

<article class="welcome">
            <img class="welcome_img" src="/img/boutique.jpg" alt="BDE"/>
            <a class="show" href="/shop">ACCÉDEZ À NOTRE BOUTIQUE</a>
        
    </article>

@endsection