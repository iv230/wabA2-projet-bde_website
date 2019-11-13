<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>BDE</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
</head>
<body>


<aside class="welcome">
      
      <img class="welcome_img" src="/img/bde.jpeg" alt="BDE"/>
      <div class="presentation">
      <img class="logo" src="/img/logo.png"/>
      <h1 class="titre" >BDE CESI NICEgdfgdggggfsg</h1>
      </div>


    </aside>

    @yield('blue')

    <article class="welcome">
        
            <img class="welcome_img" src="/img/evenement.jpg" alt="Evenement"/>
            <a class="show" href="/publicevents"> ACCÉDEZ À NOS ÉVÈNEMENTS </a>
        
        </article>
            <div class="blue_bar"></div>
        <article class="welcome">
            <img class="welcome_img" src="/img/boutique.jpg" alt="BDE"/>
            <a class="show" href="/shop">ACCÉDEZ À NOTRE BOUTIQUE</a>
        
    </article>

</body>
</html>
