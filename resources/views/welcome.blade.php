<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>BDE</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/header.css">
    @yield('home_scss')
    @yield('index_scss')

</head>
<body>
<!-- NAV BAR -->
<header >

        <nav class="menu">
            <div class="inner">
                    <div class="cesi">
                            <img class="logocesi" src="/img/logo.png" alt="logo cesi">
                    </div>
                    <div class="m-left">
                            <h1 class="bde">bde cesi nice</h1>
                    </div>

                    <div class="m-right">
                    <div class="md-form mt-0">
                             <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </div>

                        <a href="#" class="m-link"> <img class="basket" src="/img/basket.png" alt="Logo panier"> Panier</a>
                        <a href="users/create" class="m-link"><img class="login" src="/img/login.png" alt="Logo inscription"> Inscription</a>
                        <a href="/login" class="m-link"><img class="co" src="/img/user.png" alt="Logo connexion"> Connexion</a>
                    </div>

                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
            </div>

        </nav>
    <div class="nav_left">
            <img class="logo_cesi_ingenieur" src="/img/logo_cesi.png" alt="logo cesi ingenieur">
            @yield('admin')

    </div>

    </header>

    <!-- END OF NAV BAR -->

    @yield('welcome')
    @yield('welcome_events')

    <div class="blue_bar"></div>

    @yield('link_event')
    @yield('actual_events')
    @yield('create_event')

    <div class="blue_bar"></div>

    @yield('link_shop')
    @yield('past_events')




<footer >
    <div class="logo_footer">
        <img class="footer_cesi" src="/img/logo_cesi.png" alt="logo cesi ingenieur">
        <img class="footer_bde" src="/img/logo.png" alt="logo cesi">

    </div>
    <div class="link_footer">
    <a href="#" class="footer_link"> Mentions légales </a>
    <a href="#" class="footer_link"> Conditions générales de vente </a>
    <a href="#" class="footer_link"> C CESI 2019 </a>
    </div>

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/js/nav_bar.js" charset="utf-8"></script>
</body>

</html>
