<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>BDE</title>

    <!-- font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font-awesome-->

    <!--css-links-->
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}">
    <!--css-links-->

    @yield('css')
</head>

<body>
    <!-- NAV BAR -->
    <header>

        <nav class="menu">
            <div class="inner">
                <div class="cesi">
                    <a href="/"><img class="logocesi" src="/img/logo.png" alt="logo cesi"></a>
                </div>
                <div class="m-left">
                    <a href="/" class="bde">bde cesi nice</a>
                </div>

                <div class="m-right">
                    @yield('search_bar')
                    <div class="link_nav">

                        @yield('basket')
                        @if(session()->has('user'))
                        <a class="m-link">{{ session('username') }}</a>
                        <a href="/logout" class="m-link"><img class="co" src="/img/user.png" alt="Logo deconnexion"> Deconnexion</a>
                        @else
                        <a href="users/create" class="m-link"><img class="login" src="/img/login.png" alt="Logo inscription"> Inscription</a>
                        <a href="/login" class="m-link"><img class="co" src="/img/user.png" alt="Logo connexion"> Connexion</a>
                        @endif

                    </div>

                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
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
    @yield('welcome_shop')

    @yield('content')


    @yield('link_event')
    @yield('actual_events')
    @yield('admin_phone')
    @yield('create_event')
    @yield('edit_event')


    @yield('link_shop')
    @yield('past_events')

    @yield('event')
    @yield('like')
    @yield('participation')
    @yield('return')
    @yield('comments')

    <!-- FOOTER -->
    <footer>
        <div class="logo_footer">
            <img class="footer_cesi" src="/img/logo_cesi.png" alt="logo cesi ingenieur">
            <img class="footer_bde" src="/img/logo.png" alt="logo cesi">

        </div>
        <div class="link_footer">
            <a href="#" class="footer_link"> Mentions légales </a>
            <a href="#" class="footer_link"> Conditions générales de vente </a>
            <a href="#" class="footer_link"> © CESI 2019 </a>
        </div>

    </footer>
    <!-- END OF FOOTER -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/js/nav_bar.js" charset="utf-8"></script>
</body>

</html>