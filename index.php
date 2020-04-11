


<?php session_start() ?>

    <?php
    require 'view/blocks/headerlogin.php';?>


<div class="main m-2 ">
  <div class="container">
    <?php
          if(isset($_GET['empre'])){
      $views = explode("/", $_GET['empre']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'login.php';
      }
      
    }
    else{
      include 'login.php';
    }
         ?>
  </div>

</div>


<?php require 'view/blocks/footer.php'; 


?>