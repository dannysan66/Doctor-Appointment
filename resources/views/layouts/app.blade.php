<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Datepicker -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                {{-- Navbar brand --}}
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}

                    <img src="banner/Health.png" alt="Healthbar"
                   class="brand-img" style="width: 200px; height: 45px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->check()&& auth()->user()->role->name === 'patient')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('my.booking') }}">{{ __('My Bookings') }}</a>
                        </li>
                        @endif
                            @if(auth()->check()&& auth()->user()->role->name === 'patient')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('my.prescription') }}">{{ __('My Prescriptions') }}</a>
                            </li>
                            @endif
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/#footer') }}" style="margin-right: 10px;">{{ __('Contact') }}</a>
                        </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    {{-- route('login') --}}
                                    <a class="nav-link text-white" href="{{ route('login') }}" style="margin-right: 10px;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth()->check()&& auth()->user()->role->name === 'patient')
                                    <a href="{{ url('user-profile') }}" class="dropdown-item">Profile</a>
                                    @else
                                    <a href="{{ url('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
    </div>
    <script>
        var dateToday = new Date();
        $( function() {
          $("#datepicker").datepicker({
            dateFormat:"yy-mm-dd",
            showButtonPanel:true,
            numberOfMonths:2,
            minDate:dateToday,
          });
        } );
        </script>

        <style type="text/css">
            body {
                background: #EFF5F5;
            }

            .btn-blue {
                background: #1d2366;
                color: white;
            }

            .btn-blue:hover {
                opacity: 90%;
                background: #1d2366 !important;
                color: white !important;
            }

            .btn-purple {
                background: #6c63ff;
                color: white;
                margin-right: 10px !important;
            }

            .btn-purple:hover {
                background: #6c63ff !important;
                opacity: 90%;
                color: white !important;
            }

            .btn-order {
                margin: auto;
            }

            .btn-outline-primary {
                margin-bottom: 10px;
            }

            .btn-outline-primary:hover {
                background: #6c63ff !important;
            }

            .card {
                margin-top: 10px;
                margin-bottom: 30px;
            }

            .card-header {
                background: #393E46;
                color: white;
            }

            .contact{
                margin-top: 40px;
            }

            .ui-corner-all {
                background: #6c63ff;
                color: white;
            }

            label.btn {
                padding: 0;
                border-color: #6c63ff;
                color: #1d2366;
            }

            label.btn input {
                opacity: 0;
                position: absolute;
            }

            label.btn span {
                text-align: center;
                padding: 6px 12px;
                display: block;
                min-width: 80px;
            }

            label.btn input:checked+span {
                background: #6c63ff;
                color: white;
            }

            .nav-link {
                border-radius: 5px;
            }

            .nav-link:hover {
                background: #6c63ff;
                border-radius: 5px;
            }

            @media only screen and (max-width: 768px) {
                .nav-link {
                border-radius: 5px;
                max-width: 100px;
                margin-left: 50%;
                text-align: center;
            }

            .nav-link:hover {
                background: #6c63ff;
                border-radius: 5px;
            }
        }

            /* Services section */
            #services {
                padding: 80px 0;
                background: white;
            }

            .service-img {
                width: 100px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .services {
                padding: 20px;
            }

            .services h4 {
                padding: 5px;
                margin-top: 25px;
                text-transform: uppercase;
                font-size: 36px;
                font-weight: bold;
            }

            .title::before {
                content: '';
                background: #6c63ff;
                height: 5px;
                width: 200px;
                margin-left: auto;
                margin-right: auto;
                display: block;
                transform: translateY(63px);
            }

            .row-top {
                margin-top: 50px;
            }

            /* about us section */
            #about-us {
                padding-bottom: 50px;
                padding-top: 50px;
            }

            .about-title {
                font-size: 30px;
                font-weight: bold;
                margin-top: 8%;
                margin-left: 17px;
            }

            #about-us ul {
                margin-left: 10px;
            }

            #about-us ul li {
                margin: 10px 0;
            }

            /* footer section */
            #social-media {
                background: #f8f9fa;
                padding: 100px 0;
            }

            .social-icons {
                margin-top: 40px;
            }

            .social-icons img {
                width: 60px;
                transition: 0.5s;
            }

            .social-icons a:hover img {
                transform: translateY(-10px);
            }

            #social-media h4 {
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 30px;
            }

            #footer {
                background-image: linear-gradient(to left, #6c63ff, #1d2366);
                color: #fff;
            }

            .footer-img {
                width: 100%;
                height: 100%;
            }

            .footer-box {
                width: 30%;
            }
            .footer-box img {
                width: 150px;
                height: 50px;
                margin-bottom: 10px;
                margin-top: 40px;
            }

            .footer-box i {
                margin-right: 8px;
                font-size: 25px;
                height: 40px;
                width: 40px;
                text-align: center;
                padding-top: 7px;
                border-radius: 5px;
                background-image: linear-gradient(to left, #6c63ff, #1d2366);
            }

            .footer-box .form-control {
                box-shadow: none !important;
                border-radius: 0;
                border: none;
                margin-top: 25px;
                max-width: 250px;
            }

            .footer-box .btn-primary {
                box-shadow: none !important;
                border-radius: 5;
                border: none;
                margin-top: 20px;
                background-image: linear-gradient(to left, #6c63ff, #1d2366);
            }

            .footer-box .btn-primary:hover {
                background-image: linear-gradient(to right, #6c63ff, #1d2366);
            }

            hr {
                background-color: white;
            }

            .copyright {
                margin-bottom: 0;
                padding-bottom: 20px;
                text-align: center;
                font-size: 12px;
            }

            .py-4 {
                padding-bottom: 0 !important;
            }
        </style>
</body>
</html>
