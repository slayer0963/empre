<?php require 'blocks/header.php'; ?>
<?php require 'blocks/menu.php'; ?>


<div class="main m-1">
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


<?php require 'blocks/footer.php'; ?>
