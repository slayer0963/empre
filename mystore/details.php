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
		  	<nav class="teal "  >
		    <div class="nav-wrapper">
		    	<a class=" left valign-wrapper animated  heartBeat slower" style="font-family: 'Shadows Into Light', cursive; margin-left: 3rem; font-size: 25px;" id="namebusi"></a>
		    	<!-- <a class="dropdown-trigger brand-logo center valign-wrapper " id="businame">asdasdsdad</a> -->
		    	<a class="dropdown-trigger brand-logo right valign-wrapper " href="#!" data-target="dropdown1">
				
		      	<div class="chip transparent" id="profile" style="color:white;">
			    <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
				    <?php echo $_SESSION['name']; ?>
				  </div>
	

		        </a>
		      <ul id="dropdown1" class="dropdown-content  center-align " >
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














		  <div class="row hide left-align animated bounceInDown" id="datospro">
					 <br>
			
					  <div class="col s12 m12 l8 offset-l2 center-align">
					    <a id="backfrm" class="btn-floating blue darken-4 hide"><i class="material-icons">keyboard_arrow_up</i></a><br>
					    <div class="card-panel animated" id="llenado">
					    	       <h6 id="nombredtp"></h6><div id="printbutton"></div>

					       <input type="hidden" id="idprod" name="idprod">
					        <div class="row">
					        	<div class="col s10 m10 l8 offset-l2">
					        		<select  class="select2 browser-default " id="colora" multiple name="color[]" title="Seleccionar Colores (*)" onchange="changeSelect1(event)"> </select><br><span class="" id="txtuser">Seleccionar Colores</span>
					        	</div>
					        	<div class="col l1 m1 s1"><button class="btn modal-trigger blue darken-3" href="#frmaddcolor"><i class="material-icons">note_add</i></button></div>
					        	
					        </div>
					        
						<div class="row">
							<div class="col s10 m10 l8 offset-l2">
					        <select  class="select2 browser-default" id="matera" multiple name="mater[]" title="Seleccionar Material (*)" onchange=" changeSelect2(event)">

					        </select><br><span class="" id="txtuser">Seleccionar Material</span>
					    </div>
					       <div class="col l1 m1 s1"><button class="btn modal-trigger blue darken-3" href="#frmaddmaterial"><i class="material-icons">note_add</i></button>
					       </div>
					   </div>
					        
					        <div class="row">
					    <div class="col s10 m10 l8 offset-l2">
					        <select  class="select2 browser-default" id="sizea" multiple name="size[]" title="Seleccionar Talla (*)" onchange=" changeSelect3(event)">
					        </select><br><span class="" id="txtuser">Seleccionar Tallas</span>
					    </div>
					        	<div class="col l1 m1 s1"><button class="btn modal-trigger blue darken-3" href="#frmaddsize"><i class="material-icons">note_add</i></button></div></div>
					        
					        <br>
					        <br>
					        <button  id="generar" class=" btn">Generar <i class="material-icons">cached</i></button>
					      </div>
					  </div>

					  <div id="frmaddcolor" class="modal addfrm ">
					    <div class="modal-content">
					      <form class="col s12 center-align" id="formcolor" name="formcolor" method="post">
					      	<h4>Agregar color</h4>
					        <div class="row">
					           <div class="input-field col s12">
					           <input type="color" name="pcolor" id="pcolor"><input type="hidden" name="txtcode" title="Selecciona un color (*)" id="txtcode">
					            <span class="" id="txtcodeerror">Selecciona un color</span>
					          </div>
					          <div class="input-field col s12">
					            <input type="text" name="txtcolor" title="Nombre (*)" id="txtcolor">
					            <label for="txtcolor">Color</label>
					            <span class="" id="txtcolorerror"></span>
					          </div>
					        <div class="input-field col s12">
					        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
					    </div>
					        </div>
					      </form>
					    </div>
					    <div class="modal-footer">
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
					    </div>
					  </div>

					  <div id="frmaddmaterial" class="modal addfrmat animated fadeInRight">
					    <div class="modal-content">
					    	<h4>Agregar material</h4>
					       <form class="col s12 center-align" id="formmaterial" name="formmaterial" method="post">
					        <div class="row">
					          <div class="input-field col s12">
					            <input type="text" name="txtname" title="Nombre (*)" id="txtnamemat">
					            <label for="txtname">Nombre</label>
					            <span class="" id="txtnamematerror"></span>
					          </div>
					        </div>
					        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
					      </form>
					    </div>
					    <div class="modal-footer">
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
					    </div>
					  </div>

					  <div id="frmaddsize" class="modal addfrm animated fadeInRight">
					    <div class="modal-content">
					      <form class="col s12 center-align" id="formsize" name="formsize" method="post">
					      	<h4>Agregar tamaños</h4>
					        <div class="row">
					           <div class="input-field col s12">
					            <input type="text" name="txtnumber" title="Número (*)" id="txtnumber">
					            <label for="txtnumber">Número</label>
					            <span class="" id="txtnumbererror"></span>
					          </div>
					          <div class="input-field col s12">
					            <input type="text" name="txtname" title="Nombre (*)" id="txtnamesize">
					            <label for="txtname">Nombre</label>
					            <span class="" id="txtnamesizeerror"></span>
					          </div>
					        </div>
					        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
					      </form>
					    </div>
					    <div class="modal-footer">
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
					    </div>
					  </div>

					  <div class="container">
					    <div class="card-panel animated hide" id="tablage">
					     
					      <div class="row">
					      	<div class="col s12 m12 l12">
					      		<center>
					      <table id="tbgen" class="table table-striped table-bordered table-hover text-center" cellspacing="0" width="80%">
					        <thead>
					            <tr>
					                <th>Color</th>
					                <th>Material</th>
					                <th>Talla</th>
					                <th>Acción</th>
					            </tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th>Color</th>
					                <th>Material</th>
					                <th>Talla</th>
					                <th>Acción</th>
					            </tr>
					        </tfoot>
					      </table>
					      </center>
					      <!-- tabla de DAT -->
					      
					    </div>
					      </div>
					    </div>
					  </div>
					</div>











		<div id="modaladdproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center">
    <h4 for="name" id="namepres"></h4>

      <form class="col s12 m12 l12 center-align" id="frmpricesa" name="frmpricesa" method="post">
        <div class="row">
            <input type="hidden" id="idpres" name="idpres">
            <input type="hidden" id="colorpre" name="colorpre">
            <input type="hidden" id="matpre" name="matpre">
            <input type="hidden" id="sizepre" name="sizepre">
            <div class="col s12 m6 l6">
              <div id="viewpic">
                <img src="../view/images/empty.jpg" style="height: 200px; width: 220px;" class="circle responsive-img" id="img" name="img">
              </div>
            <div class="file-field input-field">
            <div class="btn">
                <span>PRODUCTO</span>
                <input type="file" id="fileprice" name="fileprice">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="fname" name="fname" title="Imagen (*)" type="text">
            </div>
            <span class="" id="txtfname"></span>
            </div>
            </div>
            <div class="col s12 m6 l6">
            <div class="input-field col s12 m12 l12">
              <input id="quantity" name="quantity" title="Cantidad (*)" type="number" min=0 oninput="validity.valid||(value='');">
              <label for="quantity" id="">Cantidad</label>
              <span class="" id="txtquantity"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pextra" name="pextra"  type="text" value="0.00">
              <label for="pextra" id="">Costo agregado</label>
              <span class="" id="txtpextra"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input type="range" list="marks" id="discount" name="discount">
              <datalist id="marks">
                <option value="0" label="0%">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50" label="50%">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100" label="100%">
              </datalist>
              <label for="discount" id=""></label>
              <span class="" id="txtdiscount">Descuento (%)</span>
            </div>
            </div>
         </div>
        <button  id="addpricesa" class=" btn">Agregar <i class="material-icons">add</i></button>
      </form>
      
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>



