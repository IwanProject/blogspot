<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/blogg.png') }}">

    <!-- CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <style>
        a:hover {
            color: orangered;
        }

        a {
            text-decoration-line: none;
        }

    </style>
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img style="height: 65px; width:350px" src="{{ asset('/images/blogg.png') }}">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('/images/blog.png') }}"></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{ asset('/assets/img/hero/header_card.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href=""><img src="{{ asset('/images/blog.png') }}" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Home</a></li>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a
                                                        href="/page?category={{ $category->slug }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 co-lg-2 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="header-right-btn f-right d-none d-lg-block">
                                            <i class="fas fa-search special-tag"></i>
                                            <div class="search-box">
                                                <form action="/page">
                                                    @if (request('category'))
                                                        <input type="hidden" name="category"
                                                            value="{{ request('category') }}">
                                                    @endif
                                                    @if (request('author'))
                                                        <input type="hidden" name="author"
                                                            value="{{ request('author') }}">
                                                    @endif
                                                    <div class="input-group mb-3">
                                                        <input type="text" autocomplete="off" class="form-control"
                                                            name="search" value="{{ request('search') }}">
                                                        <button type="submit"></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="header-right-btn f-right d-none d-lg-block">
                                            @auth
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle " style="color:black" href="#" role="button"
                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i style="color:black" class="fas fa-user"></i>

                                                        {{ auth()->user()->name }}

                                                    </a>

                                                    <ul style="color:black" class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuLink">
                                                        @if (auth()->user()->is_admin == null)
                                                            <li><a class="dropdown-item" href="/dashboard/posts"><i
                                                                        class="bi bi-layout-text-sidebar-reverse"></i> My
                                                                    Dashboard</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                        @endif
                                                        @can('admin')
                                                            <li><a class="dropdown-item" href="/dashboard"><i
                                                                        class="bi bi-layout-text-sidebar-reverse"></i> My
                                                                    Dashboard</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                        @endcan
                                                        <form action="/logout" method="post">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="bi bi-box-arrow-right"></i>
                                                                Logout</button>
                                                        </form>

                                                    </ul>
                                                </div>
                                            @else
                                                <a href="/login" class="text-dark"> <i style="color:black"
                                                        class="fas fa-user"></i></a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>




                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-md-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
    </header>
    @yield('content')

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption ">
                                <!-- logo -->
                                <img style="height: 100px; width:150px; margin-left:60px;"
                                    src="{{ asset('/images/b.png') }}" alt="">
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <div class="row">
                                            <div class="col-md-8 mt-5">
                                                <p style="font-size: 16px">Situs berita informasi yang disusun dengan
                                                    aktual dan terpercaya.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- social -->

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved <i></i> by <a href="/">Blog</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('/assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('/assets/js/jquery.ticker.js') }}"></script>
    <script src="{{ asset('/assets/js/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.sticky.js') }}"></script>



    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>

</body>

</html>
