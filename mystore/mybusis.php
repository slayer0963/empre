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

		<div class="row animated center-align hide" id="business">
      <img src="../view/images/logo.jpg" width="155px" height="120px">
			<div class="col s12 m12 l12">
				<div class="">
					<div class="row center-align" id="containerbusi">
						<?php 
							$c = conectar();
							


                $query= "select count(*) nbus from business b inner join users u on b.id_user=u.id_user where u.id_user=".$_SESSION["idus"].";";
                  $c->set_charset('utf8');
                  $result = $c->query($query);
                  $resp = $result->fetch_array();


								$number=$resp["nbus"];
								if($number==0){
									$vacio=1;
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
	   									   <img class="activator" src="<?php echo SERVERURL.'imgbusiness/'.$re['pic_logo_bus'] ?>" style="height: 170px; width: 100%;">
	   									 </div>
	   									 <div class="card-content">
	   									   <span class="card-title activator grey-text text-darken-4"><?php echo $re['name_bus']; ?><i class="material-icons right">more_vert</i></span>
	   									   <p><a href="#" class="btn" onclick="mybusii(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\''; ?>);">Ver negocio</a>&nbsp;<a class="btn yellow modal-trigger hide editbusi" href="#editbusi" onclick="fillboxbusi(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\',\''.$re['pic_logo_bus'].'\',\''.$re['description'].'\''; ?>)" ><i class="material-icons ">edit</i></a></p>


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
			<div class="fixed-action-btn">
								  <a class="btn-floating btn red" id="addbusiness" href="#">
								    <i class="large material-icons">format_quote</i>
								  </a>
								  <ul>
                    <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="Salir" href="#!" onclick="salirempre();" ><i class="material-icons">close</i></a></li>
								    <li><a class="btn-floating yellow tooltipped" data-position="left" data-tooltip="Modo edici&oacute;n" href="#!" id="btnmedit"><i class="material-icons">mode_edit</i></a></li>
								    <li><a class="btn-floating blue modal-trigger tooltipped" data-position="left" data-tooltip="Agregar negocio" href="#addbusi"><i class="material-icons">add</i></a></li>
								  </ul>
								</div>
		</div>


  <div class="tap-target green" data-target="addbusiness">
    <div class="tap-target-content">
      <h5>Aviso</h5>
      <p><?php echo $_SESSION['name']; ?>, aquí podrás encontrar las opciones de "agregar" negocios y de entrar a "modo edición" para editarlos.</p>
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

            <div class="input-field col s12 m12 s12">
            <textarea id="descrip" name="descrip" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="150"></textarea>
            <label for="descrip">Descripci&oacute;n</label>
            <span class="" id="txtdescrip"></span>
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
			<div class="input-field col s12 m12 s12">
            <textarea id="descripe" name="descripe" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="150"></textarea>
            <span class="" id="txtdescripe">Descripci&oacute;n</span>
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
      <script src="<?php echo SERVERURLB; ?>mystore/js/mybusis.js">></script>
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



		  });
      </script>
 <?php include 'footer.php'; ?>