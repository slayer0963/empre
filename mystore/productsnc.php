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
		#productnocombi{
			margin-top: 3rem;
		}
	  </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>

      </style>
  </head>
	<body class="grey darken-4 ">

		 <div class="" id="contenidomenu">
		  	<nav class="transparent "  >
		    <div class="nav-wrapper">
		    	<a class=" left valign-wrapper animated  heartBeat slower" style="font-family: 'Shadows Into Light', cursive; margin-left: 3rem; font-size: 25px;" id="namebusi"></a>
		    	<!-- <a class="dropdown-trigger brand-logo center valign-wrapper " id="businame">asdasdsdad</a> -->
		    	<a class="dropdown-trigger brand-logo right valign-wrapper " href="#!" data-target="dropdown1">
				
		      	<div class="chip transparent" id="profile" style="color:white;">
			    <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
				    <?php echo $_SESSION['name']; ?>
				  </div>
	

		        </a>
		      <ul id="dropdown1" class="dropdown-content grey darken-4 center-align " >
		      	<li class=""><a href="./">Mis Negocios</a></li>
		      	<li class="divider"></li>
		      	<?php
		      	$c = conectar();
					$sql="select * from business b inner join users u on b.id_user=u.id_user where u.id_user=".$_SESSION["idus"].";";
							$c->set_charset('utf8');
							$res = $c->query($sql);	
							$arreglo = array();
							while($re = $res->fetch_array()){
		      	 ?>
				<li ><a href="#!" onclick="mybusiis(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\''; ?>);">
				<div class="row">
					<div class="col s6 m6 l6 valign-wrapper"><span><?php echo $re['name_bus'] ?></span></div>
				</div>	
				</a></li>
			
		      	<?php 
							}
				?>
				<li class="divider"></li>
			  <li><a href="#!">Perfil</a></li>
			  <li class="divider"></li>
			  <li><a href="#!">Salir</a></li>
			</ul>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li></li>
		      </ul>
		    </div>
		  </nav>
		  </div>


	<div class="row left-align animated zoomIn" id="productnocombimen">
			
				
			<div class=""  id="productnocombi">
			
			</div>
		</div>


    </body>
  </html>

  <div class="tap-target green" data-target="menuadde">
    <div class="tap-target-content">
      <h5>Aviso</h5>
      <p>Aqui tendras las opciones de agregar productos y poder entrar en modo edicion para editarlos.</p>
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
      <script src="<?php echo SERVERURLB; ?>mystore/js/productnc.js">></script>
      <script>
      	$(document).ready(function(){

			$('.dropdown-trigger').dropdown({constrainWidth: false});
			$('.sidenav').sidenav();
			$('.tap-target').tapTarget();
			$('.fixed-action-btn').floatingActionButton({
			    direction: 'top',
      			hoverEnabled: false
			  });
		  });
      </script>
  <script>