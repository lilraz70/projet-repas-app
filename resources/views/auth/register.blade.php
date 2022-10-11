<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Super Utilisateur</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Connexion</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="registerbody">
<div class="signup-form">
     <form method="POST" action="{{ route('register') }}">
        @csrf
		
		<p>Merci de remplir ce formulaire pour créer un compte !</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input   type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Nom et Prenom" required="required">
			
            @error('name')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
            </div>
        </div>

         <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user-circle"></span>
					</span>                    
				</div>
				<input  type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}"  placeholder="Login" required="required">
			
             @error('login')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
            </div>
        </div>

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-envelope"></i>
					</span>                    
				</div>
				<input  type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" placeholder="Adresse Email" required="required">
                 @error('email')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
            </div>
            
        </div>

        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="">+226</option>
		</select>
    	<input name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" placeholder="Telephone" type="text">
         @error('telephone')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
    </div>


		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input   type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required="required">
			
             @error('password')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
             </div>
            @enderror
        </div>

		{{-- <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input d="password-confirm" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm_password" placeholder="Confirmer le Mot de passe" required="required">
                 @error('password-confirm')
             <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
            </div>
        </div> --}}
		<div class="form-group mt-3 d-flex align-items-end flex-column">
            <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
        </div>
    </form>
</body>
</html>