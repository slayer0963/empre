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
	  		margin-top: 8rem;
	  	}
		#details{
			margin-top: 3rem;
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
	  </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
	<body class="grey darken-4">
		 <div class="container">
		  	<nav class="transparent">
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo right valign-wrapper">
		      	<div class="chip" id="profile">
			    <img src="https://hardzone.es/app/uploads-hardzone.es/2020/04/PS5.jpg" alt="Contact Person">
				    Jane Doe
				  </div>
		      </a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="sass.html">Sass</a></li>
		        <li><a href="badges.html">Components</a></li>
		        <li><a href="collapsible.html">JavaScript</a></li>
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
								<a onclick="mybusii(<?php echo $re['id_bus']; ?>);" class="col s4 m3 l3 center-align animated slideInDown ">
									<div class="cardss ">
									<div class=" transparent">
										 <img class="activator responsive-img" src="<?php echo SERVERURL.'imgbusiness/'.$re['pic_logo_bus'] ?>" style="height: 100px; width: 145px;">
							    	</div>
							    
								    <h6 id="namesbusi" class="card-title activator white-text text-darken-4"><?php echo $re['name_bus']; ?></h6>
									</div>
								</a>
								<?php 
								}
								?>
								<div class="col s4 m3 l3 left-align animated slideInDown">
									<a class="btn-floating  btn-large waves-effect waves-light black"><i class="material-icons green">add</i></a>
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
					<div class="row" id="contentpro">
						 <div class="row">
						    <div class="col s12 m4 l3 ">
						      <div class="card ">
						        <div class="card-image">
						          <img src="https://depor.com/resizer/mTP6b2Eamu7HEBdEhWApsU5O7pk=/980x528/smart/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/WMAQNLC52BBTJILOUBB6LMD24E.jpg">
						      
						          <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="details(1);"><i class="material-icons">edit</i></a>
						        </div>
						        <div class="card-content">
						          <p>Name</p>
						        </div>
						      </div>
						    </div>
						  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="container animated hide" id="details">
			<div class="row">
					<div class="col s12 m4 l3 center-align">
						COLORES <br>
						MATERIALES <br>
						TALLAS
					</div>
					<div class="col s12 m4 l6 center-align">

						<img src="https://depor.com/resizer/mTP6b2Eamu7HEBdEhWApsU5O7pk=/980x528/smart/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/WMAQNLC52BBTJILOUBB6LMD24E.jpg" class="responsive-img" style="height: 250px; width: 100%;">
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