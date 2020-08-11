<html>

  <?php

    include '../php/config.php';
    include_once "../cn/connection.php";
    $vacio=0;
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
	  	#business{
	  		margin-top: 1rem;
	  	}
		#details{
			/*margin-top: 3rem;*/
		}
	  	#namesbusi{
	  		text-transform: lowercase;
			background: linear-gradient(to top, #788787 0%, #d1d1d1 100%);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
	  	}
	  	#profile{
		margin-top: 1rem;
	  	}
		.men{
			margin-top: 1rem;

		}
		.card{
			/*-webkit-box-shadow: -7px -7px 5px 0px rgba(43,99,45,0.49);
			-moz-box-shadow: -7px -7px 5px 0px rgba(43,99,45,0.49);
			box-shadow: -7px -7px 5px 0px rgba(43,99,45,0.49);*/

		}

		 .businessmodal { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
		 .addpro { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
		 .addfrm { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 55%;}
		 .addfrmat { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 45%;}
 			@media only screen and (max-width : 992px) {
            .businessmodal { padding: 0; width: 100% !important ; height: 84% !important ; max-height: 85%;}
            .addpro { padding: 0; width: 100% !important ; height: 84% !important ; max-height: 85%;}
            .addfrm { padding: 0; width: 100% !important ; height: 84% !important ; max-height: 50%;}
            .addfrmat { padding: 0; width: 100% !important ; height: 84% !important ; max-height: 40%;}
          }
	  </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>

      </style>
  </head>
	<body class="valign-wrapper">
		<div class="row  center-align hide" id="text">
			<div class="container justify-text ">
				<h3 class="black-text animated  bounceIn " id="texto">Hola, bienvenido <?php echo $_SESSION['name']; ?>, aquí podrás ver estadisticas, tus negocios y productos.</h3>
				<div class="preloader-wrapper big active">
			    <div class="spinner-layer spinner-green-only">
			      <div class="circle-clipper left">
			        <div class="circle"></div>
			      </div><div class="gap-patch">
			        <div class="circle"></div>
			      </div><div class="circle-clipper right">
			        <div class="circle"></div>
			      </div>
			    </div>
			  </div>
			</div>
			
		</div>

		<div class="row animated center-align" id="business">
      <img src="../view/images/logo.jpg" width="155px" height="120px">
			<div class="col s12 m12 l12">
			     <h5 id="txtdispo">Pedidos Disponibles</h5>
					<div class="row" id="containerpedidos">
	
					</div>
          <h5 id="txtactive">Pedidos Activos</h5>
          <div class="row" id="containerpedidosproce">
  
          </div>

			</div>

		</div>

      <div class="fixed-action-btn">
                  <a class="btn-floating btn red" id="addbusiness" href="#">
                    <i class="large material-icons">format_quote</i>
                  </a>
                  <ul>
                    <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="Salir" href="#!" onclick="salirempre();" ><i class="material-icons">close</i></a></li>
                    
                  </ul>
                </div>
    </div>


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
      <script src="<?php echo SERVERURLB; ?>deliveries/js/delivery.js">></script>
      <script>
      	$(document).ready(function(){
		    $('.sidenav').sidenav();
		    
			$('.modal').modal();
			 
			if(localStorage.getItem('texto')!=1){
				localStorage.setItem('texto',1);
				$("#text").removeClass('hide'); 
			setInterval(function(){ $("#business").removeClass('hide');
			$("#text").addClass('hide'); }, 7000);	
			}
			else{
				 $("#business").removeClass('hide');
					
			}

			$('.tap-target').tapTarget();

			<?php if($vacio==1){ ?>
				$('.tap-target').tapTarget('open');
			<?php } ?>
			
			 $('.fixed-action-btn').floatingActionButton({
			    direction: 'top',
      			hoverEnabled: false
			  });
			 $('.collapsible').collapsible();
			 $('#descrip').characterCounter();
			 $(".dropdown-trigger").dropdown();
        $('.tooltipped').tooltip();


		  });
      </script>