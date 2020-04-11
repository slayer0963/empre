<title>Inicio de sesion</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
	body
{
	background: #f5f5f5;
}

h5
{
	font-weight: 400;
}
    span.buttonText {

      padding-left: 15px;
      padding-right: 15px;
    
      
    }
.container
{
	width: 350px;
	height: 600px;
}

.tabs .indicator
{
	background-color: #e0f2f1;
	height: 60px;
	opacity: 0.3;
}

.form-container
{
	padding: 40px;
	padding-top: 10px;
}

.confirmation-tabs-btn
{
	position: absolute;
}
</style>
    <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">

		<body class="page-header header-filter "  style="background-image: url('assets/img/bg2.jpg'); background-repeat: repeat-x;   height: 100%; max-height: 75%;">
			<div class="container">
				    	<div class="container animated  bounceInRight" style="margin-top: 10%;">
							<div class="row">
				    			<div class="col s12 m12 l12 ">
								  <div class="row">
									    <div class="col s12 m12">
											<div class="container white z-depth-2">
												<ul class="tabs teal">
													<li class="tab col s12"><a class="white-text active" href="#login">Iniciar sesión</a></li>
												</ul>
												<div id="login" class="col s12">
													<form class="col s12">
														<div class="form-container">
															<h3 class="teal-text">Hola</h3>
															<div class="row">
																<div class="input-field col s12">
																	<input id="email" type="email" class="validate">
																	<label for="email">Correo</label>
																</div>
															</div>
															<div class="row">
																<div class="input-field col s12">
																	<input id="password" type="password" class="validate">
																	<label for="password">Contraseña</label>
																</div>
															</div>
															<br>
															<center>
																<button class="btn waves-effect waves-light teal" style="width: 250px; margin-bottom: 1rem;" type="submit" name="action">Inicia con nosotros</button>
																<br>
																
													<a class="btn  btn-social btn-facebook blue darken-3" onclick="logInWithFacebook();" style="width: 250px; margin-bottom: 1rem;">
												            <span class="fa fa-facebook"></span><span class="buttonText">Inicia con Facebook</span>
													</a>
													

												<div class="g-signin2" data-onsuccess="onSignIn" data-width="250" ></div>

												<script src="https://apis.google.com/js/platform.js" async defer></script>
																
															</center>
														</div>
													</form>
												</div>
											</div>
									    </div>
									  </div>

				                </div>
				            </div>
						</div>
			</div>



</body>

<script src="<?php echo SERVERURL; ?>/jsproject/facebook.js"></script>
	<script src="<?php echo SERVERURL; ?>/jsproject/google.js"></script>
