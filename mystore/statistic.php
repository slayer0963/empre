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

      #salesdate { margin-top:-3rem; padding: 0; width: 75% !important ; height: 100% !important ;  max-height: 90%;}
      @media only screen and (max-width : 992px) {
            #salesdate { margin-top:-3rem; padding: 0; width: 100% !important ; height: 90% !important ; max-height: 95%;}
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

		<div class="row animated slideInDown center-align" style="margin-top: 1rem;">
      <div class="container">
      <div class="row">
      <div class="col s12 m12 l12">
        <a class="waves-effect waves-light btn modal-trigger" href="#salesdate">Ver fechas</a>
        
      </div>
        <div class="col s12 m12 l6 ">
          Ganancias por dia
            <div class="" id="chart1"></div>
        </div>
        <div class="col s12 m12 l6 ">
          Ventas por dia
            <div class="" id="chart2"></div>
        </div>
        <div class="col s12 m12 l6 ">
          Ganancias totales
            <div class="" id="chart3"></div>
        </div>
        <div class="col s12 m12 l6 ">
          Ventas totales
            <div class="" id="chart4"></div>
        </div>
  

      <div class="col s12 m12 l10 offset-l1 ">
         <table id="tbproduct" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
           <thead >
        <tr>
          <th class="text-center"data-priority="1">Imagen</th>
          <th class="text-center">Detalles</th>
          <th class="text-center"data-priority="2">Cantidad</th>
          <th class="text-center"data-priority="">Cantidad</th>
          <th class="text-center"  data-priority="3">Acciones</th>
        </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
        <tr>
          <th class="text-center" data-priority="1">Imagen</th>
          <th class="text-center">Detalles</th>
          <th class="text-center" data-priority="2">Cantidad</th>
          <th class="text-center"data-priority="">Cantidad</th>
          <th class="text-center"  data-priority="3">Acciones</th>
        </tr>
      </tfoot>
         </table>
        </div>
    </div>
</div>
</div>
<div id="salesdate" class="modal">
        <div class="modal-content">
          <h4>Ventas realizadas</h4>
          <table id="tbsalesdate" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
           <thead >
        <tr>
          <th class="text-center"data-priority="1">Cliente</th>
          <th class="text-center"data-priority="4">Total</th>
          <th class="text-center"data-priority="2">Fecha</th>
          <th class="text-center"  data-priority="3">Acciones</th>
        </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
        <tr><th class="text-center"data-priority="1">Cliente</th>
          <th class="text-center" data-priority="4">Total</th>
          <th class="text-center"data-priority="2">Fecha</th>
          <th class="text-center"  data-priority="3">Acciones</th>
        </tr>
      </tfoot>
         </table>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
      </div>




    </body>
  </html>



  		
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
      <script src="<?php echo SERVERURLB; ?>mystore/js/menu.js">></script>

      <script>
      	$(document).ready(function(){

			 $('.dropdown-trigger').dropdown({constrainWidth: false});
			  $('.sidenav').sidenav();
        $('.modal').modal();

		  });
      </script>
 <?php include 'footer.php'; ?>
 <script src="<?php echo SERVERURLB; ?>mystore/js/stadis.js">></script>