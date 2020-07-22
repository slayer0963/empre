
 <?php include 'block/header.php'; ?>
 <style>
   .price-new{
    color: green;
    font-size: 20px;
   }
   .price-old{
    color: red;
    text-decoration: line-through;
    opacity: 0.5;
    font-size: 20px;
   }
   #prodetails { padding: 0; margin-top: -40px; width: 80% !important ; height: 95% !important ;  max-height: 100%;}
 @media only screen and (max-width : 992px) {
   #prodetails { margin-top: 5px; width: 100% !important ; height: 95% !important ; } 
  }
 </style>
 <?php include 'block/menu.php'; ?>
  <title id="title"></title>


<center><h3>Mi carrito <i class="small material-icons dp50">shopping_cart</i></h3></center>
 <div id="modalcarshop"  >
    <div class="container">
      <ul class="collection" id="cartcli">

 <!-- <li class="collection-item avatar align-left" >
     <div class="row">
        <div class="col s12 m6 l4"> <i class="material-icons circle green">insert_chart</i></div>
        <div class="col s12 m6 l4">
          <span class="title">Title</span>
          <p>First Line <br>
             Second Line
          </p>
        </div>
        <div class="col s12 m12 l4"><a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div>
      </div>
    </li>
        "<li class="collection-item avatar">
      <i class="material-icons circle green">insert_chart</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">delete</i></a>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle red">play_arrow</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">delete</i></a>
    </li> -->
  </ul>
  <ul class="collection right-align">
    <li  class="collection-item"><h6 id="totalshop" class="price-new">0</h6></li>
  </ul>
    
    <div class="right-align">
      <a href="#!" class="green waves-effect waves-green btn-flat" style="color: white">Comprar</a>
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




