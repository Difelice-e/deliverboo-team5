<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- lord icon -->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-goldGv shadow-sm position-relative box-shadow-none">
            <div class="container">
                <!-- {{-- logo  --}} -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo-deliverboo.png') }}" width="150" class="d-inline-block align-top" alt="">
                </a>

                <!-- {{-- searchbar no admin  --}} -->
                @guest
                <form class="form-inline col-4 position-relative">
                    <button class="btn-nav-searchGv my-2 my-sm-0" type="submit">
                        <lord-icon src="https://cdn.lordicon.com/pvbutfdk.json" trigger="loop-on-hover" style="width:25px;height:25px">
                        </lord-icon>
                    </button>
                    <input class="form-control font-size col-12 text-center rounded-pill mr-sm-2 pl-5" type="search" placeholder="Search" aria-label="Search">
                </form>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar || Pulsanti attenzione -->
                    <ul class="navbar-nav align-items-end ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item btn-nav-register my-2 mx-md-1 px-2 p-md-1">
                            <a class="nav-link text-center font-weight-bold text-balck" href="{{ route('login') }}">Accedi
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item btn-nav-register my-2 mx-md-1 px-2 p-md-1">
                            <a class="nav-link text-center font-weight-bold text-balck" href="{{ route('register') }}">Iscriviti</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item ">

                            <div class="dropdown">
                                <!-- dddd -->
                                <button class="btn dropdown-toggle btn-nav-register my-2 mx-md-1 my-md-0 py-3 px-md-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    Naviga
                                </button>
                                <div class="dropdown-menu btn-nav-menu overflow-hidden" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item btn-nav-item" href="/admin/dashboard">Dashboard</a>
                                    <a class="dropdown-item btn-nav-item" href="/admin/dishes">Menù</a>
                                    <a class="dropdown-item btn-nav-item" href="/admin/orders">Ordini</a>
                                    {{-- <a class="dropdown-item btn-nav-item" href="#">Statistiche</a> --}}
                                </div>
                            </div>

                        </li>
                        <li class="nav-item ">

                            <a class="dropdown-item text-balck btn-nav-register p-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                Esci
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            {{-- <svg class="position-absolute svg-decoration" id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                        <stop stop-color="rgba(255, 194, 68, 1)" offset="0%"></stop>
                        <stop stop-color="rgba(255, 194, 68, 1)" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,10L10,13.3C20,17,40,23,60,36.7C80,50,100,70,120,65C140,60,160,30,180,15C200,0,220,0,240,13.3C260,27,280,53,300,68.3C320,83,340,87,360,78.3C380,70,400,50,420,35C440,20,460,10,480,10C500,10,520,20,540,33.3C560,47,580,63,600,58.3C620,53,640,27,660,26.7C680,27,700,53,720,61.7C740,70,760,60,780,53.3C800,47,820,43,840,48.3C860,53,880,67,900,75C920,83,940,87,960,83.3C980,80,1000,70,1020,55C1040,40,1060,20,1080,25C1100,30,1120,60,1140,75C1160,90,1180,90,1200,80C1220,70,1240,50,1260,45C1280,40,1300,50,1320,46.7C1340,43,1360,27,1380,23.3C1400,20,1420,30,1430,35L1440,40L1440,100L1430,100C1420,100,1400,100,1380,100C1360,100,1340,100,1320,100C1300,100,1280,100,1260,100C1240,100,1220,100,1200,100C1180,100,1160,100,1140,100C1120,100,1100,100,1080,100C1060,100,1040,100,1020,100C1000,100,980,100,960,100C940,100,920,100,900,100C880,100,860,100,840,100C820,100,800,100,780,100C760,100,740,100,720,100C700,100,680,100,660,100C640,100,620,100,600,100C580,100,560,100,540,100C520,100,500,100,480,100C460,100,440,100,420,100C400,100,380,100,360,100C340,100,320,100,300,100C280,100,260,100,240,100C220,100,200,100,180,100C160,100,140,100,120,100C100,100,80,100,60,100C40,100,20,100,10,100L0,100Z"></path>
            </svg> --}}
        </nav>

        <main class="py-5 my-5">
            @yield('content')
        </main>

        <footer class=" bg-darkGrayGv text-white py-5">
            <div class="container py-5">
                <div class="row pb-5">
                    <div class="col-12">
                        <img src="{{ asset('images/logo-deliverboo.png') }}" width="150" class="d-inline-block align-top" alt="">
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
                    <div class="col-12 col-sm-6 col-md-3 d-flex flex-column justify-content-between">
                        <div class="store cursor-pointer">
                            <img src="https://res.cloudinary.com/glovoapp/image/fetch//w_105,h_35,c_fit,q_auto/https://glovoapp.com/images/app_store/download-button-new.svg" alt="">
                            <img class="py-3" src="https://res.cloudinary.com/glovoapp/image/fetch//w_112,h_35,c_fit,q_auto/https://glovoapp.com/images/google_play/download-button-new.svg" alt="">
                        </div>
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