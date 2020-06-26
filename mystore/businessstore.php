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
	  	#business{
	  		margin-top: 13rem;
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
			margin-top: 2rem;
		}
	  </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
	<body class="grey darken-4">

		 <div class="container hide" id="contenidomenu">
		  	<nav class="transparent "  >
		    <div class="nav-wrapper">
		    	<a class="dropdown-trigger brand-logo right valign-wrapper " href="#!" data-target="dropdown1">
				
		      	<div class="chip transparent" id="profile" style="color:white;">
			    <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
				    <?php echo $_SESSION['name']; ?>
				  </div>
	

		        </a>
		      <ul id="dropdown1" class="dropdown-content grey darken-4">
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
		  <br>
		<div class="row animated" id="business">
			<div class="col s12 m12 l12">
				<div class="container">
					<div class="row center-align">
						<?php 
							$c = conectar();
							$sentencia = $c->prepare("select count(*) nbus from business b inner join users u on b.id_user=u.id_user where u.email_user='".$_SESSION["email"]."';");
								$sentencia->execute();
								$resultado = $sentencia->get_result();
								$resp = $resultado->fetch_assoc();
								$number=$resp["nbus"];
								if($number==0){
									?>
									<a class="btn-floating btn-large waves-effect waves-light black"><i class="material-icons green">add</i></a>
									<?php
								}
								else{
									$sql="select * from business b inner join users u on b.id_user=u.id_user where u.email_user='".$_SESSION["email"]."';";
							$c->set_charset('utf8');
							$res = $c->query($sql);	
							$arreglo = array();
							while($re = $res->fetch_array()){

								?>
								<a onclick="mybusii(<?php echo $re['id_bus']; ?>);" class="col s12 m6 l4 center-align animated slideInDown ">
									<div class="cardss ">
									<div class=" transparent">
										 <img class="activator responsive-img" src="<?php echo SERVERURL.'imgbusiness/'.$re['pic_logo_bus'] ?>" style="height: 150px; width: 100%;">
							    	</div>
							    
								    <h6 id="namesbusi" class="card-title activator white-text text-darken-4"><?php echo $re['name_bus']; ?></h6>
									</div>
								</a>
								<?php 
								}
								?>
								<div class="col s12 m6 l4 center-align animated slideInDown ">
									<a class="btn-floating  btn-large waves-effect waves-light black" style="margin-top: 3rem;"><i class="material-icons green">add</i></a>
								</div>
								
							<?php 
							}
					?>	
					</div>
				</div>
			</div>
		</div>
		<div class="row animated hide" id="products">

		 
			<div class="col s12 m12 l12">
				<div class="container ">
					<a id="backe" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br>
					<div class="row" id="contentpro">
						
					</div>
				</div>
			</div>
		</div>

		<div class="row animated hide" id="menu">
			<div class="col s12 m12 l12">
				<div class="container ">
					<a id="back" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br><br>
					<div class="row" id="contentmenu">
						<div class="col s12 m4 l4 center-align men"><button class="btn" id="viewsta">Estadisticas</button></div>
						<div class="col s12 m4 l4 center-align men"><button class="btn" id="viewpro">Productos</button></div>
						<div class="col s12 m4 l4 center-align men"><button class="btn">Pedidos</button></div>
					</div>
				</div>
			</div>
		</div>




		<div class="row animated hide" id="stadis">

		 
			<div class="col s12 m12 l12">
				<div class="container ">
					<a id="backes" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br>
					<div class="row" id="contentsta">
						SOY LAS ESTADISTICAS
					</div>
				</div>
			</div>
		</div>


		<div class="container animated hide" id="details">
			<a id="backd" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br><br>
			<div class="row">
					<div class="col s12 m4 l3 center-align">
						COLORES <br>
						MATERIALES <br>
						TALLAS
					</div>
					<div class="col s12 m4 l6 center-align" id="imgpro">

						
					</div>
					<div class="col s12 m4 l3 center-align">
						Precio <br>
						Cantidad

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
      <script src="<?php echo SERVERURLB; ?>mystore/js/mybusi.js">></script>
      <script>
      	$(document).ready(function(){
		    $('.sidenav').sidenav();
		    $(".dropdown-trigger").dropdown();

		  });
      </script>
  <script>