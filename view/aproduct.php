
<title>Asignacion de precio</title>
<div class="animated slideInLeft " id="inicial">
  <div class="row">
        <div class="input-field col s12 m12 l6">
      <select  class="select2 browser-default" id="user" name="user" title="Usuario (*)">

      </select>
      <span class="" id="txtuser">Seleccionar Usuario</span>

    </div>
    <div class="input-field col s12 m12 l6">
      <select  class="select2 browser-default" id="bus" name="bus" title="Negocio (*)">

      </select>
      <span class="" id="txtbus">Seleccionar Negocio</span>

    </div>
  </div>

  <div class="row l12 m12 s12" id="tabla">
        <table id="tbproduct" class="table table-striped table-bordered table-hover text-center" cellspacing="0" width="100%">
      <thead >
        <tr>
          <th class="text-center"  data-priority="1">Nombre</th>
          <th class="text-center">Descripci&oacute;n</th>
          <th class="text-center">Categor&iacute;a</th>
          <th class="text-center">Tipo de producto</th>
          <th class="text-center"  data-priority="2">Acciones</th>
        </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
        <tr>
          <th class="text-center"  data-priority="1">Nombre</th>
          <th class="text-center">Descripci&oacute;n</th>
          <th class="text-center">Categor&iacute;a</th>
          <th class="text-center">Tipo de producto</th>
          <th class="text-center"  data-priority="2">Acciones</th>
        </tr>
      </tfoot>
    </table>


  </div>
</div>

<div class="row" id="precios"></div>

<!-- Modal Structure -->
<div id="modaladd" class="modal modal-fixed-footer aproduct ">
  <div class="modal-content align-center">
    <h4>Agregar precio de <h4 for="name" id="namepro"></h4></h4>

      <form class="col s12 center-align" id="frmprice" name="frmprice" method="post">
        <div class="row">
            <input type="hidden" id="idpro" name="idpro">
            <div class="input-field col s12 m12 l12">
              <input id="pcompra" name="pcompra" title="Precio Compra (*)" type="text" >
              <label for="pcompra">Precio de compra</label>
              <span class="" id="txtpcompra"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pventa" name="pventa" title="Precio Venta (*)" type="text" >
              <label for="pventa" id="">Precio de venta</label>
              <span class="" id="txtpventa"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="cantidad" name="cantidad" title="Cantidad (*)" type="text">
              <label for="cantidad" id="">Cantidad</label>
              <span class="" id="txtcantidad"></span>
            </div>
         </div>
        
      </form>
      <button  id="addpricepro" class=" btn">Agregar<i class="material-icons">add</i></button>
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>


<div class="row hide left-align animated bounceInDown" id="datospro">
  <a id="backtb" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br>
  
  <div class="col s12 m12 l8 offset-l2 center-align">
    <a id="backfrm" class="btn-floating blue darken-4 hide"><i class="material-icons">keyboard_arrow_up</i></a><br>
    <div class="card-panel animated" id="llenado">
       <h6 id="nombredtp"></h6>
        <select  class="select2 browser-default" id="color" multiple name="color[]" title="Seleccionar Colores (*)" onchange="changeSelect1(event)">

        </select>
        <span class="" id="txtuser">Seleccionar Colores</span>

        <select  class="select2 browser-default" id="mater" multiple name="mater[]" title="Seleccionar Material (*)" onchange="changeSelect2(event)">

        </select>
        <span class="" id="txtuser">Seleccionar Material</span>

        <select  class="select2 browser-default" id="size" multiple name="size[]" title="Seleccionar Talla (*)" onchange="changeSelect3(event)">

        </select>
        <span class="" id="txtuser">Seleccionar Tallas</span>
        <br>
        <br>
        <button  id="generar" class=" btn">Generar <i class="material-icons">cached</i></button>
      </div>
  </div>
  



  <div class="col s12 m12 l12">
    <div class="card-panel animated hide" id="tablage">
      Datos
      <table id="tbgen" class="table table-striped table-bordered table-hover text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Acción</th>
            </tr>
        </tfoot>
      </table>
      <!-- tabla de DAT -->
      
    </div>
  </div>
</div>



<div id="modaladdproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center">
    <h4 for="name" id="namepres"></h4>

      <form class="col s12 center-align" id="frmpricesa" name="frmpricesa" method="post">
        <div class="row">
            <input type="hidden" id="idpres" name="idpres">
            <input type="hidden" id="colorpre" name="colorpre">
            <input type="hidden" id="matpre" name="matpre">
            <input type="hidden" id="sizepre" name="sizepre">
            <div class="col s12 m6 l6">
              <div id="viewpic">
                <img src="https://sanitationsolutions.net/wp-content/uploads/2015/05/empty-image.png" style="height: 160px; width: 160px;" class="circle responsive-img" id="img" name="img">
              </div>
            <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input type="file" id="fileprice" name="fileprice">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="fname" name="fname" type="text">
            </div>
            </div>
            </div>
            <div class="col s12 m6 l6">
            <div class="input-field col s12 m12 l12">
              <input id="quantity" name="quantity" title="Cantidad (*)" type="text">
              <label for="quantity" id="">Cantidad</label>
              <span class="" id="txtquantity"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pextra" name="pextra" title="Precio Extra (*)" type="text" >
              <label for="pextra" id="">Precio de extra</label>
              <span class="" id="txtpextra"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="discount" name="discount" title="Descuento (*)" type="text" >
              <label for="discount" id="">Descuento</label>
              <span class="" id="txtdiscount"></span>
            </div>
            </div>
         </div>
        <button  id="addpricesa" class=" btn">Agregar<i class="material-icons">add</i></button>
      </form>
      
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>







<?php require 'blocks/footer.php'; ?>
<script src="<?php echo SERVERURL; ?>/jsproject/aproduct.js"></script>