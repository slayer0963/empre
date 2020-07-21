
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
        
        <div class="col s12 m6 l8">
          <ul class="collection with-header">
            <li class="collection-header"><h6>Colores</h6></li>
            <li class="collection-item">
              <div class="row" id="colors">

              </div>
            </li>
   
            <li class="collection-header"><h6>Material</h6></li>
            <li class="collection-item">
              <div class="row" id="contmat">
                
              </div>
            </li>

            <li class="collection-header"><h6>Tallas</h6></li>
            <li class="collection-item">
              <div class="row" id="contsize">
                
              </div>
            </li>
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
        <div class="col s12 m6 l4 center-align">
          <img id="imginitial" src="" height="250px;" width="250px">
          <ul class="collection with-header">
          <li class="collection-item center-align">Precio <br><span id="priceprosindes" class="price-old"></span>&nbsp;&nbsp;<span class="price-new" id="pricepro"></span><br><br>
            <a class="btn-floating btn-sm waves-effect waves-light green"><i class="material-icons">add_shopping_cart</i></a>&nbsp;<a class="btn-floating btn-sm waves-effect waves-light red"><i class="material-icons">shopping_basket</i></a>
          </li>

           </ul>
        </div>
    </div>
  </div>

 <?php include 'block/footer.php'; ?>