<div id="tablaviewcombi" class="modal">
    <div class="modal-content">
      <table id="tgen" class="table table-striped table-bordered table-hover text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Imagen</th>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </tfoot>
      </table>
    </div>
   
  </div>




  <div id="modalaeditproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center">
    <h4 for="name" id="namepres"> EDITAR COMBINACIÓN</h4>

      <form class="col s12 m12 l12 center-align" id="frmpricese" name="frmpricese" method="post">
        <div class="row">
            <input type="hidden" id="id_pricese" name="id_pricese">
            <input type="hidden" id="id_colore" name="id_colore">
            <input type="hidden" id="id_materiale" name="id_materiale">
            <input type="hidden" id="id_sizee" name="id_sizee">
            <div class="col s12 m6 l6">
              <div id="viewpice">
                <img src="../view/images/empty.jpg" style="height: 200px; width: 220px;" class="circle responsive-img" id="imge" name="imge">
              </div>
            <div class="file-field input-field">
            <div class="btn">
                <span>PRODUCTO</span>
                <input type="file" id="filepricee" name="filepricee">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="fnamee" name="fnamee" title="Imagen (*)" type="text">
            </div>
              <span class="" id="txtfnamee"></span>
            </div>
            </div>
            <div class="col s12 m6 l6">
            <div class="input-field col s12 m12 l12">
              <input id="quantitye" name="quantitye" title="Cantidad (*)" type="number" min=0 oninput="validity.valid||(value='');">
              <span class="" id="txtquantitye">Cantidad</span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pextrae" name="pextrae" title="Precio Extra (*)" type="text" >
              
              <span class="" id="txtpextrae">Costo agregado</span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input type="range" list="markse" id="discounte" name="discounte">
              <datalist id="markse">
                <option value="0" label="0%">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50" label="50%">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100" label="100%">
              </datalist>
              <span class="" id="txtdiscounte">Descuento (%)</span>
            </div>
            </div>
         </div>
        <button  id="editpricesa" class=" btn">Modificar <i class="material-icons">edit</i></button>
      </form>
  </div>
