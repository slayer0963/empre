



    <?php
    
    ?>


    <?php
          if(isset($_GET['store'])){
      $views = explode("/", $_GET['store']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'stores.php';
      }
      
    }
    else{
      include 'stores.php';
    }
         ?>
  </div>

</div>


<?php 


?>