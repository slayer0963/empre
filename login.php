
  <html>

  <?php 
    include 'php/config.php';
   ?>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURL; ?>css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/animate.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/lightbox.css">

  

            <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/select2-materialize.css">

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Inicio de sesion</title>
    </head>
    <style>
          .peque { padding: 0; width: 30% !important ; height: 100% !important ;  max-height: 60%;} 
          .usuariomodal { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          .businessmodal { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          .product { padding: 0; width: 30% !important ; height: 100% !important ;  max-height: 89%;}
          .asign { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          th.dt-center, td.dt-center { text-align: center; } 
          .aproduct { padding: 0; width: 50% !important ; height: 100% !important ;  max-height: 85%;}
          .container{
            margin-top: 2rem;
            padding-left: 0;
          }
          .main{
             padding-left: 175px;
          }

          .errorinputs{
            color:red;
          }
          .full{
            padding-top: 0;
            margin-top: 0;
          }
          .successinputs{
            color:green;
          }
          header, footer {
            padding-left: 300px;
          }
          

          @media only screen and (max-width : 992px) {
            header, .main, footer {
              padding-left: 0;
            }
            .tb{
            margin-top: 1rem;
            }
            .peque { width: 75% !important ; height: 75% !important ; } 
            .usuariomodal {padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;} 
            .businessmodal { padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;}
            .product {padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;}
            .asign { padding: 0; width: 100% !important ; height: 80% !important ;  max-height: 85%;}
            .aproduct { padding: 0; width: 100% !important ; height: 80% !important ;  max-height: 85%;}
          }
          .tb{
            margin-top: 2rem;
          }


    </style>

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

		<body class="page-header header-filter "  style="background-image: url('view/assets/img/bg2.jpg'); background-repeat: repeat-x;   height: 100%; max-height: 75%;">
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
  </html>
  		
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.dataTables.js"></script>

      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/dataTables.bootstrap4.min.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURL; ?>/js/dataTables.responsive.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURL; ?>/js/responsive.bootstrap4.js"></script>
      <script  type="text/javascript" src="<?php echo SERVERURL; ?>/js/select2.full.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>/js/materialize.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>/js/lightbox.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>/js/jquery.maskedinput.js"></script>
  <script>
$(document).ready(function(){

  $('.sidenav').sidenav();
  $('#sidenav-1').sidenav({ edge: 'left' });

  $('.modal').modal();
      
    $('.dropdown-trigger').dropdown();
    $('#descrip').characterCounter();
    $('.collapsible').collapsible();
    $('.tabs').tabs();
});
  </script>



<script src="<?php echo SERVERURL; ?>/jsproject/facebook.js"></script>
	<script src="<?php echo SERVERURL; ?>/jsproject/google.js"></script>

