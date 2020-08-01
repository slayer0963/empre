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
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Shadows+Into+Light&display=swap" rel="stylesheet">
 <style>
   .letrasboni{
    font-family: 'Patrick Hand', cursive;
    font-size: 18px;
   }
 </style>
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
      #stadisbyproduct{ margin-top:-3rem; padding: 0; width: 75% !important ; height: 100% !important ;  max-height: 90%;}
      #salesdate { margin-top:-3rem; padding: 0; width: 75% !important ; height: 100% !important ;  max-height: 90%;}
      @media only screen and (max-width : 992px) {
        #stadisbyproduct{ margin-top:-3rem; padding: 0; width: 100% !important ; height: 90% !important ; max-height: 95%;}
          
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
        <hr>
        Detalles por Producto
        <hr>
        <br>
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
      
        <div class="col s12 m12 l10 offset-l1 center-align">
          <hr>
          Comentarios
          <hr>


              <select  class="select2 browser-default" id="pro" name="pro" title="Productos (*)">
              </select>
        
          <br>
          <table id="tbcoment" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
               <thead >
            <tr>
              <th class="text-center"data-priority="1">Usuario</th>
              <th class="text-center"data-priority="4">Le gustaron</th>
              <th class="text-center"data-priority="2">Comentario</th>
              <th class="text-center"  data-priority="3">Acciones</th>
            </tr>
          </thead>
          <tbody></tbody>
          <tfoot>
            <tr><th class="text-center"data-priority="1">Usuario</th>
              <th class="text-center" data-priority="4">Le gustaron</th>
              <th class="text-center"data-priority="2">Comentario</th>
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


        <div id="salesdatesdetails" class="modal">
        <div class="modal-content">
          <h6 id="nameclide"></h6>
          <table id="tbdatesales" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
           <thead >
        <tr>
          <th class="text-center"data-priority="1">Producto</th>
          <th class="text-center"data-priority="4">Detalles</th>
          <th class="text-center"data-priority="2">Cantidad</th>
          <th class="text-center"  data-priority="3">Precio</th>
          <th class="text-center"  data-priority="3">Descuento</th>
          <th class="text-center"data-priority="4">Total</th>
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


      <div id="replycoment" class="modal">
        <div class="modal-content">
          <div class="card row">
            <br>
            <div id="nameclient" class="col s12 m12 l12 center-align"></div>
            <div class="col s12 m12 l12 center-align"><h6 id="comentper" class="letrasboni"></h6></div>
            <br>
          </div>

               <div class="row">
                <form class="col s12 center-align" name="frmconst" id="frmconst" method="POST">
                  <div class="row">
                    <input type="hidden" id="idprev" name="idprev">
                    <input type="hidden" id="idus" name="idus">
                    <div class="input-field col s12">
                      <textarea id="coment" title="Contestacion (*)" name="coment" class="materialize-textarea" data-length="200"></textarea>
                      <label id="txtcoment" for="coment">Contestación</label>
                    </div>
                  </div>
                  <input type="submit" class="btn" value="Responder">
                </form>
              </div>
          
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
      </div>


    <div id="stadisbyproduct" class="modal">
        <div class="modal-content">
          <h4>Ventas realizadas</h4>
          <div class="row">

          <div class="col s12 m12 l12 ">
              
              
              <div class="row">
                <div class="col s12 m4 l4">
                  <div class="card green darken-1">
                    <div class="card-content white-text center-align">
                      <span class="card-title" ><h4 id="profitpro">0</h4></span>
                    </div>
                    <div class="card-action white-text center-align">
                      Ganancias totales
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 l4">
                  <div class="card green darken-1">
                    <div class="card-content white-text center-align">
                      <span class="card-title" ><h4 id="salespro">0</h4></span>
                    </div>
                    <div class="card-action white-text center-align">
                      Ventas totales
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 l4">
                  <div class="card green darken-1">
                    <div class="card-content white-text center-align">
                      <span class="card-title" ><h4 id="rating">0</h4></span>
                    </div>
                    <div class="card-action white-text center-align">
                      Rating
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
          <div class="col s12 m12 l6 ">
              Ganancia por dia
            <div class="" id="chartpro2"></div>
            </div>
          
          <div class="col s12 m12 l6 ">
              Ventas por dia
            <div class="" id="chartpro1"></div>
            </div>
      

        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
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
        
            $('input#input_text, textarea#textarea2').characterCounter();
          
		  });
      </script>
 <?php include 'footer.php'; ?>
 <script src="<?php echo SERVERURLB; ?>mystore/js/stadis.js">></script>