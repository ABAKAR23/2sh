<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('{{ asset('images/votre_image.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .next-step,
        .prev-step {
            background-color: #3490dc;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 600;
        }

        .next-step:hover,
        .prev-step:hover {
            background-color: #2779bd;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-group a {
            color: #3490dc;
            text-decoration: none;
        }

        .register-message {
            display: none;
            font-size: 18px;
            color: #38c172;
            margin-top: 20px;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

    </style>
</head>
<body>
    <div class="register-container">
        <h2>Bienvenue sur la page d'inscription</h2>
        <p>Veuillez saisir vos informations pour votre inscription</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Step 1 -->
            <div class="step active">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input id="phone" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="btn-group">
                    <button type="button" class="prev-step" onclick="goToHomepage()">Précédent</button>
                    <button type="button" class="next-step" onclick="showNextStep()">Suivant</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step">
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input id="address" type="text" name="address" :value="old('address')" required autocomplete="address" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="btn-group">
                    <button type="button" class="prev-step" onclick="showPrevStep()">Précédent</button>
                    <button type="button" class="next-step" onclick="showNextStep()">Suivant</button>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="step">
                <p>Vous êtes sur le point de terminer votre inscription.</p>

                <div class="btn-group">
                    <a href="{{ route('login') }}">Déjà inscrit ?</a>
                    <x-primary-button class="ms-4">
                        {{ __('S\'inscrire') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
        <div class="register-message" id="registerMessage">
            Félicitations, vous êtes inscrit !
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function showNextStep() {
            const activeStep = document.querySelector('.step.active');
            const nextStep = activeStep.nextElementSibling;

            if (nextStep && nextStep.classList.contains('step')) {
                activeStep.classList.remove('active');
                nextStep.classList.add('active');
            } else if (!nextStep) {
                document.getElementById('registerMessage').style.display = 'block';
                document.querySelector('form').style.display = 'none';
            }
        }

        function showPrevStep() {
            const activeStep = document.querySelector('.step.active');
            const prevStep = activeStep.previousElementSibling;

            if (prevStep && prevStep.classList.contains('step')) {
                activeStep.classList.remove('active');
                prevStep.classList.add('active');
            }
        }

        function goToHomepage() {
            window.location.href = "/"; // Redirige vers la page d'accueil
        }

    </script>
</body>
</html>
