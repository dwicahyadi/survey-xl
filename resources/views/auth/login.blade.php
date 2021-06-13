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


</head>
<body>
<main>
    <!-- Section -->
    <section class="min-vh-100 d-flex bg-primary align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                    <div class="card bg-primary shadow-soft border-light p-4">
                        <div class="card-header text-center pb-0">
                            <h2 class="h4">{{ config('app.name', 'Laravel') }}</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

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

</body>

</html>
