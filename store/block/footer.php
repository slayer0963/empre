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
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/buss.js"></script>
      <script>
        $(document).ready(function(){

       $('.dropdown-trigger').dropdown({constrainWidth: false});
        $('.sidenav').sidenav();

        
        $('.collapsible').collapsible();
        $('.modal').modal();
        $('.tap-target').tapTarget();

        $('.carousel').carousel();
        
      });

        // window.onscroll = function() {
        //   console.log("Vertical: " + window.scrollY);
          
        // };
      </script>