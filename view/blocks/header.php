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

      <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/lightbox.css">

  

            <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/select2-materialize.css">

      <link rel="icon" type="image/gif" href="https://image.flaticon.com/icons/png/512/57/57003.png">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style>
          .peque { padding: 0; width: 30% !important ; height: 100% !important ;  max-height: 60%;} 
          .usuariomodal { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          .businessmodal { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          .product { padding: 0; width: 30% !important ; height: 100% !important ;  max-height: 89%;}
          .asign { padding: 0; width: 40% !important ; height: 100% !important ;  max-height: 85%;}
          th.dt-center, td.dt-center { text-align: center; } 
          .aproduct { padding: 0; width: 50% !important ; height: 100% !important ;  max-height: 85%;}
          .container{
            margin-top: 2rem;
            padding-left: 0;
          }
          .main{
             padding-left: 175px;
          }

          .errorinputs{
            color:red;
          }
          .full{
            padding-top: 0;
            margin-top: 0;
          }
          .successinputs{
            color:green;
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
            .usuariomodal {padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;} 
            .businessmodal { padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;}
            .product {padding: 0; width: 100% !important ; height: 80% !important ; max-height: 85%;}
            .asign { padding: 0; width: 100% !important ; height: 80% !important ;  max-height: 85%;}
            .aproduct { padding: 0; width: 100% !important ; height: 80% !important ;  max-height: 85%;}
          }
          .tb{
            margin-top: 2rem;
          }


    </style>
    <body >