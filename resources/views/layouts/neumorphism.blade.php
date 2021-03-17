<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>SURVEY AVA CENTRAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Survey ava central">
    <meta name="author" content="cahyadi2@gmail.com">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/assets/img/favicon/apple-touch-icon.png') }}">


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Pixel CSS -->
    <link type="text/css" href="{{ asset('/css/neumorphism.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/css/survey.css') }}" rel="stylesheet">

    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    @livewireStyles
</head>

<body>
<header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-transparent navbar-theme-primary">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-4 p-0" href="/">
                AVACENTRAL.COM
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/" class="navbar-brand">
                                <img src="{{ asset('/assets/img/brand/axiata.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                @include('layouts.neumorphism.site-menu')
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="">
                            <a href="{{ route('surveyor.index') }}" class="btn btn-primary"><i class="fas fa-check-circle"></i> Go To Survey</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <span class="nav-link-inner-text">
                                    <img src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}" class="rounded-circle" alt="{{ Auth::user()->name }}" width="48">
                                    </span>
                                <span class="fas fa-angle-down nav-link-arrow ml-2"></span>

                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="profile-card">
                                    <div class="card bg-primary border-light">

                                        <div class="card-body">
                                            <h3 class="h5 mb-2">{{ Auth::user()->name }}</h3>
                                            <span class="h6 font-weight-normal text-gray mb-3">{{ Auth::user()->roles[0]->name }}</span>
                                            <a class="btn btn-primary btn-block mt-2" href="{{ route('profile') }}" >
                                            <i class="fa fa-user mr-2"></i> Profile
                                            </a>
                                            <a class="btn btn-primary btn-block mt-2" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                                <i class="fas fa-key mr-2"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
<main>
    @if($errors->any())
        <section class="section pb-0">
            <div class="container">
                <div class="alert alert-danger alert-dismissible shadow-soft fade show" role="alert">
                    <span class="alert-inner--icon"><i class="fas fa-stop-circle"></i></span>
                    <span class="alert-inner--text">{{$errors->first()}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </section>
    @endif

    @if(!Auth::user()->province && !Auth::user()->city)
        <section class="section pb-0">
            <div class="container">
                <div class="alert alert-info alert-dismissible shadow-soft fade show" role="alert">
                    <span class="alert-inner--icon"><i class="fas fa-warning"></i></span>
                    <span class="alert-inner--text">Please update your region information at profil menu</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </section>
    @endif

    @if(Hash::check('password', Auth::user()->getAuthPassword()))
        <section class="section pb-0">
            <div class="container">
                <div class="alert alert-info alert-dismissible shadow-soft fade show" role="alert">
                    <span class="alert-inner--icon"><i class="fas fa-warning"></i></span>
                    <span class="alert-inner--text">Hi, please update your password</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            </div>
        </section>
    @endif


    @yield('content')
</main>

<footer class="d-flex pb-5 pt-6 pt-md-7 border-top border-light bg-primary">
    <div class="container">
        <hr class="my-5">
        <div class="row">
            <div class="col">
                <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                    <p class="font-weight-normal font-small mb-0">Copyright © <span class="current-year">2021</span>. All rights reserved.</p>
                    <p class="font-weight-normal font-small mb-0">Theme by <a href="https://themesberg.com/product/ui-kit/neumorphism-ui-kit-bootstrap"> Themesberg</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Core -->
<script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendor/headroom.js/dist/headroom.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
<script src="{{ asset('/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/vendor/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('/vendor/jarallax/dist/jarallax.min.js') }}"></script>
<script src="{{ asset('/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('/vendor/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('/vendor/prismjs/prism.js') }}"></script>

<!-- Neumorphism JS -->
<script src="{{ asset('/assets/js/neumorphism.js') }}"></script>

@livewireScripts
</body>

</html>
