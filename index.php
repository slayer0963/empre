


    <?php
  //require 'headerlogin.php';?>



    <?php
          if(isset($_GET['empre'])){
      $views = explode("/", $_GET['empre']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'store2.php';
      }
      
    }
    else{
      include 'store2.php';
    }
         ?>


<?php
 // require 'view/blocks/footer.php'; 


?>