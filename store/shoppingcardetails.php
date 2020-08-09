
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
    
   <!-- <div class="right-align">
      <a href="#!" class="green waves-effect waves-green btn-flat" id="endedpur" style="color: white">Comprar</a>
    </div> -->

    <div class="row">
      <div  class="col s12 m8 l9"></div>
      <input type="hidden" name="totalpaypal" id="totalpaypal">
    <div  class="col s12 m4 l3  paypal">
                            <!--<a href=ecom_checkout.html class="btn btn-block btn-danger">Checkout</a>-->
                            <script src="https://www.paypal.com/sdk/js?client-id=AZaoGKM56ExTS87wuwpleQSmtD2DNdwYMOa-7H1z17KuGQBS4ZognvHWLUQeZj0n5eycINB6f6za3zcH&currency=USD"></script>

                            <script>
                              paypal.Buttons({
                                createOrder: function(data, actions) {
                                  return actions.order.create({
                                    purchase_units: [{
                                      amount: {
                                        value: $("#totalpaypal").val()
                                      }
                                    }]
                                  });
                                },
                                onApprove: function(data, actions) {
                                  // Capture the funds from the transaction
                                  return actions.order.capture().then(function(details) {
                                    // Show a success message to your buyer
                                    
                                    


                                    var obj = JSON.parse(localStorage.getItem('Store'));
                                    for (var i = 0; i < parseInt($("#totval").val()); i++) {
                                    var idp=$("#id_prices"+i).val();
                                    var idc=$("#id_color"+i).val();
                                    var idm=$("#id_material"+i).val();
                                    var ids=$("#id_size"+i).val();
                                    var val=parseInt($("#cantidad"+i).text());
                                    $.ajax({
                                                type: "POST",
                                                url: "../controller/cuserhome.php?btnVenta=modificarCantidadInv&id_prices="+idp+"&id_color="+idc+"&id_material="+idm+"&id_size="+ids+"&val="+val, 
                                                success: function(resp2) {
                                                
                                          }   
                                     });            
                                    }

                                    $.ajax({
                                                type: "POST",
                                                url: "../controller/cuserhome.php?btnVenta=modificarStatusCart&id_car="+$(".id_shp_c").val(), 
                                                success: function(resp) {
                                                if(resp==1){
                                                    
                                                    localStorage.setItem('transac',1);
                                                    location.href="../";
                                                }
                                                else{
                                                    M.toast({html: '¡Hubo un error al querer hacer la compra!', classes: 'rounded orange'});
                                                    
                                                }
                                          }   
                                     }); 







                                  });
                                }
                              }).render('.paypal');
                            </script>

                        </div></div>
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




