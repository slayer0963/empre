


<?php session_start() ?>


    <?php
    
    if(isset($_SESSION["name"])){
    require 'blocks/header.php';
    require 'blocks/menu.php'; ?>


<div class="main m-2 ">
  <div class="container">
    <?php
          if(isset($_GET['view'])){
      $views = explode("/", $_GET['view']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'start.php';
      }
      
    }
    else{
      include 'start.php';
    }
         ?>
  </div>

</div>


<?php require 'blocks/footer.php'; 
    }
    else{
      header('location: ../');
    }

?>