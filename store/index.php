



    <?php
    
    ?>


    <?php
          if(isset($_GET['store'])){
      $views = explode("/", $_GET['store']);
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
  </div>

</div>


<?php 


?>