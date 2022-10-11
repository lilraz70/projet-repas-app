<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/armoirie2.jpg')}}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Connexion</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="loginbody" style="transform:translateY(80px)">
<div class="wrapper">
        <div class="logo">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
        
        <form class="p-3 mt-4" method="POST" action="{{ route('login') }}">
            @csrf
        
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                
                 <input id="login" type="text" class=" @error('login') is-invalid @enderror" name="login" placeholder="Login" required>
                 @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                 <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
            @error('password')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
             @enderror
            </div>
             <button type="submit" class="btn  mt-2 bg-success text-white">
                {{ __('Connexion') }}
            </button>
        </form>
        {{-- <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
        
         @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublie?') }}
         --}}
    </div>
    </body>
</html>
                       
                