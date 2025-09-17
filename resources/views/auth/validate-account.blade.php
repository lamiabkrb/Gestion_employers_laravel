<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>TP Salaire</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2"  src="{{ asset('assets/images/app-logo.svg') }}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Définir les accès</h2>					

					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" method="POST" action="{{ route('submitdefineaccess') }}">      
							@csrf
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Email </label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" value="{{ $email }}" required="required" readonly>
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Mot de passe </label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Créez un mot de passe" required="required">
							@error('password')
								<div class="text-danger">{{ $message }}</div>
							@enderror
							</div>
                            <div class="password mb-3">
								<label class="sr-only" for="signup-password">Mot de passe de confirmation</label>
								<input id="signup-password" name="confirm_password" type="password" class="form-control signup-password" placeholder="Répétez votre mot de passe" required="required">
							@error('confirm_password')
								<div class="text-danger">{{ $message }}</div>
							@enderror
							</div>
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Valider</button>
							</div>
						</form><!--//auth-form-->
						
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			         <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by  Lmaia BKRB</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Modifier le mot de passe et definir les accès</h5>
					    <div>Une fois votre compte administrateur créé, veuillez modifier votre mot de passe afin de le garder confidentiel et définir vos accès.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

