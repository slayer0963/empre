		  	
<style type="text/css">
        #profiled { padding: 0; margin-top:-2rem; width: 50% !important ; height: 100% !important ;  max-height: 85%;}


        @media only screen and (max-width : 992px) {
            #profiled { width: 100% !important ;  height: 100% !important ;  max-height: 85%;}
           
        }
</style>



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
				<li ><a href="#!" onclick="mybusii(<?php echo $re['id_bus'].',\''.$re['name_bus'].'\''; ?>);">
				<div class="row">
					<div class="col s6 m6 l6 valign-wrapper"><span><?php echo $re['name_bus'] ?></span></div>
				</div>	
				</a></li>
			
		      	<?php 
							}
				?>
				<li class="divider"></li>
			  <li><a class="modal-trigger" href="#profiled" onclick="fillboxprofile(<?php echo $_SESSION['idus']; ?>);">Perfil</a></li>
			  <li class="divider"></li>
			  <li><a href="#!" onclick="salirempre();">Salir</a></li>
			</ul>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li></li>
		      </ul>
		    </div>
		  </nav>