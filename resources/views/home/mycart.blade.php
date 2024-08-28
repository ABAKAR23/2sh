<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - 2SH</title>
    <link rel="stylesheet" href="{{ asset('2sh/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2sh/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        .header_area {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .top_menu {
            background-color: #343a40;
            color: #fff;
        }

        .top_menu .float-left p,
        .top_menu .float-right ul li a {
            color: #fff;
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

        .cart_area {
            padding: 40px 15px;
            background-color: #f8f9fa;
        }

        .cart_area h2 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }

        .form-control {
            width: auto;
            display: inline-block;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .cart_total {
            margin-top: 20px;
            text-align: right;
        }

        .cart_total h4 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .footer_area {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Styles responsives */
        @media (max-width: 991.98px) {
            .header_area .navbar-brand img {
                height: 40px;
            }

            .cart_area h2 {
                font-size: 1.75rem;
            }

            .table thead th {
                font-size: 14px;
            }

            .table td {
                font-size: 14px;
            }

            .cart_total h4 {
                font-size: 1.25rem;
            }

            .btn {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        @media (max-width: 767.98px) {
            .header_area .navbar-brand img {
                height: 30px;
            }

            .cart_area {
                padding: 20px 10px;
            }

            .table img {
                max-width: 80px;
            }

            .cart_total h4 {
                font-size: 1rem;
            }

            .btn {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        @media (max-width: 575.98px) {
            .header_area .navbar-brand img {
                height: 25px;
            }

            .cart_area {
                padding: 15px;
            }

            .table img {
                max-width: 60px;
            }

            .cart_total h4 {
                font-size: 0.875rem;
            }

            .btn {
                font-size: 10px;
                padding: 4px 8px;
            }
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="header_area">
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
                        <ul class="nav navbar-nav center_nav pull-right">
                            <li class="nav-item active"><a class="nav-link" href="/">Acceuil</a></li>
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
                        </ul>
                        <ul class="nav navbar-nav navbar-right right_nav pull-right">
                            <li class="nav-item"><a href="#" class="icons"><i class="ti-search" aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a href="#" class="icons"><i class="ti-shopping-cart"></i></a></li>
                            <li class="nav-item"><a href="#" class="icons"><i class="ti-user" aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a href="#" class="icons"><i class="ti-heart" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Cart Area -->
    <section class="cart_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Votre Panier</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    @php
                                    $imagePath = $item->image ? asset('products/' . $item->image) : asset('products/default.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="{{ $item->name }}">
                                </td>
                                <td>${{ $item->price }}</td>
                                <td>
                                    <form action="{{ route('update_cart', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control">
                                        <button type="submit" class="btn btn-secondary mt-2">Mettre à jour</button>
                                    </form>
                                </td>
                                <td>${{ $item->price * $item->quantity }}</td>
                                <td>
                                    <a href="{{ route('delete_cart', $item->id) }}" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart_total">
                        <h4>Total: ${{ $cartItems->sum(function($item) { return $item->price * $item->quantity; }) }}</h4>
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer_area">
        <p>&copy; 2024 2SH. Tous droits réservés.</p>
    </footer>

    <script src="{{ asset('eiser/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('eiser/js/bootstrap.min.js') }}"></script>
</body>
</html>
