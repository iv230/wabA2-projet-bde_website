<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>BDE</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
<!-- NAV BAR -->
<header role="header">
        
        <nav class="menu" role="navigation">
            <div class="inner">
                    <div class="cesi">
                            <img class="logocesi" src="./img/logo.png" alt="logo cesi">
                    </div>
                    <div class="m-left">
                            <h1 class="logo">bde cesi nice</h1>
                    </div>
        
                    <div class="m-right">
                        <span class="searchbar">
                                <input type="text" placeholder="Search..">
                        </span>
                        <a href="#" class="m-link"><i class="fa fa-shopping-basket"></i> Panier</a>
                        <a href="#" class="m-link"><i class="fa fa-user-plus"></i> Inscription</a>
                        <a href="#" class="m-link"><i class="fa fa-sign-in"></i> Connexion</a>
                    </div>

                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
            </div>
        </nav>
    </header>

    <div class="articles"></div>
        <div class="article"></div>
        <div class="article"></div>
        <div class="article"></div>

    <!-- END OF NAV BAR -->

    @yield('welcome')
    @yield('welcome_events')

    <div class="blue_bar"></div>

    @yield('link_event')
    @yield('actual_events')

    <div class="blue_bar"></div>

    @yield('link_shop')
    @yield('past_events')

    <script src="./js/nav_bar.js" charset="utf-8"></script>

</body>
</html>
