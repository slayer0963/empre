
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
    <title>LOCAL CARAJADA</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="store/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="store/assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

    <style>
        .modal-dialog { padding: 0; width: 25% !important ; height: 65% !important ;  max-height: 72%;}

      
          

        @media only screen and (max-width : 992px) {
           
            .modal-dialog { width: 100% !important ; height: 60% !important ; } 
             
        }
    </style>
</head>

<body class="landing-page">
    
<?php session_start(); ?>



<?php if(!isset($_SESSION["name"])){?>
     <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="namebusi">Tienda Local </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                        <a  class="btn btn-white btn-simple" data-toggle="modal" data-target="#modallogin">
                            <i class="material-icons">shopping_cart</i> Iniciar
                        </a>

                    </li>
                    <li>
                        <a href="" class="btn btn-white btn-simple">
                            <i class="material-icons">shopping_cart</i> Registrarse
                        </a>
                        
                    </li>

                
                 
                </ul>
            </div>
        </div>
    </nav>

<?php }else{ ?>
 <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="namebusi">Tienda Local </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <li class="text-center">
                        <a  class="btn btn-info btn-simple">
                            <i class="material-icons">shopping_cart</i> Carrito
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-white" data-toggle="dropdown">
                            <?php echo $_SESSION['name']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">dns</i> Perfil
                                </a>
                            </li>
                            
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">list</i> Compras
                                </a>
                            </li>
                       
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">input</i> lista de deseos
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a onclick="salir();" class="btn btn-danger">
                                    <i class="material-icons">close</i> Salir
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                   
                   

                 
                </ul>
            </div>
        </div>
    </nav>



<?php } ?>


    <div class="page-header header-filter" data-parallax="true" style="background-image: url('store/assets/img/bg8.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Your Story Starts With Us.</h1>
                    <h4>Every landing page needs a small description after the big bold title, that's why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Watch video
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="title">
                <h3>Algunos negocios</h3>
            </div>
            <div class="row" id="business">
       
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="http://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                           About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                           Blog
                        </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </div>
        </div>
    </footer>

</body>
    <!--   Core JS Files   -->
    <script src="store/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="store/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="store/assets/js/material.min.js"></script>

    <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
    <script src="store/assets/js/moment.min.js"></script>

    <!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
    <script src="store/assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
    <script src="store/assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

    <!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
    <script src="store/assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

    <!--    Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
    <script src="store/assets/js/bootstrap-tagsinput.js"></script>

    <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
    <script src="store/assets/js/jasny-bootstrap.min.js"></script>

    <script type="text/javascript" src="view/jshome/home.js"></script>
      <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script>
        <script type="text/javascript" src="view/jsproject/google.js"></script> -->
        <script type="text/javascript" src="view/jsproject/local.js"></script>

    <!--    Plugin For Google Maps   -->
    <script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
        <script src="store/assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

   
</html>





  <div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Bienvenido!</h5>
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
                                                        <a class="btn btn-social btn-fill btn-facebook" onclick="logInWithFacebook();" style="width: 250px; margin-bottom: 1rem; height: 35px;">
                                                            <span class="fa fa-facebook" style="margin-left: 0px; margin-right: 5rem;" ></span><span class="buttonText">Inicia con Facebook</span>
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
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>