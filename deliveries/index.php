


<?php session_start() ?>

    <?php
        if(isset($_SESSION["name"]) && $_SESSION["type"]==3){
    ?>


    <?php
          if(isset($_GET['deliveries'])){
      $views = explode("/", $_GET['deliveries']);
      if (is_file($views[0].'.php')) {
        include $views[0].'.php';
      }
      else{
        include 'delivery.php';
      }
      
    }
    else{
      include 'delivery.php';
    }
         ?>
  </div>

</div>



<?php
    }
    else{
      header('location: ../');
    }?>