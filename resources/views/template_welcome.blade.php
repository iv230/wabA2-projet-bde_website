<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>BDE</title>

    @yield('bootstrap')
    <!--css-->

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    @yield('css')
    <!--css-->


    <!-- font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font-awesome-->

</head>

<body>

    <!--NAV-BAR-->
    <header>

        <nav class="menu">
            <div class="container_navbar">
                <div class="cesi">
                    <a href="/"><img class="logocesi" src="/img/logo.png" alt="logo cesi"></a>
                </div>
                <div class="m-left">
                    <a href="/" class="title"> BDE Cesi Nice</a>
                </div>

                <div class="m-right">
                    @yield('search_bar')

                    @if(session()->has('user'))
                    <div class="test"><a href="/users/show" class="m-link">{{ session('username') }}</a></div>
                    @yield('basket')
                    <a href="/logout" class="m-link"><i class="fa fa-sign-in"></i> Déconnexion</a>
                    @else
                    <a href="/users/create" class="m-link"><i class="fa fa-user-plus"></i> Inscription</a>
                    <a href="login" class="m-link"><i class="fa fa-sign-in"></i> Connexion</a>
                    @endif
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
    <!--END-OF-NAV-BAR-->

    @yield('welcome')
    @yield('content')



    @yield('credits')
    @yield('cgv')

    <!--FOOTER-->
    <footer>
        <div class="logo_footer">
            <img class="footer_cesi" src="/img/logo_cesi.png" alt="logo cesi ingenieur">
            <img class="footer_bde" src="/img/logo.png" alt="logo cesi">

        </div>
        <div class="link_footer">
            <a href="/credits" class="footer_link"> Mentions légales </a>
            <a href="/cgv" class="footer_link"> Conditions générales de vente </a>
            <a class="footer_link"> © CESI 2019 </a>
        </div>

    </footer>
    <!--END-OF-FOOTER-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/js/nav_bar.js"></script>
</body>

</html>