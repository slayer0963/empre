
 <?php include 'block/header.php'; ?>
 <style>


   .stockec{
    color: green;
    font-size: 15px;
   }

   #prodetails { padding: 0; margin-top: -40px; width: 80% !important ; height: 95% !important ;  max-height: 100%;}
 @media only screen and (max-width : 992px) {
   #prodetails { margin-top: 5px; width: 100% !important ; height: 95% !important ; } 
  }
 </style>
 <?php include 'block/menu.php'; ?>
  <title id="title">Carrito</title>


<center><h3>Mi carrito <i class="small material-icons dp50">shopping_cart</i></h3></center>
 <div id="modalcarshop"  >
    <div class="container">
      <ul class="collection" id="cartcli">

      </ul>
  <ul class="collection right-align">
    <li  class="collection-item"><h6 id="totalshop" class="price-new"></h6></li>
  </ul>
    
    <div class="right-align">
      <a href="#!" class="green waves-effect waves-green btn-flat" id="endedpur" style="color: white">Comprar</a>
    </div>
    </div>
    <br>
  </div>


 
 <?php include 'block/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/shoppingdetails.js"></script>
        <!-- <script type="text/javascript" src="<?php //echo SERVERURLB; ?>store/js/addcar.js"></script> -->

<script>
  $(document).ready(function() {
    initializeRatings();
      // $('#rate').swidget().value(4);
  });
    function initializeRatings() {
        $('#rate').shieldRating({
            max: 5,
            step: 0.1,
            value: 0,
            markPreset: false
        });
      }
</script>




