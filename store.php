<html>

  <?php
    session_start();
    include 'php/config.php';
    include_once "cn/connection.php";
   ?>
    <head>
      <title>Mi negocio</title>
      <script src="https://apis.google.com/js/platform.js" async defer>
        {lang:'es'}
      </script>
       <meta name="google-signin-client_id" content="606135828680-h6kephp10df7d02ba9vrrp7etjfb220m.apps.googleusercontent.com">
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
      .price-new{
    color: green;
    font-size: 20px;
   }
   .price-old{
    color: red;
    text-decoration: line-through;
    opacity: 0.5;
    font-size: 20px;
   }
    </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        #loginm { padding: 0; width: 25% !important ; height: 60% !important ;  max-height: 72%;}
        #profiled { padding: 0; margin-top:-2rem; width: 50% !important ; height: 100% !important ;  max-height: 85%;}
           .usuariomodal { margin-top: -2rem; padding: 0; width: 30% !important ; height: 100% !important ;  max-height: 90%;}

        @media only screen and (max-width : 992px) {
           .usuariomodal {padding: 0; width: 100% !important ; height: 95% !important ; max-height: 85%;} 
            #loginm { width: 100% !important ; height: 65% !important ; }
            #profiled { width: 100% !important ;  height: 100% !important ;  max-height: 85%;}
           
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

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
        
      

      
      <ul class="right hide-on-med-and-down">
         
        <li>
          <a class=" modal-trigger" href="#loginm">Iniciar</a>
        </li>

        <li style="">
          <a class=" modal-trigger" href="#register">Registrase</a>
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
            <li><a class=" modal-trigger" href="#register">Registarse</a></li>
      </ul>






         <?php }else{?>
          <div class="navbar-fixed">
            <nav class="cyan darken-3 ">
    
    <div class="nav-wrapper">
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;">Tienda Local</a>



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
            <li><a  class="modal-trigger" href="<?php echo SERVERURLB; ?>store/address">Dirección de entrega</a></li>
        <li class="divider"></li>
            <li><a href="#profiled" class="modal-trigger" onclick="fillboxprofile(<?php echo $_SESSION['idus']; ?>);">Perfil</a></li>
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
        <li><a  class="modal-trigger" href="<?php echo SERVERURLB; ?>store/address">Dirección de entrega</a></li>
        <li class="divider"></li>
            <li><a href="#profiled" class="modal-trigger" onclick="fillboxprofile(<?php echo $_SESSION['idus']; ?>);">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
      </ul>
      
         <?php }?>
    
    <div class="row" id="contentpage" style="z-index: -1;">
      <div class="container" style="">
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
      
        
    
      <div class="animated slideInDown show-on-med-and-down hide-on-large-only center-align">
        <h5>Categorias</h5>
          <div class="row center-align " id="categoriesm"> </div>
        <h5>Tipos</h5>
          <div class="row center-align" id="productypem"> </div>
      </div>
      <div class="col l12 m12 s12 animated" id="contbusi">
        
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
                                    <input type="text" id="email" name="email" required="true" class="form-control input-md" placeholder="ejemplo@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="contact-name">Contraseña</label>
                                    <input type="text" id="password" required="true" name="password" class="form-control input-md" placeholder="******">
                                </div>
                                <br>
                                <center>
                                                                <button class="btn btn-primary" style="width: 250px; margin-bottom: 1rem; height: 35px;" type="submit" name="ingresarl" id="ingresarl">Inicia con nosotros</button>
                                                                <br>

                                                                
                                                            </center>
        </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
  </div>


