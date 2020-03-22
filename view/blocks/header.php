  <html>

  <?php 
    include '../php/config.php';
   ?>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURL; ?>css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/animate.css">



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style>
          .peque { margin-top: 2%;} 
          .container{
            margin-top: 2rem;
            padding-left: 0;
          }
          .main{
             padding-left: 175px;
          }
          header, footer {
            padding-left: 300px;
          }
          

          @media only screen and (max-width : 992px) {
            header, .main, footer {
              padding-left: 0;
            }
            .tb{
            margin-top: 1rem;
            }
            .peque { width: 75% !important ; height: 75% !important ; } 


          }
          .tb{
            margin-top: 2rem;
          }


    </style>
    <body>