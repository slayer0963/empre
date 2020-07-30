


<?php session_start() ?>

    <?php
        if(isset($_SESSION["name"])){
    ?>


    <?php
          if(isset($_GET['mystore'])){
      $views = explode("/", $_GET['mystore']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'mybusis.php';
      }
      
    }
    else{
      include 'mybusis.php';
    }
         ?>
  </div>

</div>



<?php
    }
    else{
      header('location: ../');
    }?>