<div id="register" class="modal usuariomodal">
    <div class="modal-content center-align">
       <h4>Registrate</h4>
      <form class="col s12 center-align" id="frmregister" name="frmregister" method="post">
        <div class="row">
        
           

           <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://image.flaticon.com/icons/png/512/149/149071.png" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Imagen</span>
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen (*)" id="img"  type="text">
              </div>
            </div>
            <span class="" id="txtimg"></span>
            </div>


            <div class="form-group col s12 m12 l12">
              <input type="text" name="fullname" title="Nombre completo (*)" id="fullname">
              <label for="fullname">Nombre completo</label>
              <span class="" id="txtfullname"></span>
            </div>

            

            <div class="form-group col s12 m12 l12">

              <input type="email" name="email" title="Correo electr&oacute;nico (*)" id="emailr">
              <label for="email">Correo electr&oacute;nico</label>
              <span class="" id="txtemail"></span>
            </div>
            
            <div class="form-group col s12 m12 l12 ">
              <input type="text" name="user" title="Usuario (*)" id="user">
              <label for="user">Usuario</label>
              <span class="" id="txtuser"></span>
            </div>

            <div class="form-group col s12 m12 l12">
              <input type="password" name="pass" title="Contraseña (*)" id="pass">
              <label for="pass">Contraseña</label>
              <span class="" id="txtpass"></span>
            </div>




            

          
        </div>
        <button type="submit" class=" btn">Registrarse </button>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
  </div>



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



 <div id="modalcarshop" class="modal bottom-sheet" >
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
      <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jshome/homecat.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script> -->
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jsproject/google.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jsproject/local.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/addcarh.js"></script>
      <script>
        $(document).ready(function(){
          if(localStorage.getItem('modificaperfil')==1){
            M.toast({html: "¡Tus datos se cambiaron exitosamente!", classes: 'rounded green'});
            localStorage.setItem('modificaperfil',0)
          }

            if(localStorage.getItem('newuser')==1){
            swal({
                title: "Hola!",
                text: "Te damos la bienvenida a Tienda Local!",
                icon: "success",
                button: "Comenzar",
              });
            localStorage.setItem('newuser',0)
          }

       $('.dropdown-trigger').dropdown({constrainWidth: false});
        $('.sidenav').sidenav();

        $('.carousel').carousel();
        $('.collapsible').collapsible();
        $('.modal').modal();
        $('.tap-target').tapTarget();


    var contpass=0;
      $("#viewpass").click(function(event) {

        if(contpass==0){
          $("#passe").attr({
          type: 'text'
          });
          contpass++;
        }
        else{
          $("#passe").attr({
            type: 'password'
          });
          contpass=0;
        }
        
        
      });
        
            $("#img").change(function(event) {
                 document.getElementById("imgcontainer").removeAttribute('src');

                    $("#vista-previa").html('');
                            var archivos=document.getElementById('file').files;
                    var navegador=window.URL || window.webkitURL;

                    for (var i = 0; i < archivos.length; i++) {

                        var size=archivos[i].size;
                        var type=archivos[i].type;
                        var name=archivos[i].name;
                        
                            var objeto_url=navegador.createObjectURL(archivos[i]);

                     $("#vista-previa").append('<img src="'+objeto_url+'" id="imgcontainer" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
                   }
                });
            $("#imge").change(function(event) {
                 document.getElementById("imgcontainere").removeAttribute('src');

                    $("#vista-previae").html('');
                            var archivos=document.getElementById('filee').files;
                    var navegador=window.URL || window.webkitURL;

                    for (var i = 0; i < archivos.length; i++) {

                        var size=archivos[i].size;
                        var type=archivos[i].type;
                        var name=archivos[i].name;
                        
                            var objeto_url=navegador.createObjectURL(archivos[i]);

                     $("#vista-previae").append('<img src="'+objeto_url+'" id="imgcontainere" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
                   }
                });

            $('#frmregister').submit(function() {
              if(Validate(1)==idinput.length){
                var formData = new FormData(document.getElementById("frmregister"));
                  formData.append("dato", "valor");
                         $.ajax({
                        type: "POST",
                        url: "controller/cclienta.php?btnsetData=setRegister", 
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                         var datos = eval(resp);
                               if(datos[0].estado==1){
                                localStorage.setItem('client',datos[0].id);
                                localStorage.setItem('nameper',datos[0].nombre);
                                 localStorage.setItem('newuser',1);
                                location.reload();
                                 
                               }else if(resp=="x"){
                                M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});
                                
                               }
                               else{
                                M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                                
                               }
                                 
                        }       
                            
                    });
            }
                return false;
            });



            $('#formclie').submit(function() {
               if(Validate(0)==idinpute.length){
                var formData = new FormData(document.getElementById("formclie"));
                        $.ajax({
                        type: "POST",
                        url: "controller/cclienta.php?updateData=updatepro", 
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            var datos = eval(resp);
                            if(datos[0].estado==1){
                                localStorage.setItem('client',datos[0].id);
                                localStorage.setItem('nameper',datos[0].nombre);
                                localStorage.setItem('modificaperfil',1);
                                location.reload();

                               }else if(resp=="x"){
                                M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});
                                
                               }
                               else{
                                M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                               } 
                           }
                            
                    });
                
              }
              return false;
            });


            var idinpute = ['imge','fullnamee','emaile','usere','passe'];
            var idinputerrore= ['txtimge','txtfullnamee','txtemaile','txtusere','txtpasse'];
            var idinput = ['img','fullname','emailr','user','pass'];
            var idinputerror= ['txtimg','txtfullname','txtemail','txtuser','txtpass'];

            var Validate = (type) =>{
              var validate=0, html="", count=0, counte=0;
              if(type==1){
                    idinput.forEach(names => {
                      
                   if($("#"+names).val()!=0){
                    
                     validate+=1;
                     html="Listo";
                     //alert($("#"+names).val());
                     $("#"+idinputerror[count]).html($("#"+names).attr('title'));
                     $("#"+idinputerror[count]).removeClass('errorinputs');
                     $("#"+idinputerror[count]).addClass('successinputs');
                     
                   }
                   else{  
                    //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
                    $("#"+idinputerror[count]).html($("#"+names).attr('title')); 
                    $("#"+idinputerror[count]).removeClass('successinputs');      
                     $("#"+idinputerror[count]).addClass('errorinputs'); 
                   }
                   count++;
                });
              }
              else{
               idinpute.forEach(names => {
                   if($("#"+names).val()!=0){
                    validate+=1;
                     $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
                     $("#"+idinputerrore[counte]).removeClass('errorinputs');
                     $("#"+idinputerrore[counte]).addClass('successinputs');
                   }
                   else{
                     $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
                     $("#"+idinputerrore[counte]).removeClass('successinputs');
                     $("#"+idinputerrore[counte]).addClass('errorinputs');
                   }
                    counte++;
                });

              }

                return validate;
            }

            var cleanbox=()=>{
            idinputerror.forEach(names => {
              $("#"+names).removeClass('successinputs');      
            });
            idinputerrore.forEach(names => {
              $("#"+names).removeClass('successinputs');      
            });
            }



      });


        function fillboxprofile(id) {
          var dataString = 'id='+id;
              $.ajax({
                    type: "POST",
                    url: "controller/cclienta.php?btngetDatacli=getdataprofile", 
                    data: dataString,
                    success: function(resp) {
                      //alert(resp);
                      var respu = eval(resp);
                          for (var i = 0; i < respu.length; i++) {
                            $("#id").val(respu[0].id_cl);
                            $("#fullnamee").val(respu[0].fullname_cl);
                            $("#imgcontainere").attr("src",'view/imguser/'+respu[0].imagen);
                            $("#imge").val(respu[0].imagen);
                            $("#emaile").val(respu[0].email_cl);
                            $("#usere").val(respu[0].user_cl);
                            $("#passe").val(respu[0].pass_cl);
                          }
                    }
                  });
}

        // window.onscroll = function() {
        //   console.log("Vertical: " + window.scrollY);
          
        // };
      </script>
