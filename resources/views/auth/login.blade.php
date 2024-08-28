<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
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
            {{-- background-image: url('{{ asset('images/2SH logo.png') }}'); --}}
            /* Remplacez votre_image.jpg par le nom de votre fichier */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            color: #2d3748;
        }

        .input-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-field {
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            padding: 0.75rem;
            width: 100%;
            font-size: 1rem;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .input-field:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
            outline: none;
        }

        .btn-primary {
            background-color: #3182ce;
            color: white;
            padding: 0.75rem;
            border-radius: 0.375rem;
            border: none;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 700;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #2c5282;
        }

        .text-sm {
            font-size: 0.875rem;
            color: #718096;
            text-align: center;
            margin-top: 1rem;
        }

        .text-sm a {
            color: #3182ce;
            text-decoration: none;
        }

        .text-sm a:hover {
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .remember-me input {
            margin-right: 0.5rem;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>{{ __('se connecter') }}</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="input-label">{{ __('Email') }}</label>
                <input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="input-label">{{ __('Mot de passe') }}</label>
                <input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="text-sm">{{ __('Souviens-toi de moi') }}</label>
            </div>

            <!-- Forgot Password -->
            <div class="text-sm">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary">
                {{ __('Se connecter') }}
            </button>
        </form>
    </div>
</body>
</html>
