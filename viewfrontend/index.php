

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>EMPRE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
 	<meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
     <style type="text/css">


    span.buttonText {

      padding-left: 42px;
      padding-right: 42px;
    
      
    }
  </style>
</head>

<body class="signup-page" >
	<nav class="navbar navbar-expand-lg bg-white navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<a class="navbar-brand" href="../presentation.html">EMPRE</a>
        	</div>
    	</div>
    </nav>


	<div class="page-header header-filter" filter-color="purple" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center; height: 75%; max-height: 75%;">
    	<div class="container">
			<div class="row">
    			<div class="col-md-5 col-md-offset-4">

					<div class="card card-signup">
                        <h2 class="card-title text-center">Iniciar Sesión</h2>
                        <div class="row">
                            <div class="col-md-12">
								<form class="form" method="" action="">
									<div class="card-content">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
											<input type="text" class="form-control" placeholder="Correo electronico ">
										</div>

										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
											<input type="password" placeholder="Contraseña" class="form-control" />
										</div>
									</div>
									<div class="footer text-center">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12">
												<a href="#pablo" class="btn btn-primary" style="width: 250px;"><span class="fa "></span>Inicia con nosotros</a>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												
												
												
												<a class="btn  btn-social btn-facebook" onclick="logInWithFacebook();" style="width: 250px; ">
												            <span class="fa fa-facebook"></span><span class="buttonText">Inicia con Facebook</span>
												</a>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 ">
	<div class="g-signin2" data-onsuccess="onSignIn" data-width="250" ></div>

<script src="https://apis.google.com/js/platform.js" async defer></script>
										</div>
										
									</div>
								</form>
                            </div>
                        </div>
                	</div>

                </div>
            </div>
		</div>


    </div>
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
	<script src="./js/facebook.js"></script>
	<script src="./js/google.js"></script>
</html>
