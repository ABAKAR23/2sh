<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - 2SH</title>
    <link rel="stylesheet" href="{{ asset('2sh/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2sh/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Jost', sans-serif;
        }

        .header_area {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .nav-link {
            color: #333;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .cart_area {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .cart_area h2 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
            font-weight: 700;
            text-align: center;
        }

        .footer_area {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer_area p {
            margin: 0;
        }

        .form-control {
            height: 38px;
            /* Réduit la hauteur des champs */
            padding: .375rem .75rem;
            /* Ajuste le padding */
            font-size: .875rem;
            /* Réduit la taille de la police */
        }

        .btn-primary {
            font-size: 1rem;
            font-weight: 500;
            padding: .5rem 1rem;
            /* Ajuste le padding pour un bouton plus petit */
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="header_area">
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('eiser/img/imdsh.png') }}" alt="Logo" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="/">Acceuil</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="category.html">Shop Category</a>
                                    <a class="dropdown-item" href="single-product.html">Product Details</a>
                                    <a class="dropdown-item" href="checkout.html">Product Checkout</a>
                                    <a class="dropdown-item" href="cart.html">Shopping Cart</a>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Cart Area -->
    <section class="cart_area">
        <div class="container">
            <h2>Veuillez saisir vos informations personnelles</h2>
            <form action="{{ route('confirm_order') }}" method="POST">
                @csrf
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Confirmer la commande</button>
            </form>
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
