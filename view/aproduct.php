
<title>Asignaci&oacute;n de precio</title>
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
    <center><h4>Fijar precio para <h4 for="name" id="namepro"></h4></h4></center>

      <form class="col s12 center-align" id="frmprice" name="frmprice" method="post">
        <div class="row">
            <input type="hidden" id="idpro" name="idpro">
            <div class="input-field col s12 m12 l12">
              <input id="pcompra" name="pcompra" title="Precio Compra (*)" type="text" >
              <label for="pcompra">Costo de elaboración</label>
              <span class="" id="txtpcompra"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pventa" name="pventa" title="Precio Venta (*)" type="text" >
              <label for="pventa" id="">Precio de venta</label>
              <span class="" id="txtpventa"></span>
            </div>
            
         </div>
        
      </form>
     <center> <button  id="addpricepro" class=" btn">Agregar<i class="material-icons">add</i></button></center>
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>


<div id="tablaviewcombi" class="modal">
    <div class="modal-content">
      <table id="tgen" class="table table-striped table-bordered table-hover text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Imagen</th>
                <th>Color</th>
                <th>Material</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </tfoot>
      </table>
    </div>
   
  </div>




<div class="row hide left-align animated bounceInDown" id="datospro">
  <a id="backtb" class="btn-floating blu"><i class="material-icons">keyboard_backspace</i></a><br>
  <br>
  <div class="col s12 m12 l8 offset-l2 center-align">
    <a id="backfrm" class="btn-floating blue darken-4 hide"><i class="material-icons">keyboard_arrow_up</i></a><br>
    <div class="card-panel animated" id="llenado">
       <h6 id="nombredtp"></h6><div id="printbutton"></div>
       <input type="hidden" id="id_prod">
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
  



  
    <div class="card-panel animated hide" id="tablage">
     
      <div class="row">
      <div class="col s12 m12 l12">
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
</div>



<div id="modaladdproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center">
    <h4 for="name" id="namepres"></h4>

      <form class="col s12 m12 l12 center-align" id="frmpricesa" name="frmpricesa" method="post">
        <div class="row">
            <input type="hidden" id="idpres" name="idpres">
            <input type="hidden" id="colorpre" name="colorpre">
            <input type="hidden" id="matpre" name="matpre">
            <input type="hidden" id="sizepre" name="sizepre">
            <div class="col s12 m6 l6">
              <div id="viewpic">
                <img src="../images/empty.jpg" style="height: 200px; width: 220px;" class="circle responsive-img" id="img" name="img">
              </div>
            <div class="file-field input-field">
            <div class="btn">
                <span>PRODUCTO</span>
                <input type="file" id="fileprice" name="fileprice">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="fname" name="fname" title="Imagen (*)" type="text">
            </div>
            <span class="" id="txtfname"></span>
            </div>
            </div>
            <div class="col s12 m6 l6">
            <div class="input-field col s12 m12 l12">
              <input id="quantity" name="quantity" title="Cantidad (*)" type="number" min=0 oninput="validity.valid||(value='');">
              <label for="quantity" id="">Cantidad</label>
              <span class="" id="txtquantity"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pextra" name="pextra"  type="text" value="0.00">
              <label for="pextra" id="">Costo agregado</label>
              <span class="" id="txtpextra"></span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input type="range" list="marks" id="discount" name="discount">
              <datalist id="marks">
                <option value="0" label="0%">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50" label="50%">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100" label="100%">
              </datalist>
              
              <span class="" id="txtdiscount">Descuento (%)</span>
            </div>
            </div>
         </div>
        <button  id="addpricesa" class=" btn">Agregar <i class="material-icons">add</i></button>
      </form>
      
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>








<div id="modalaeditproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center">
    <h4 for="name" id="namepres"> EDITAR COMBINACIÓN</h4>

      <form class="col s12 m12 l12 center-align" id="frmpricese" name="frmpricese" method="post">
        <div class="row">
            <input type="hidden" id="id_pricese" name="id_pricese">
            <input type="hidden" id="id_colore" name="id_colore">
            <input type="hidden" id="id_materiale" name="id_materiale">
            <input type="hidden" id="id_sizee" name="id_sizee">
            <div class="col s12 m6 l6">
              <div id="viewpice">
                <img src="../images/empty.jpg" style="height: 200px; width: 220px;" class="circle responsive-img" id="imge" name="imge">
              </div>
            <div class="file-field input-field">
            <div class="btn">
                <span>PRODUCTO</span>
                <input type="file" id="filepricee" name="filepricee">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="fnamee" name="fnamee" title="Imagen (*)" type="text">
            </div>
              <span class="" id="txtfnamee"></span>
            </div>
            </div>
            <div class="col s12 m6 l6">
            <div class="input-field col s12 m12 l12">
              <input id="quantitye" name="quantitye" title="Cantidad (*)" type="number" min=0 oninput="validity.valid||(value='');">
              <span class="" id="txtquantitye">Cantidad</span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input id="pextrae" name="pextrae" title="Precio Extra (*)" type="text" >
              
              <span class="" id="txtpextrae">Costo agregado</span>
            </div>
            <div class="input-field col s12 m12 l12">
              <input type="range" list="markse" id="discounte" name="discounte">
              <datalist id="markse">
                <option value="0" label="0%">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50" label="50%">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100" label="100%">
              </datalist>
              <span class="" id="txtdiscounte">Descuento (%)</span>
            </div>
            </div>
         </div>
        <button  id="editpricesa" class=" btn">Modificar <i class="material-icons">edit</i></button>
      </form>
      
    
  </div>
  
</div>

<!-- <div id="modaladdproduct" class="modal modal-fixed-footer aprices animated zoomInRight">
  <div class="modal-content align-center row">
    


      
    
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div> -->







<?php require 'blocks/footer.php'; ?>
<script src="<?php echo SERVERURL; ?>/jsproject/aproduct.js"></script>