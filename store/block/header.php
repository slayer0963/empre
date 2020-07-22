<html>

  <?php
    session_start();
    include '../php/config.php';
    include_once "../cn/connection.php";
   ?>
    <head>
      

       <meta name="google-signin-client_id" content="606135828680-bfek54p79i4it5ussuoutenuc1p6ing1.apps.googleusercontent.com">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/responsive.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/animate.css">

      <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/lightbox.css">

    <link rel="stylesheet" href="<?php echo SERVERURLB; ?>view/css/select2-materialize.css">

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

        #modalcarshop{ width: 100% !important ; height: 65% !important ;  max-height: 100%;}
        #loginm { padding: 0; width: 25% !important ; height: 65% !important ;  max-height: 72%;}

      
          

        @media only screen and (max-width : 992px) {
           
            #loginm { width: 100% !important ; height: 60% !important ; } 
            #modalcarshop { width: 100% !important ; height: 80% !important ; } 
             
        }
      </style>
  </head>
  <body class="">

