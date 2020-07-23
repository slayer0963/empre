
 <?php include 'block/header.php'; ?>
 <style>
   
   #prodetails { padding: 0; margin-top: -40px; width: 80% !important ; height: 95% !important ;  max-height: 100%;}
 @media only screen and (max-width : 992px) {
   #prodetails { margin-top: 5px; width: 100% !important ; height: 95% !important ; } 
  }
 </style>
 <?php include 'block/menu.php'; ?>
  <title id="title"></title>
    <div class="row">
      <div class="col l3 m10 s10 offset-s1 offset-m1">
         <ul class="collapsible expandable">
          <li class="active">
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Rango de precios</div>
            <div class="collapsible-body">
                <form action="#">
                  <p class="range-field">
                    <input type="range" id="test5" value="1" min="1" max="100" />
                  </p>
                </form>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Categorias</div>
            <div class="collapsible-body">
              <div class="categories">
                
              </div>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
          </li>
        </ul>
      </div>
      <div class="col l9 m10 s10 offset-s1 offset-m1">
        <div class="row " id="productstore" style="z-index: -1;">
       
        </div>
      </div>
    </div>

 <div id="prodetails" class="modal">
    <div class="modal-content row">
        <div class="col s12 m12 l12 center-align" ><h5 id="producttittle"></h5></div>
         <div class="col s12 m6 l4 center-align">
          <img id="imginitial" src="" height="250px;" width="250px">
          <ul class="collection with-header">
          <li class="collection-item center-align">Precio <br><span id="priceprosindes" class="price-old"></span>&nbsp;&nbsp;<span class="price-new" id="pricepro"></span><br>
            <a class="btn-floating btn-sm waves-effect waves-light green" id="addcar"><i class="material-icons">add_shopping_cart</i></a>&nbsp;<a class="btn-floating btn-sm waves-effect waves-light red" id="addwish"><i class="material-icons">shopping_basket</i></a>
          </li>

           </ul>
        </div>
        <div class="col s12 m6 l8">
          <ul class="collection with-header">
            <li class="collection-item">
              <h6>Colores</h6>
              <div class="row" id="colors">

              </div>
        
   
              <h6>Materiales</h6>
              <div class="row" id="contmat">
                
              </div>

              <h6>Tallas</h6>
              <div class="row" id="contsize">
                
              </div>
            
            <h6>Descripción</h6>
            <h6 id="pdet"></h6></li>
          </ul>
          <form method="POST" id="frmcarpro" name="frmcarpro" class="hide">
            <input type="text" id="idcliet" name="idcliet" value="<?php echo $valor = isset($_SESSION["idus"])?$_SESSION["idus"]:'';?>">
            <input type="text" id="pfidprod" name="pfidprod">
            <input type="text" id="pfidprices" name="pfidprices">
            <input type="text" id="pfcolor" name="pfcolor">
            <input type="text" id="pfmaterial" name="pfmaterial">
            <input type="text" id="pfsize" name="pfsize">
            <input type="text" id="pfprices" name="pfprices">
            <input type="text" id="discount" name="discount">
          </form>
        </div>
       
        <div class="col s12 m12 l12" >
            <div class="col s12 m12 s12">
              <div class="card white">
                <div class="card-content white-text row">
                  <input type="hidden" id="idclient" value=" <?php echo $_SESSION["idus"]; ?> ">
                    <div class="col l2 m2 s12 center-align">
                      <?php  echo (isset($_SESSION['name'])) ? '<img alt="Circle Image" class="circle"  src="../view/imguser/'.$_SESSION['img'].'" style="height:70px; width:80;">' : '<img class="circle" alt="64x64" style="height:70px; width:80;" src="assets/img/placeholder.jpg">'; ?>
                    </div>
                    <div class="col l10 m10 s12">
                      <div class="input-field">
                      <textarea id="comentproduc" name="comentproduc" class="materialize-textarea" data-length="120"></textarea>
                      <label for="textarea2">Textarea</label>
                    </div>
                    </div>
                    <div class="col l12 m12 s12 black-text">
                      <div class="row">
                        <div class="col l6 m6 s6 ">
                          <span class="">VALORACIÓN:&nbsp;&nbsp;<div class="rating" id="rate"></div></span>
                        </div>
                        <div class="col l6 m6 s6"> <button class="btn" id="publish">Comentar</button> </div>
                      </div>
                    </div>

                  
                </div>
            </div>
                              
        </div>
        <div class="comentper col s12 m12 l12" id="comentinput">
                                
        </div>
    </div>
  </div>
  
  </div>
 
 <?php include 'block/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/buss.js"></script>
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