</div>





  <div id="modaledit" class="modal bottom-sheet ">
  <div class="modal-content align-center">
    <h4 for="name" id="nameproduct"> </h4>

      <form class="col s12 m12 l6 center-align" id="frmeditpr" name="frmeditpr">
        
            
            
            <div class="input-field col s12 m12 l6">
              <input id="pcompra" name="pcompra" title="Coste de fabricación (*)" type="text" > 
              <span class="" id="txtpcompra">Coste de fabricación</span>
            </div>
            <div class="input-field col s12 m12 l6">
              <input id="pventa" name="pventa" title="Precio Venta (*)" type="text" >
              <span class="" id="txtpventa">Precio Venta</span>
            </div>
            
            
         
        <button  id="editprod" class=" btn">Modificar <i class="material-icons">edit</i></button>
      </form>
  </div>
</div>


		<div class=" animated zoomIn" id="details">
			
			<div class="col s12 m12 l12 center-align" style="margin-top: 0px;">
					<h3 class="green-text darken-4" style="font-family: 'Shadows Into Light', cursive;" id="nameprode"></h3>

					<input type="hidden" id="id_product">
					<input type="hidden" id="idcolor">
					<input type="hidden" id="idmat">
					<input type="hidden" id="idsiz">
					<input type="hidden" id="name_product">
			</div>
			<div class="container" style="background-color: white ">
				<div class="row">
					<div class="col s12 m4 l6 center-align">
						<div style="padding-top: 10px;"><b>COMBINACIONES</b>&nbsp;<button id="addcombi" class="btn btn-success"><i class="material-icons">add</i></button></div>
						<ul class="collapsible ">
					    <li class="active">
					      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Color</div>
					      <div class="collapsible-header" id="ccolorsp"></div>
					    </li>
					    <li>
					      <div class="collapsible-header"><i class="material-icons">place</i>Material</div>
					      <div class="collapsible-header" id="cmaterialsp"></div>
					    </li>
					    <li>
					      <div class="collapsible-header"><i class="material-icons">whatshot</i>Talla</div>
					      <div class="collapsible-header" id="csizesp"></div>
					    </li><b>
					  
						
						<div class="collection">
					    <a href="#!" class="collection-item"><span class="badge" id="quantitydeta">1</span><b>Cantidad</b></a>
					    <a href="#!" class="collection-item"><span class="badge" id="pricedeta">1</span><b>Precio</b></a>
					    <a href="#!" class="collection-item"><span class="badge" id="discodeta">1</span><b>Descuento</b></a>
					    </div>
					</div>
					    <div class="col s12 m4 l6 " id="imgpro" style="text-align: center;"></div>
					</ul>

						
					
					
				</div>
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
      <script src="<?php echo SERVERURLB; ?>mystore/js/details.js">></script>
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
  <script>