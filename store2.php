
<html>

    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="view/css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="view/css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="view/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="view/css/animate.css">

      <link rel="stylesheet" href="view/css/lightbox.css">

		<link rel="stylesheet" href="view/css/select2-materialize.css">

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
		
		<title>LOCAL CARAJADA</title>
      <style>
      	 #modallogin { padding: 0; width: 25% !important ; height: 65% !important ;  max-height: 72%;}

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
           
            #modallogin { width: 75% !important ; height: 45% !important ; } 
             
        }
      </style>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
	<div class="">
			<nav class="teal">
			    <div class="nav-wrapper">
			      <a href="#!" class="brand-logo"><i class="gi gi-shop"></i> CARAJA<strong>DA</strong></a>
			      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			    <!--     <li><a href="sass.html">Sass</a></li>
			        <li><a href="badges.html">Components</a></li> -->
			        <li class="center-align"><a class="modal-trigger" href="#modallogin">Inciar sesion</a></li>
			        <li class="center-align"><a href="#!">Registrarse</a></li>
			      </ul>
			    </div>
			  </nav>

			  <ul class="sidenav" id="mobile-demo">
			    <!-- <li><a href="sass.html">Sass</a></li>
			    <li><a href="badges.html">Components</a></li> -->
			    <li class="center-align"><a class="modal-trigger" href="#modallogin">Inciar sesion</a></li>
			    <li class="center-align"><a href="#!">Registrarse</a></li>
			  </ul>
		</div>
    <body class="">
		
	
		<div class="parallax-container">
	      <div class="parallax">
<div class="slider fullscreen ">
    <ul class="slides">
      <li>
        <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
	      </div>
	    </div>
		<div class="section white">
	      <div class="row container">
	       
				<div class="col l12 m12 s12" id="business"></div>
			
	      
        <div class="col l12 m12 s12 center-align">
          <a class="waves-light btn-small "><i class="material-icons">more_horiz</i></a>
        </div>
        </div>
          
        </div>
	    </div>
			
			<div class="parallax-container">
      <div class="parallax"><img src="https://i.pinimg.com/originals/2c/75/63/2c7563813eaceeb6421175c3b961c902.jpg"></div>
    </div>
	
   	</body>
  </html>
  		
      <script type="text/javascript" src="view/js/jquery.js"></script>
      <script type="text/javascript" src="view/js/jquery.dataTables.js"></script>

      <script type="text/javascript" src="view/js/dataTables.bootstrap4.min.js"></script>
       <script  type="text/javascript" src="view/js/dataTables.responsive.js"></script>
       <script  type="text/javascript" src="view/js/responsive.bootstrap4.js"></script>
      <script  type="text/javascript" src="view/js/select2.full.js"></script>
      <script type="text/javascript" src="view/js/materialize.js"></script>
      <script type="text/javascript" src="view/js/lightbox.js"></script>
      <script type="text/javascript" src="view/js/jquery.maskedinput.js"></script>
      <script type="text/javascript" src="view/jshome/home.js"></script>
      <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script>
        <script type="text/javascript" src="view/jsproject/google.js"></script> -->
      	<script type="text/javascript" src="view/jsproject/local.js"></script>
  <script>
$(document).ready(function(){

  $('.sidenav').sidenav();
  $('#sidenav-1').sidenav({ edge: 'left' });

  $('.modal').modal();
      
    
    $('.dropdown-trigger').dropdown();
    $('#descrip').characterCounter();
    $('.collapsible').collapsible();
    $('.tabs').tabs();
    $('.parallax').parallax();
 
  
     $('.slider').slider({
    indicators: false
  });

});
  </script>


<div id="modallogin" class="modal animated bounceInRight">
    <div class="modal-content">
        <form  method="post" name="login" id="login">
                                <div class="form-group">
                                    <label for="contact-name">Correo</label>
                                    <input type="text" id="email" name="email" class="form-control input-md" placeholder="ejemplo@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="contact-name">Contraseña</label>
                                    <input type="text" id="password" name="password" class="form-control input-md" placeholder="******">
                                </div>
                                <center>
																<button class="btn btn-primary" style="width: 250px; margin-bottom: 1rem; height: 35px;" type="submit" name="ingresarl" id="ingresarl">Inicia con nosotros</button>
																<br>
																
											<div>
														<a class="btn  blue" onclick="logInWithFacebook();" style="width: 250px; margin-bottom: 1rem; height: 35px;">
												            <span class="fa fa-facebook"></span><span class="buttonText">Inicia con Facebook</span>
													</a>
											</div>
													

												<div>
													<div class="g-signin2" data-onsuccess="onSignIn" data-width="250" ></div>

												<script src="https://apis.google.com/js/platform.js" async defer></script>
												</div>
																
															</center>
        </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>