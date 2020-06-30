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
 			@media only screen and (max-width : 992px) {
            .businessmodal { padding: 0; width: 100% !important ; height: 84% !important ; max-height: 85%;}
            
          }
	  </style>

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
	<body class="grey darken-4">

		 <div class=" hide" id="contenidomenu">
		  	<nav class="transparent "  >
		    <div class="nav-wrapper">
		    	<a class="dropdown-trigger brand-logo left valign-wrapper" style="font-family: 'Shadows Into Light', cursive; margin-left: 3rem;" id="namebusi">LARIBE</a>
		    	<!-- <a class="dropdown-trigger brand-logo center valign-wrapper " id="businame">asdasdsdad</a> -->
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
		<div class="row animated center-align" id="business">
			<h2 class=" green-text darken-4"  style="font-family: 'Shadows Into Light', cursive;">LARIBE</h2>
			<div class="col s12 m12 l12">
				<div class="">
					<div class="row center-align" id="containerbusi">
						<?php 
							$c = conectar();
							$sentencia = $c->prepare("select count(*) nbus from business b inner join users u on b.id_user=u.id_user where u.id_user=".$_SESSION["idus"].";");
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
									$sql="select * from business b inner join users u on b.id_user=u.id_user where u.id_user=".$_SESSION["idus"].";";
							$c->set_charset('utf8');
							$res = $c->query($sql);	
							$arreglo = array();
							while($re = $res->fetch_array()){

								?>
								<div  class="col s12 m6 l3 center-align animated slideInDown ">
									<div class="card">
	   									 <div class="card-image waves-effect waves-block waves-light">
	   									   <img class="activator" src="<?php echo SERVERURL.'imgbusiness/'.$re['pic_logo_bus'] ?>" style="height: 150px; width: 100%;">
	   									 </div>
	   									 <div class="card-content">
	   									   <span class="card-title activator grey-text text-darken-4"><?php echo $re['name_bus']; ?><i class="material-icons right">more_vert</i></span>
	   									   <p><a href="#" class="btn" onclick="mybusii(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\''; ?>);">Ver negocio</a>&nbsp;<a class="btn yellow modal-trigger hide editbusi" href="#editbusi" onclick="fillboxbusi(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\',\''.$re['pic_logo_bus'].'\''; ?>)" ><i class="material-icons ">edit</i></a></p>


	    									</div>
	   									 <div class="card-reveal">
	      									<span class="card-title grey-text text-darken-4"><?php echo $re['name_bus']; ?><i class="material-icons right">close</i></span>
	      									<div class="collection">
	      									<p><a href="#!" class="collection-item"><span class="new badge blue">4</span>Pedidos</a></p>
	      									</div>
	    									</div>
	  									</div>
								</div>
								<?php 
								}
								?>
								<div class="col s12 m6 l4 center-align animated slideInDown ">
									
								</div>
								

							<?php 
							}
					?>	
					</div>
				</div>
			</div>
		</div>


<!-- modal add busi -->

 <div id="addbusi" class="modal animated slideInRight grey darken-4 businessmodal" style="color:white;">
        <div class="modal-content">
      <h4>Negocio</h4>
      <div class="row">
      <form class="col s12 center-align" id="formbusi" name="formbusi" method="post">
        <div class="row">
           <div class="input-fiel col s12">

             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://png.pngtree.com/png-vector/20190223/ourmid/pngtree-vector-camera-icon-png-image_696326.jpg" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>

            <div class="file-field input-field col s12">
              <div class="btn green">
                <span>Logo de empresa</span>
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen (*)" id="img"  type="text">
              </div>
            </div>
            <span class="" id="txtimg"></span>
            </div>

            <div class="input-field col s12 m12 l12">
              <input type="text" name="name" title="Nombre (*)" id="name">
              <label for="name">Nombre del negocio</label>
              <span class="" id="txtname"></span>
            </div>

            <div class="input-field hide col s12 m12 l12">
              <input type="hidden" name="user" id="user" value="<?php  echo $_SESSION["idus"];?>">
            </div>
      
        </div>
        <button type="submit" class=" btn green">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
          <div class="modal-footer grey darken-4">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
  </div>



 <div id="editbusi" class="modal animated slideInLeft grey darken-4 businessmodal" style="color:white;">
        <div class="modal-content">
      <h4>Negocio</h4>
      <div class="row">
      <form class="col s12 center-align" id="formbusie" name="formbusie" method="post">
        <div class="row">
           <div class="input-fiel col s12">
			
             <div class="col s12 align-center">
              <div id="vista-previae">
                 <img src="https://png.pngtree.com/png-vector/20190223/ourmid/pngtree-vector-camera-icon-png-image_696326.jpg" style="height: 150px; width: 150px;" id="imgcontainere" alt="" class="responsive-img">
              </div>
            </div>
            <br>

            <div class="file-field input-field col s12">
              <div class="btn green">
                <span>Logo de empresa</span>
                <input type="file" id="filee" name="filee">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Imagen (*)" id="imge"  type="text">
              </div>
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="input-field col s12 m12 l12">
              <input type="text" name="namee" title="Nombre (*)" id="namee">
              
              <span class="" id="txtnamee">Nombre del negocio</span>
            </div>

            <div class="input-field hide col s12 m12 l12">
            	<input type="hidden" name="idbue" id="idbue">
              <input type="hidden" name="usere" id="usere" value="<?php  echo $_SESSION["idus"];?>">
            </div>
      
        </div>
        <button type="submit" class=" btn yellow darken-3">Modificar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
          <div class="modal-footer grey darken-4">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
  </div>
<!--  -->

		<div class="row animated hide" id="products">

		 
			<div class="col s12 m12 l12">
				<div class="container ">
					<a id="backe" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br>
					<div class="row center-align" id="contentpro">
						
					</div>
				</div>
			</div>
		</div>

		<div class="row animated hide" id="menu">
			<div class="col s12 m12 l12">
				<div class="container ">
					<a id="back" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br><br>
					<div class="row align-center" id="contentmenu">
						
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
		<div class="fixed-action-btn">
								  <a class="btn-floating btn red" href="#">
								    <i class="large material-icons">format_quote</i>
								  </a>
								  <ul>
								    <li><a class="btn-floating yellow" href="#" id="btnmedit"><i class="material-icons">mode_edit</i></a></li>
								    <li><a class="btn-floating blue modal-trigger" href="#addbusi"><i class="material-icons">add</i></a></li>
								  </ul>
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
		    
			$('.modal').modal();
			 
			 
			 $('.fixed-action-btn').floatingActionButton({
			    direction: 'top',
      			hoverEnabled: false
			  });

			 $(".dropdown-trigger").dropdown();



		  });
      </script>
  <script>