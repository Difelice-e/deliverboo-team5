<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-goldGv shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>

                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar || Pulsanti attenzione -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item btn-nav-register mx-1">
                            <a class="nav-link font-weight-bold text-balck" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item btn-nav-register mx-1">
                            <a class="nav-link font-weight-bold text-balck" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown text-white">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-darkGrayGv text-white">
            <div class="container py-5">
                <div class="row pb-5">
                    <div class="col-12">
                        <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12 col-sm-6 col-md-3">
                        <ul class="list-footer">
                            <li>Uniamo le forze</li>
                            <li><a href="#">Lavora con noi</a></li>
                            <li><a href="#">Glovo con i partner</a></li>
                            <li><a href="#">Corrieri</a></li>
                            <li><a href="#">Glovo Business</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <ul class="list-footer">
                            <li>Link di interesse</li>
                            <li><a href="#">Chi siamo</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contattaci</a></li>
                            <li><a href="#">Sicurezza</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <ul class="list-footer">
                            <li>Seguici</li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <ul class="text-uppercase">
                            <li><a href="#">Termini e condizioni</a></li>
                            <li><a href="#">Politica sulla privacy</a></li>
                            <li><a href="#">Politica sui cookie</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <h4 class="title-list">I brand piu richiesti</h4>
                        <ul class="d-flex g-3 brand-list pt-3">
                            <li class="pr-4"><a href="#">McDonald's</a></li>
                            <li class="pr-4"><a href="#">Burger King</a></li>
                            <li class="pr-4"><a href="#">KFC</a></li>
                            <li><a href="#">Carrefour</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <h4 class="title-list">Categorie più richieste</h4>
                        <ul class="d-flex brand-list pt-3">
                            <li class="pr-4"><a href="#">Hamburger</a></li>
                            <li class="pr-4"><a href="#">Pizza</a></li>
                            <li><a href="#">Sushi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <select name="" id="" class="custom-select bg-darkGrayGv text-white py-2 px-2">
                            <option value="">Italiano</option>
                            <option value="">Inglese</option>
                        </select>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>