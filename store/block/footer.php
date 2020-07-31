    </body>
  </html>




  <div id="profiled" class="modal">
    <div class="modal-content row">

      <div class="col s12 m12 l12">
                <form class="col s12 center-align" id="formclie" name="formclie" method="post">
        <div class="row">
          <div class=" col s12">

            <input type="hidden" name="id"  id="id">

            <div class="input-fiel col s12">
             <h3>Mi Perfil</h3>
            
            <div class="file-field input-field col s12">
              <div class="col s8 m6 l6 ">
              <div id="vista-previae">
                
                       <img src="https://image.flaticon.com/icons/png/512/149/149071.png" class=" responsive-img" style="height: 150px; width: 150px;" id="imgcontainere"  >
                    </div>
            </div>
              <div class="col s4 m6 l6 center-align">
                <div class="btn " style="margin-top: 4rem;">
                  <span>Cambiar imagen</span>
                  <input type="file" id="filee" name="filee">
                  <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Imagen" id="imge"  type="hidden">
              </div>
                </div>
              </div>
              
              
              
              
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="fullnamee"  title="Nombre completo" id="fullnamee" style="text-align: center;">
              <span class="" id="txtfullnamee">Nombre completo</span>
            </div>

            <div class="input-field col s12 m12 l6 col s12 m12 l6 ">
              <input type="email" name="emaile" title="Correo electr&oacute;nico" id="emaile" style="text-align: center;">
              <span class="" id="txtemaile">Correo electr&oacute;nico</span>
            </div>
   
            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="usere"  title="Usuario" id="usere" style="text-align: center;">
              <span class="" id="txtusere">Usuario</span>
            </div>

            <div class="input-field col s11 m11 l5 ">
              <input type="password" name="passe"  title="Contraseña" id="passe" style="text-align: center;">
              <span class="" id="txtpasse">Contraseña</span>
            </div>
            <div class="input-field col s1 m1 l1 " >
              <button type="button" class="btn btn-xs" id="viewpass" style="margin-top: 1rem;"><i class="material-icons">remove_red_eye</i></button>
            </div>
          </div>
        </div>
          <button type="submit" class="waves-effect waves-light btn">Editar <i class="material-icons">save</i></button>
        </form>
      </div>
      
      
    </div>
    <div class="modal-footer">
      
    </div>
   
  </div>




<div id="loginm" class="modal animated bounceInDown">
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


 <div id="modalcarshop" class="modal bottom-sheet " >
    <div class="modal-content">
      <ul class="collection" id="cartcli">

      </ul>
        <ul class="collection right-align">
          <li  class="collection-item"><h6 id="totalshop" class="price-new">0</h6></li>
        </ul>
    </div>
    <div class="modal-footer">
      <a href="<?php echo SERVERURLB; ?>store/shoppingcardetails.php" class="green waves-effect waves-green btn-flat" style="color:white;">Ir a carrito</a>
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
      <a href="#!" class="green waves-effect waves-green btn-flat" style="color:white;">Enviar todo a carrito</a>
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

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script>
        <script type="text/javascript" src="view/jsproject/google.js"></script> -->
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/local.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/addcar.js"></script>

      <script>
        $(document).ready(function(){

       $('.dropdown-trigger').dropdown({constrainWidth: false});
        $('.sidenav').sidenav();

        
        $('.collapsible').collapsible();
        
        $('.tap-target').tapTarget();

        $('.carousel').carousel();
        $('.modal').modal();
        $('.fixed-action-btn').floatingActionButton({
            direction: 'left',
            hoverEnabled: false
        });
      });

        // window.onscroll = function() {
        //   console.log("Vertical: " + window.scrollY);
          
        // };
      </script>