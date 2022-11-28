<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="resources/css/homepage.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <body>
        <header class="container-fluid py-1 bg-light">
            <div class="row">
                <div class=" text-end">
                    <a href="#" id="login">LOGIN</a> | 
                    <a href="#" id="signup">SIGN UP</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-1">
                    <div class="navbar-brand"id="logo">
                        <a href="#" class="text-decoration-none">M&#252;M&#252;</a>
                        </button>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav class="navbar navbar-expand-lg bg-light">

                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav pt-1">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="">PRODUCT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" action="">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ Session::get('test')}}</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @yield('content2')
        <footer id="footer"  class="footer">

            <div class="container-fluid pt-3 bg-light">
                <div class="text-center">
                    Follow Us
                </div>
                <div class="hm-footer-copyright text-center">
                    <div class="footer-social py-2" >
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>	
                        <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        <a href="https://twitter.com/login"><i class="fa fa-twitter"></i></a>
                    </div>
                    <p style="font-size: 80%">Copyright 2022 &copy; M&#252;m&#252;. All rights reserved.</br>
                        <span>Made with <span class="heart">♥</span> Team of M&#252;m&#252;</span>
                    </p>
                </div>
            </div>
        </footer>
    </body>

</body>
</html>
