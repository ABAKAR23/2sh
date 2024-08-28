<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2SH</title>
    <link rel="stylesheet" href="{{ asset('2sh/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2sh/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles */
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Lato', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f4f4f4;
        }

        .content {
            flex: 1;
        }

        /* Header */
        .header_area {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .top_menu {
            background-color: #343a40;
            color: #fff;
        }

        .top_menu .float-left p,
        .top_menu .float-right ul li a {
            color: #fff;
        }

        .main_menu {
            border-bottom: 1px solid #ddd;
        }

        .main_menu .navbar-brand img {
            height: 50px;
        }

        .nav-link {
            color: #333;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .icons i {
            font-size: 1.2rem;
        }

        /* Hero Area */
        .hero_area {
            background-color: #ffffff;
            padding: 20px 0;
        }

        /* Product Section */
        .product_section {
            padding: 40px 0;
        }

        .product-box {
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto;
        }

        .img-box {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .img-box img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .detail-box {
            flex: 2;
            padding: 20px;
        }

        .detail-box h6 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .detail-box h6 span {
            color: #007bff;
            font-weight: bold;
        }

        .order-btn {
            margin-top: 20px;
        }

        .order-btn a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .order-btn a:hover {
            background-color: #0056b3;
        }

        /* Footer */
        .footer_area {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #ddd;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <!-- Votre contenu top_menu ici si nécessaire -->
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <a class="navbar-brand logo_h" href="index.html">
                        <img src="{{ asset('eiser/img/imdsh.png') }}" alt="Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item active"><a class="nav-link" href="/">Accueil</a></li>
                                    <!-- Autres éléments de menu ici -->
                                </ul>
                            </div>
                            <div class="col-lg-5 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <li class="nav-item"><a href="#" class="icons"><i class="ti-search" aria-hidden="true"></i></a></li>
                                    <li class="nav-item"><a href="#" class="icons"><i class="ti-shopping-cart"></i></a></li>
                                    <li class="nav-item"><a href="#" class="icons"><i class="ti-user" aria-hidden="true"></i></a></li>
                                    <li class="nav-item"><a href="#" class="icons"><i class="ti-heart" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Area -->
    <div class="hero_area">
        <!-- Contenu héro ici si nécessaire -->
    </div>

    <!-- Product Section -->
    <section class="product_section">
        <div class="container">
            <div class="product-box">
                <div class="img-box">
                    <img width="200" src="/products/{{$data->image}}" alt="Product Image">
                </div>
                <div class="detail-box">
                    <h6>{{$data->title}}</h6>
                    <h6><span>FCFA{{$data->price}}</span></h6>
                    <h6>Catégorie : {{$data->category->category_name}}</h6>
                    <h6>Quantité disponible <span>{{$data->quantity}}</span></h6>
                    <h6>{{$data->description}}</h6>
                    <div class="order-btn">
                        <a href="{{ route('checkout') }}">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer_area">
        <p>&copy; 2024 2SH. Tous droits réservés.</p>
    </footer>

    <script src="{{ asset('2sh/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('2sh/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ asset('2sh/js/main.js') }}"></script>
</body>
</html>
