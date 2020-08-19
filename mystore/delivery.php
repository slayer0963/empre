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

		<div class="row animated slideInDown valign-wrapper" >
			<div class="col s12 m12 l12">
				<div class="container ">
          <br>
          <table id="tbdelivery" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                 <thead >
              <tr>
                <th class="text-center" data-priority="1">N° Pedido</th>
                <th class="text-center" data-priority="2">Cliente</th>
                <th class="text-center" data-priority="4">Fecha de venta</th>
                <th class="text-center"   data-priority="3">Estado</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th class="text-center" data-priority="1">N° Pedido</th>
                <th class="text-center" data-priority="2">Cliente</th>
                <th class="text-center" data-priority="4">Fecha de venta</th>
                <th class="text-center"  data-priority="3">Estado</th>
              </tr>
            </tfoot>
         </table>
				</div>
			</div>
		</div>




    </body>
  </html>

        <div id="deliverylist" class="modal">
        <div class="modal-content">
          <h6 id="nameclide"></h6>
          <table id="tbdatesales" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
           <thead >
        <tr>
          <th class="text-center"data-priority="">Producto</th>
          <th class="text-center"data-priority="1">Imagen</th>
          <th class="text-center"data-priority="3">Detalles</th>
          <th class="text-center"data-priority="2">Cantidad</th>
        </tr>
      </thead>
      <tbody id="bodysales"></tbody>
      <tfoot id="bodysalesfoot">

      </tfoot>
         </table>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
      </div>


    <div id="infodeli" class="modal">
        <div class="modal-content">
              <div class="row">
                <div class="col s12 m12 l12 center-align">


                  <img src="" id="imguserd" name="imguserd" style="width: 150px; height: 150px;"><br>
                  <h5 id="nameuserd"></h5>
                  <h6 id="">Hola yo sere el encargado de llevar tu paquete</h6>
                  <h6 id="contactuserd"></h6>
                  <h6 id="emailuserd"></h6>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
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
      <script src="<?php echo SERVERURLB; ?>mystore/js/delivery.js">></script>
      <script>
      	$(document).ready(function(){

			 $('.dropdown-trigger').dropdown({constrainWidth: false});
			  $('.sidenav').sidenav();
        $('.modal').modal();

		  });
      </script>
 <?php include 'footer.php'; ?>