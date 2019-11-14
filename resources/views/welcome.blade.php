<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>BDE</title>
    
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/header.css">
    @yield('home_scss')
    @yield('index_scss')
   
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
                            <h1 class="bde">bde cesi nice</h1>
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
    <div class="nav_left">
        
            <img class="logo_cesi_ingenieur" src="./img/logo_cesi.png" alt="logo cesi ingenieur">
        
    </div>
    
    </header>

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
<footer>
    <div class="logo_footer">
        <img class="footer_cesi" src="./img/logo_cesi.png" alt="logo cesi ingenieur">
        <img class="footer_bde" src="./img/logo.png" alt="logo cesi">

    </div>
    <a href="#" class="footer_link"> Mentions légales </a>
    <a href="#" class="footer_link"> Conditions générales de vente </a>
    <a href="#" class="footer_link"> C CESI 2019 </a>
</footer>
</html>
