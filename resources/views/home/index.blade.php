<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('eiser/img/favicon.png') }}" type="image/png" />
    <title>2SH</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('eiser/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/linericon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/lightbox/simpleLightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/vendors/jquery-ui/jquery-ui.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('eiser/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('eiser/css/responsive.css') }}" />
    <style>
        /* Global styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header styles */
        .header_area {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e1e1e1;
        }

        .main_menu {
            padding: 10px 0;
        }

        .navbar {
            padding: 0;
        }

        .logo_h img {
            max-width: 130px;
            height: auto;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-grow: 1;
        }

        .navbar-nav .nav-item {
            margin-left: 15px;
        }

        .navbar-nav .form-inline {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
        }

        .form-inline input.form-control {
            max-width: 300px;
            margin-right: 10px;
        }

        .form-inline .btn {
            margin: 0;
        }

        /* Navbar toggler styles */
        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .navbar-nav .form-inline {
                margin-left: 0;
                margin-right: 0;
                justify-content: center;
            }
        }

        /* Banner styles */
        .banner {
            height: 60vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .banner-content {
            max-width: 80%;
        }

        .banner-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }

        .banner-subtitle {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: white;
        }

        /* Product carousel styles */
        .product-carousel {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px 0;
        }

        .single_product_item {
            flex: 1 1 calc(33.333% - 10px);
            margin: 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .single_product_item img {
            width: auto;
            /* Permet à l'image de conserver son ratio d'aspect */
            height: 200px;
            /* Vous pouvez ajuster cette hauteur selon vos besoins */
            object-fit: contain;
            /* Maintient l'aspect ratio tout en ajustant l'image à la zone disponible */
            margin: auto;
            /* Centre l'image horizontalement dans la carte */
            display: block;
        }


        .product_details {
            padding: 10px;
        }

        .product_actions .btn {
            margin-top: 10px;
        }

        .button-group {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .button-group .btn {
            margin: 0;
        }

        .button-group form {
            margin: 0;
        }

        /* Footer styles */
        .footer_area {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .footer_widgets_area {
            margin-bottom: 20px;
        }

        .footer_widgets_area .single_footer_widget {
            margin-bottom: 20px;
        }

        .footer_widgets_area .footer_title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .social_icons a {
            margin-right: 10px;
            color: #333;
            font-size: 18px;
        }

        .social_icons a:hover {
            color: #007bff;
        }

        .subscribe_form input {
            border-radius: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .subscribe_form button {
            border-radius: 20px;
            padding: 10px 20px;
        }

        /* Media queries */
        @media (min-width: 576px) and (max-width: 768px) {
            .product-carousel {
                flex-direction: row;
                justify-content: space-between;
            }

            .single_product_item {
                flex: 1 1 calc(50% - 10px);
            }
        }

        @media (min-width: 992px) {
            .product-carousel {
                flex-direction: row;
                justify-content: space-between;
            }

            .single_product_item {
                flex: 1 1 calc(33.333% - 10px);
            }
        }

    </style>
</head>

<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <a class="navbar-brand logo_h" href="{{ url('/') }}">
                        <img src="{{ asset('eiser/img/imdsh.png') }}" alt="Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <form class="form-inline my-2 my-lg-0 mx-auto" action="{{ route('search.products') }}" method="GET">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher un produit" aria-label="Search" name="query">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                                </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto d-flex align-items-center">
                            <li class="nav-item ml-3">
                                <a href="{{ route('view_cart') }}" class="icons">
                                    <i class="ti-shopping-cart"></i>
                                    @if(isset($count) && $count > 0)
                                    <span class="badge badge-pill badge-primary">{{ $count }}</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">0</span>
                                    @endif
                                </a>
                            </li>
                            @auth
                            <li class="nav-item ml-3">
                                <a href="{{ route('profile.edit') }}" class="icons">
                                    <i class="ti-user" aria-hidden="true"></i>
                                    Mon Profil
                                </a>
                            </li>
                            <li class="nav-item ml-3">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link icons">
                                        <i class="ti-power-off" aria-hidden="true"></i>
                                        Déconnexion
                                    </button>
                                </form>
                            </li>
                            @else
                            <li class="nav-item ml-3">
                                <a href="{{ route('login') }}" class="icons">
                                    <i class="ti-user" aria-hidden="true"></i>
                                    Connexion
                                </a>
                            </li>
                            <li class="nav-item ml-3">
                                <a href="{{ route('register') }}" class="icons">
                                    <i class="ti-user" aria-hidden="true"></i>
                                    Inscription
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================End Header Menu Area =================-->

    <!--================Banner Area =================-->
    <div class="banner" style="background-image: url('{{ asset('images/bani.avif') }}');">
        <div class="banner-content text-white">
            <h3 class="banner-title">Bienvenue sur notre boutique en ligne</h3>
            <p class="banner-subtitle">2SH est la boutique en ligne de référence en équipements informatique à Dakar. Nos produits sont vendus avec garantie de remboursement en cas de non satisfaction du client ou dommage. Achetez maintenant et faites-vous livrer partout à Dakar dans les meilleurs délais.</p>
            {{-- <a href="{{ route('shop') }}" class="btn btn-primary">Voir les produits</a> --}}
        </div>
    </div>
    <!--================End Banner Area =================-->

    <!--================Product Carousel Area =================-->
    <section class="featured_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="main_title">
                        {{-- <h2>Produits populaires</h2> --}}

                    </div>
                </div>
            </div>
            {{-- <p style="display:flex;text-align:center;">Découvrez nos derniers produits</p> --}}
            <div class="product-carousel">

                @foreach($products as $product)
                <div class="single_product_item">
                    <img href="{{ route('product_details', $product->id) }}" class="btn btn-primary" src="{{ asset('products/' . $product->image) }}" alt="Product Image" class="img-fluid">

                    <div class="product_details">
                        <h4 style="color: black;">{{ $product->title }}</h4>
                        {{-- <p style="color: black;">{{ $product->description }}</p> --}}
                        <span style="color: green;">FCFA{{ $product->price }}</span>
                        <div class="button-group">
                            <form action="{{ route('add.cart', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier
                                </button>
                            </form>
                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-primary">
                                <i class="fa fa-eye" aria-hidden="true"></i> Voir Details
                            </a>

                            <!-- Bouton pour ajouter au panier -->

                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Product Carousel Area =================-->

    <!--================Footer Area =================-->
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer_widgets_area">
                        <div class="single_footer_widget">
                            <h3 class="footer_title">À propos</h3>
                            <p style="color: black;"> 2SH est la boutique en ligne de référence en équipements informatique à Dakar. Nos produits sont vendus avec garantie de remboursement en cas de non satisfaction du client ou dommage.
                                Achetez maintenant et faites-vous livrer partout à Dakar dans les meilleurs délais.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer_widgets_area">
                        <div class="single_footer_widget">
                            <h3 class="footer_title">Nous contacter</h3>
                            <ul>
                                <li><a href="{{ route('contact.show') }}">Contact</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer_widgets_area">
                        <div class="single_footer_widget">
                            <h3 class="footer_title">Abonnez-vous</h3>
                            <form class="subscribe_form">
                                {{-- <input type="email" placeholder="Votre email" required /> --}}
                                {{-- <button type="submit" class="btn btn-primary">S'abonner</button> --}}
                            </form>
                            <div class="social_icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('eiser/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('eiser/js/popper.js') }}"></script>
    <script src="{{ asset('eiser/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eiser/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('eiser/vendors/lightbox/simpleLightbox.js') }}"></script>
    <script src="{{ asset('eiser/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('eiser/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('eiser/js/theme.js') }}"></script>

    <script>
        document.getElementById('search-icon').addEventListener('click', function(e) {
            e.preventDefault();
            var searchForm = document.getElementById('search-form');
            if (searchForm.style.display === 'none') {
                searchForm.style.display = 'block';
            } else {
                searchForm.style.display = 'none';
            }
        });

    </script>
</body>

</html>
