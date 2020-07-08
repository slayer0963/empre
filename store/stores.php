<html>

  <?php
  	// session_start();
    include '../php/config.php';
    // include_once "../cn/connection.php";
   ?>
    <head>
    	<title id="title"></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURL; ?>css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/animate.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/lightbox.css">

	  <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/select2-materialize.css">



      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
	<body class="">
		<div class="">
			<nav class="teal">
			    <div class="nav-wrapper ">
			      <a href="#!" class="brand-logo center-align" id="namebusi" style="margin-left: 1rem;"></a>
			      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			    <!--     <li><a href="sass.html">Sass</a></li>
			        <li><a href="badges.html">Components</a></li> -->
			        <li class="center-align"><a class="modal-trigger" href="#modallogin">Inciar sesion</a></li>
			        <li class="center-align"><a href="#!">Registrarse</a></li>
			      </ul>
			    </div>
			  </nav>

			  <ul class="sidenav" id="mobile-demo" style="margin-top: 4rem; width: 100%;">
			    <!-- <li><a href="sass.html">Sass</a></li>
			    <li><a href="badges.html">Components</a></li> -->
			    <li class="center-align"><a class="modal-trigger" href="#modallogin">Inciar sesion</a></li>
			    <li class="center-align"><a href="#!">Registrarse</a></li>
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="<?php echo SERVERURLB; ?>mystore/js/mybusi.js">></script>
      <script>
      	$(document).ready(function(){
		    $('.sidenav').sidenav();
		    
			$('.modal').modal();
			 
			 
			 $('.fixed-action-btn').floatingActionButton({
			    direction: 'top',
      			hoverEnabled: false
			  });
			 $('.collapsible').collapsible();
			 $('#descrip').characterCounter();
			 $(".dropdown-trigger").dropdown();
			 var obj = JSON.parse(localStorage.getItem('Store'));
			 //alert(obj.name);
			 $("#namebusi").html("<strong>"+obj.name+"</strong>")
			 $("#title").html(obj.name);

		  

		  });
      </script>
  <script>