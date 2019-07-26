<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link href="{{asset('/bootstrap_theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <!-- Plugin CSS -->
    <link href="{{asset('/bootstrap_theme/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
  <link href="{{asset('/bootstrap_theme/css/creative.min.css')}}" rel="stylesheet">
</head>

<body>



    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                        </li>
                        @if (Route::has('login'))
                        <li class="nav-item">
                            @auth
                            <a class="nav-link js-scroll-trigger" href="{{ url('/dashboard') }}">Home</a>
                            @else
                            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                            @endif
                            @endauth
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead -->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Restaurant El Patio</h1>
                        <hr class="divider my-4">
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Descubre la comida mas interezante de todo sajoma</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Mira mas sobre nosotros</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Tenemos lo que te gusta!</h2>
                        <hr class="divider light my-4">
                        <p class="text-white-50 mb-4">descubre buestros diversos platos !</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Nuestros Servicios!</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">A la Orden</h2>
                <hr class="divider my-4">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-hand-holding-usd text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Exelentes Precios</h3>
                            <p class="text-muted mb-0">Ofrecemos gran variedad de productos a buenos precios</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-mobile-alt text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Accesibles</h3>
                            <p class="text-muted mb-0">Tenemos una gran plataforma para tu comodidad.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-motorcycle text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Envios directos a tu casa o trabajo</h3>
                            <p class="text-muted mb-0">deliverys para tu comodidad!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Hecho con amor</h3>
                            <p class="text-muted mb-0">que mas podemos ofrecer si no es una buena comida hecha con mucho amor?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/1.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/1.jpg')}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    Bebidas
                                </div>
                                <div class="project-name">
                                    Date un traguito cuando lo necesites
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/2.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/2.jpg')}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    Parrillas
                                </div>
                                <div class="project-name">
                                    Deliciosos cortes de carnes al carbon
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/3.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/3.jpg')}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    Sancochos
                                </div>
                                <div class="project-name">
                                    Disfruta de una delicia bien calientita
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/4.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/4.jpg')}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    Dulces
                                </div>
                                <div class="project-name">
                                    Para endulzar esos momentos, para los que aman los postres
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/5.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/5.jpg')}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    Pizza
                                </div>
                                <div class="project-name">
                                    hechas de forma artesanal, las mejores de la zona
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('/bootstrap_theme/img/portfolio/fullsize/6.jpg')}}">
                            <img class="img-fluid" src="{{asset('/bootstrap_theme/img/portfolio/thumbnails/6.jpg')}}" alt="">
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">
                                    A la carta
                                </div>
                                <div class="project-name">
                                    gran variedad de comidas gourmets para los gustos mas finos
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Planifica tus salidas!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Reserva con nosotros!</a>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contactanos!</h2>
                        <hr class="divider my-4">
                        <p class="text-muted mb-5">Estamos a un paso de ti, visitanos en San Jose de las Matas,
                             Calle Gral. Felix Zarsuela # 4 frente a las Caobas</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (829) 564-0781</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in anchor text AND the link below! -->
                        <a class="d-block" href="mailto:servicios@elpatio.com">servicios@elpatio.com</a>
                    </div>
                </div>
            </div>
        </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>

  {{-- <!-- Bootstrap core JavaScript --> <!--esto esta en adminlte-->
  <script src="{{asset('/storage/bootstrap_theme/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/storage/bootstrap_theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
 <script src="{{asset('js/app.js')}}"></script>
  <!-- Plugin JavaScript -->
  <script src="{{asset('/bootstrap_theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('/bootstrap_theme/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('/bootstrap_theme/js/creative.min.js')}}"></script>


    </body>


    </div>
</body>

</html>
