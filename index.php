


    <?php
    session_start();
    echo isset($_SESSION["type"]);
        if(isset($_SESSION["type"])==1||isset($_SESSION["type"])==2||isset($_SESSION["type"])==3){
              session_destroy();
        }


  ?>



    <?php
          if(isset($_GET['empre'])){
      $views = explode("/", $_GET['empre']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'store.php';
      }
      
    }
    else{
      include 'store.php';
    }
         ?>


<?php
 // require 'view/blocks/footer.php'; 


?>