



    <?php
    
    ?>


    <?php
          if(isset($_GET['mystorev2'])){
      $views = explode("/", $_GET['mystorev2']);
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