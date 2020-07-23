<html>

  <?php
    session_start();
    include 'php/config.php';
    include_once "cn/connection.php";
   ?>
    <head>
      <title>Mi negocio</title>

       <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/animate.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/lightbox.css">

    <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/select2-materialize.css">

    <style>
      .men{
        margin-top: 5rem;
      }
    #profile{
    margin-top: 1rem;
      }
      .dropdown-content {
        top: -50px;

      }
    </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        #loginm { padding: 0; width: 25% !important ; height: 65% !important ;  max-height: 72%;}

      
          

        @media only screen and (max-width : 992px) {
           
            #loginm { width: 100% !important ; height: 60% !important ; } 
             
        }
      </style>
  </head>
  <body class="">

     <div class="" id="contenidomenu">
      <?php if(!isset($_SESSION["name"])){?>
        <div class="navbar-fixed">
          <nav class="cyan darken-3">
    
    <div class="nav-wrapper">
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;">Tienda Local</a>
      <a href="#!" class="brand-logo hide-on-large-only" style="width: 50%; margin-top: .5px; ">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#!" class="brand-logo show-on-large-only hide-on-med-and-down" style=" margin-left: 15rem; width: 45%; margin-top: .5px;">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
        
      

      
      <ul class="right hide-on-med-and-down">
         
        <li>
          <a class=" modal-trigger" href="#loginm">Iniciar</a>
        </li>

        <li style="">
          <a href="">Registrase</a>
        </li>
      </ul>
    </div>


          
 
      </nav>
        </div>
        

    <ul class="sidenav center-align" id="mobile-demo" style="">
         <li>
          Tienda Local
        </li>
        <li class="divider"></li>
            <li><a  class=" modal-trigger" href="#loginm">Iniciar</a></li>
            <li class="divider"></li>
            <li><a href="#!" class="">Registarse</a></li>
      </ul>






         <?php }else{?>
          <div class="navbar-fixed">
            <nav class="cyan darken-3 ">
    
    <div class="nav-wrapper">
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;">Tienda Local</a>
      <a href="#!" class="brand-logo hide-on-large-only" style="width: 50%; margin-top: .5px; ">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#!" class="brand-logo show-on-large-only hide-on-med-and-down" style=" margin-left: 15rem; width: 45%; margin-top: .5px;">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
       <a  class="hide-on-large-only right brand-logo modal-trigger" href="#modalcarshop"><i class="material-icons">shopping_cart </i></a>
        <span class="new badge hide-on-large-only numbercar"></span>
      

      
      <ul class="right hide-on-med-and-down">
        <li>
           <a  class=" brand-logo modal-trigger" href="#modalcarshop"><i class="material-icons" >shopping_cart </i></a>
        <span class="new badge numbercar"></span>
        </li>

        <li style="width: 180px;">
          <a class="dropdown-trigger brand-logo right valign-wrapper left hide-on-med-and-down" href="#!" data-target="dropdown1">
        
            <div class="chip" id="profile" style="color:black;">
          <img src="view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
            <?php echo $_SESSION['name']; ?>
          </div>
  

            </a>
        </li>
      </ul>
    </div>

          <ul id="dropdown1" class="dropdown-content  center-align" style="overflow:visible" >
                
            <li class="divider"></li>
            <li><a  class="modal-trigger" href="#modalwis">Lista de deseos</a></li>
            <li class="divider"></li>
            <li><a href="#!" class="">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
          </ul>
          
        </div>
      </nav>
          </div>
    

    <ul class="sidenav" id="mobile-demo" style="">
        <li>
          <div class="chip" style="width: 100%;">
            <img src="view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
            <?php echo $_SESSION['name']; ?>
          </div>
        </li>
        <li class="divider"></li>
            <li><a  class="modal-trigger" href="#modalwis">Lista de deseos</a></li>
        <li class="divider"></li>
            <li><a href="#!" class="">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
      </ul>
      
         <?php }?>
    
    <div class="row " style="z-index: -1;">
      <div class="col l6 m6 s12">
        <ul class="collapsible hide-on-med-and-down animated slideInDown">
            <li>
              <div class="collapsible-header " ><i class="material-icons">arrow_drop_down</i>Todas las Categorias</div>
              <div class="collapsible-body" >
                    <div class="row center-align " id="categories"> </div>

              </div>
              
            </li>
          </ul>
      </div>
      <div class="col l6 m6 s12">
        <ul class="collapsible hide-on-med-and-down animated slideInDown">
            <li>
              <div class="collapsible-header "><i class="material-icons">arrow_drop_down</i>Todos los Tipos</div>
              <div class="collapsible-body" >
                    <div class="row center-align " id="producttype">
                      
                    </div>

              </div>
              
            </li>
          </ul>
      </div>
        
    
      <div class="animated slideInDown show-on-med-and-down hide-on-large-only center-align">
        <h5>Categorias</h5>
          <div class="row center-align " id="categoriesm"> </div>
        <h5>Tipos</h5>
          <div class="row center-align" id="productypem"> </div>
      </div>
      <div class="col l12 m12 s12 animated" id="contbusi">
        <div class="">
          <div class="row " id="business">


       </div>
        </div>
      </div>

      
    </div>




    </body>
  </html>






<div id="loginm" class="modal">
    <div class="modal-content">
      <h4>Iniciar sesion</h4>
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
                                                    <div class="g-signin2" data-onsuccess="onSignIn" data-width="250" ></div>

                                                <script src="https://apis.google.com/js/platform.js" async defer></script>
                                                </div>
                                                                
                                                            </center>
        </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
  </div>


 <div id="modalcarshop" class="modal bottom-sheet" >
    <div class="modal-content">
      <ul class="collection" id="cartcli">

      </ul>
        <ul class="collection right-align">
          <li  class="collection-item"><h6 id="totalshop" class="price-new">0</h6></li>
        </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="green waves-effect waves-green btn-flat">Ir a carrito</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Seguir comprando</a>
    </div>
  </div>

   <div id="modalwis" class="modal bottom-sheet" >
    <div class="modal-content">
      <ul class="collection" id="wishcli">

      </ul>
        <ul class="collection right-align">
          <li  class="collection-item"><h6 id="totalwish" class="price-new">0</h6></li>
        </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="green waves-effect waves-green btn-flat">Enviar todo a carrito</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Seguir comprando</a>
    </div>
  </div>



      
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/jquery.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.dataTables.js"></script>

      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/dataTables.bootstrap4.min.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/dataTables.responsive.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/responsive.bootstrap4.js"></script>
      <script  type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/select2.full.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/materialize.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/lightbox.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/js/jquery.maskedinput.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jshome/homecat.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script>
        <script type="text/javascript" src="view/jsproject/google.js"></script> -->
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jsproject/local.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/addcarh.js"></script>
      <script>
        $(document).ready(function(){

       $('.dropdown-trigger').dropdown({constrainWidth: false});
        $('.sidenav').sidenav();

        $('.carousel').carousel();
        $('.collapsible').collapsible();
        $('.modal').modal();
        $('.tap-target').tapTarget();
        
      });

        // window.onscroll = function() {
        //   console.log("Vertical: " + window.scrollY);
          
        // };
      </script>
  <script>