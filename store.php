<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Tienda local carajada</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="resources/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="resources/css/main.css">

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="resources/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="resources/js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!-- 'boxed' class for a boxed layout -->
        <div id="page-container">
            <!-- Site Header -->






            <header>
                <div class="container">
                    <!-- Site Logo -->
                    <a href="" class="site-logo" >
                        <i class="gi gi-shop"></i> CARAJA<strong>DA</strong>
                    </a>
                    <!-- Site Logo -->

                    <!-- Site Navigation -->
 
                    <nav class="inline">
                        
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-default visible-xs visible-sm">
                            <i class="fa fa-shopping-cart"><label id="npro">0</label></i>
                        </a>
                        <!-- END Menu Toggle -->

                        <!-- Main Menu -->
                        <ul class="site-nav">
                            <!-- Toggles menu on small screens -->
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <!-- END Menu Toggle -->
                            
                           
                           
                            <div class="loginon hidden">
                                <li>
                                <a href="javascript:void(0)" class="site-nav-sub">Home</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#perfil" class="site-nav-sub">Perfil</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="site-nav-sub fa fa-shopping-cart hidden-xs hidden-sm">&nbsp;<sup id="npro">0</sup></a>
                                </li>
                                <li>
                                    <a  href="javascript:void(0)" class="site-nav-sub ">Salir</a>
                                </li>
                            </div>
               

                             <div class="loginoff">
                                <li>
                                <a href="javascript:void(0)" class="site-nav-sub">Home</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login" class="btn btn-primary">Log In</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="btn btn-success">Sign Up</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="site-nav-sub fa fa-shopping-cart hidden-xs hidden-sm">&nbsp;<sup id="npro">0</sup></a>
                                </li>
                            </div>
                  
                        </ul>
                        <!-- END Main Menu -->
                    </nav>
                    <!-- END Site Navigation -->
                </div>
            </header>

            <!-- Media Container -->
            <!-- <div class="media-container" > -->
                <!-- Intro -->
                <!-- <section class="site-section site-section-light site-section-top">
                    <div class="container text-center">
                        <h1 class="animation-slideDown"><strong>Hola bienvenido a Tienda Local carajada!</strong></h1>
                        <h2 class="h3 animation-slideUp hidden-xs" >Aqui podras ver muchos negocios con distintos productos para ti!</h2>
                    </div>
                </section> -->
                <!-- END Intro -->

                <!-- For best results use an image with a resolution of 2560x279 pixels -->
       <!--          <img src="resources/img/placeholders/headers/store_home.jpg" alt="" class="media-image animation-pulseSlow">
            </div> -->
            <!-- END Media Container -->

            <!-- Products -->
            <section class="site-content site-section">
                <div class="container">
                    <!-- Seach Form -->
<!--                     <div class="site-block">
                        <form action="ecom_search_results.html" method="post">
                            <div class="input-group input-group-lg">
                                <input type="text" id="ecom-search" name="ecom-search" class="form-control text-center" placeholder="Search Store..">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <!-- END Seach Form -->

                    <!-- New Arrivals -->
                    <h3 class="site-heading" style="margin-top: 5rem;"><strong>Negocios</strong></h3>
                    <hr>
                    <div class="row store-items">
					
					<div id="business">
						
					</div>


                        <div class="col-md-12 text-right">
                            <a href="ecom_product_list.html"><strong>View All</strong> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- END New Arrivals -->

            <!-- Explore Store Action -->
            <!-- <section class="site-content site-section site-section-light themed-background-dark-night">
                <div class="container">
                    <div class="text-center push">
                        <div class="push">
                            <i class="gi gi-shopping_bag fa-5x text-muted"></i>
                        </div>
                        <a href="ecom_product_list.html" class="btn btn-lg btn-primary">Explore Store <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </section>

            <footer class="site-footer site-section">

            </footer> -->
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="resources/js/vendor/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURL; ?>jshome/home.js"></script>
        <script src="resources/js/vendor/bootstrap.min.js"></script>
        <script src="resources/js/plugins.js"></script>
        <script src="resources/js/app.js"></script>
        <script src="<?php echo SERVERURL; ?>/jsproject/facebook.js"></script>
        <script src="<?php echo SERVERURL; ?>/jsproject/google.js"></script>
      	<script src="<?php echo SERVERURL; ?>/jsproject/local.js"></script>
    </body>
</html>





<!-- MODAL -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	  <div class="row text-center">
			    <div class="col">
			      <h3 class="h2 site-heading"><strong>Iniciar sesión</strong></h3>
			    </div>
  </div>
        
       
      </div>
      <div class="modal-body">
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
														<a class="btn  btn-info" onclick="logInWithFacebook();" style="width: 250px; margin-bottom: 1rem; height: 35px;">
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
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

