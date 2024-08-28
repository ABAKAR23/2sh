<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - 2SH</title>
    <link rel="stylesheet" href="{{ asset('2sh/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2sh/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        .header_area {
            background-color: #f8f9fa;
        }

        .top_menu {
            background-color: #343a40;
            color: #fff;
        }

        .top_menu .float-left p,
        .top_menu .float-right ul li a {
            color: #fff;
        }

        .top_menu .right_side li a {
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

        .contact_section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .contact_section .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact_section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .contact_section form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact_section form .form-group {
            margin-bottom: 20px;
        }

        .contact_section form .form-control {
            border-radius: 5px;
        }

        .contact_section form .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .contact_section form .btn:hover {
            background-color: #0056b3;
        }

        .footer_area {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

    </style>
</head>
<body>

    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        {{-- Contenu du menu supérieur ici --}}
                    </div>
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
                                    <li class="nav-item active"><a class="nav-link" href="/">Acceuil</a></li>
                                    {{-- Autres éléments de menu ici --}}
                                </ul>
                            </div>
                            <div class="col-lg-5 pr-0">
                                {{-- Icônes et autres éléments de droite --}}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section class="contact_section">
        <div class="container">
            <h2>Contactez-nous</h2>
            <form action="/contact" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </section>

    <footer class="footer_area">
        <p>&copy; 2024 2SH. Tous droits réservés.</p>
    </footer>

    <script src="{{ asset('2sh/js/jquery.min.js') }}"></script>
    <script src="{{ asset('2sh/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>
