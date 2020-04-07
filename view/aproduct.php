
<title>Asignacion de precio</title>
<div class="animated slideInLeft">
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


  <a class=" btn z-depth-5" id="addprice" href="#"><i class="material-icons right">add</i>Agregar Precios</a>

  <div class="tb">
    <table id="tbaprice" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
      <thead >
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Imagenes</th>
          <th class="text-center">Materiales</th>
          <th class="text-center">Tallas/Tama&ntilde;os</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody ></tbody>
      <tfoot>
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Imagenes</th>
          <th class="text-center">Materiales</th>
          <th class="text-center">Tallas/Tama&ntilde;os</th>
          <th class="text-center">Acciones</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<!-- Modal Structure -->
<div id="modaladd" class="modal modal-fixed-footer aproduct ">
  <div class="modal-content">
    <h4>Asignacion de precios</h4>
    <div class="row">
      <form class="col s12 center-align" id="formcolor" name="formcolor" method="post">
        <div class="row">
            <div class="input-field col s12 m12 l12">
              <select  class="select2 browser-default" id="pro" name="pro" title="Producto (*)">
              </select>
              <span class="" id="">Seleccionar Producto</span>
            </div>
          <div class="col l12 m12 s12">

            <div class="input-field col l12 m12 s12 center-align">

              <select  class="select2 browser-default" id="color" name="color[]" multiple="multiple" title="Color (*)">
              </select>
              <span class="" id="">Selecciona un color</span>
            </div>
            <div class="input-field col l12 m12 s12 center-align">
              <select  class="select2 browser-default" id="material" name="material[]"  multiple="multiple" title="Material (*)">
              </select>
              <span class="" id="">Seleccionar materiales</span>

            </div>
            <div class="input-field col l12 m12 s12 center-align">
              <select  class="select2 browser-default" id="size" name="size[]" multiple="multiple" title="Tallas (*)">
              </select>
              <span class="" id="">Seleccionar tallas</span>
            </div>
          </div>
         </div>
        
      </form>
      <button  id="addlist" class=" btn">Agregar<i class="material-icons">add</i></button>
    </div>
  </div>
  <div class="modal-footer">
    <a id="salir" class="modal-close  btn-flat">Salir</a>

  </div>
</div>



<?php require 'blocks/footer.php'; ?>
<script src="<?php echo SERVERURL; ?>/jsproject/aproduct.js"></script>