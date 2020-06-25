



    <?php
    
    ?>


    <?php
          if(isset($_GET['mystore'])){
      $views = explode("/", $_GET['mystore']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'businessstore.php';
      }
      
    }
    else{
      include 'businessstore.php';
    }
         ?>
  </div>

</div>


<?php 


?>