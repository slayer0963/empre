<html>

  <?php
  	session_start();
    include '../php/config.php';
    include_once "../cn/connection.php";
   ?>
    <head>
    	<title>Mi negocio</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURL; ?>css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/animate.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/lightbox.css">

	  <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/select2-materialize.css">

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

      </style>
  </head>
	<body class="">

		 <div class="" id="contenidomenu">
      <?php include 'topmenu.php'; ?>
		  </div>

		<div class="row animated " id="products">

		 
			<div class="col s12 m12 l12">
				<div class="container ">
					<!-- <a id="backe" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br> -->
					<div class="row center-align" id="contentpro">
						
					</div>

					
				</div>
			</div>
			<div class="fixed-action-btn">
								  <a class="btn-floating btn red" id="menuadde" href="#">
								    <i class="large material-icons">format_quote</i>
								  </a>
								  <ul>
								     <li><a class="btn-floating yellow tooltipped" data-position="left" data-tooltip="Modo edici&oacute;n" href="#" id="btnproedit"><i class="material-icons">mode_edit</i></a></li> 
								    <li><a class="btn-floating blue modal-trigger tooltipped" data-position="left" data-tooltip="Agregar producto" href="#addpro"><i class="material-icons">add</i></a></li>
								  </ul>
								</div>
		</div>




    </body>
  </html>



<!-- modal add product -->
  <div id="addpro" class="modal modal-fixed-footer addpro">
    <div class="modal-content">
      <h4>Producto</h4>
      <div class="row">
        <form class="col s12 center-align" id="formproduct" name="formproduct" method="post">
        <div class="row">
			<input type="hidden" id="idbusinp" name="idbusinp">
          <div class="input-field col s12">
			
            <input type="text" name="namep" title="Nombre (*)" id="namep">
            <label for="namep">Nombre</label>
            <span class="" id="txtnamep"></span>
          </div>
          <div class="input-field col s12">
            <textarea id="descrip" name="descrip" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="250"></textarea>
            <label for="descrip">Descripci&oacute;n</label>
            <span class="" id="txtdescrip"></span>
          </div>
          <div class="input-field col s12 m12 l12">
              <i class="material-icons prefix">attach_money</i>
              <input id="pcompra" name="pcompra" title="Precio Compra (*)" type="text" >
              <label for="pcompra">Precio de compra</label>
              <span class="" id="txtpcompra"></span>
            </div>
          <div class="input-field col s12 m12 l12">
              <i class="material-icons prefix">attach_money</i>
              <input id="pventa" name="pventa" title="Precio Venta (*)" type="text" >
              <label for="pventa" id="">Precio de venta</label>
              <span class="" id="txtpventa"></span>
          </div>
          <div class="input-field col s12">
              <select  class="select2 browser-default" id="cat" name="cat" title="Categor&iacute;a (*)">
              </select>
              <span class="" id="txtcat"></span>
          </div>
          <div class="input-field col s12">
              <select  class="select2 browser-default" id="tp" name="tp" title="Tipo de producto (*)">
              </select>
              <span class="" id="txttp"></span>
          </div>
        </div>
        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
    <div class="modal-footer">
      <a id="salir" class="modal-close  btn-flat">Salir</a>
      
    </div>
  </div>



  <div id="modal2" class="modal modal-fixed-footer product">
      <div class="modal-content">
        <h4>Editar producto</h4>
        <div class="row">
          <form class="col s12 center-align" name="formproducte" id="formproducte" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input type="hidden" name="id" title="Nombre (*)" id="id">
              <input type="text" name="namee" title="Nombre (*)" id="namee" style="text-align: center;">
              
              <span class="" id="txtnamee">Nombre</span>
            </div>
            <div class="input-field col s12">
              <textarea id="descripe" name="descripe" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="250" style="text-align: center;"></textarea>
             <span class="" id="txtdescripe">Descripci&oacute;n</span>
            </div>
            <div class="input-field col s12">
                <select  class="select2 browser-default" id="cate" name="cate" title="Categor&iacute;a (*)">
                </select>
                <span class="" id="txtcate">Categor&iacute;a</span>
            </div>
            <div class="input-field col s12">
                <select  class="select2 browser-default" id="tpe" name="tpe" title="Tipo de producto (*)">
                </select>
                <span class="" id="txttpe">Tipo producto</span>
            </div>
          </div>
          <button type="submit" class=" btn">Editar <i class="material-icons">save</i></button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
    </div>


<!-- ] -->

  <div class="tap-target green" data-target="menuadde">
    <div class="tap-target-content">
      <h5>Aviso</h5>
      <p>Aqui tendras la opcion de agregar productos</p>
    </div>
  </div>



  		
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.dataTables.js"></script>

      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/dataTables.bootstrap4.min.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURL; ?>js/dataTables.responsive.js"></script>
       <script  type="text/javascript" src="<?php echo SERVERURL; ?>js/responsive.bootstrap4.js"></script>
      <script  type="text/javascript" src="<?php echo SERVERURL; ?>js/select2.full.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/materialize.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/lightbox.js"></script>
      <script type="text/javascript" src="<?php echo SERVERURL; ?>js/jquery.maskedinput.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="<?php echo SERVERURLB; ?>mystore/js/products.js">></script>
      <script>
      	$(document).ready(function(){

			$('.dropdown-trigger').dropdown({constrainWidth: false});
			$('.sidenav').sidenav();
			$('.modal').modal();
			$('.tap-target').tapTarget();
			$('.fixed-action-btn').floatingActionButton({
			    direction: 'top',
      			hoverEnabled: false
			  });
		  });
      </script>
<?php include 'footer.php'; ?>