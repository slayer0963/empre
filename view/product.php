
<title>Productos</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">person_pin</i>Agregar producto</a>

      <div class="tb">
                    <table id="tbproduct" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center">Categor&iacute;a</th>
                              <th class="text-center">Tipo de producto</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center">Categor&iacute;a</th>
                              <th class="text-center">Tipo de producto</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>
</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer product">
    <div class="modal-content">
      <h4>Producto</h4>
      <div class="row">
        <form class="col s12 center-align" id="formproducttype" name="formproducttype" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input type="text" name="name" title="Nombre (*)" id="name">
            <label for="name">Nombre</label>
            <span class="" id="txtproducttype"></span>
          </div>
          <div class="input-field col s12">
            <textarea id="descrip" name="descrip" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="250"></textarea>
            <label for="descrip">Descripci&oacute;n</label>
          </div>
          <div class="input-field col s12">
              <select  class="select2 browser-default" id="cat" name="cat" title="Categoria (*)">
              </select>
              <span class="" id="cat"></span>
          </div>
          <div class="input-field col s12">
              <select  class="select2 browser-default" id="tp" name="tp" title="Tipo de producto (*)">
              </select>
              <span class="" id="tp"></span>
          </div>
        </div>
        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
    <div class="modal-footer">
      <a id="salir" class="modal-close  btn-flat">Salir</a>
      
    </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer peque">
      <div class="modal-content">
        <h4>Editar tipo de usuario</h4>
        <div class="row">
          <form class="col s12 center-align" name="formproducttypee" id="formproducttypee" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" name="namee" title="Nombre (*)" id="namee">
              <label for="name">Nombre</label>
              <span class="" id="txtproducttypee"></span>
            </div>
            <div class="input-field col s12">
              <textarea id="descripe" name="descripe" class="materialize-textarea" title="Descripci&oacute;n (*)" data-length="250"></textarea>
              <label for="descripe">Descripci&oacute;n</label>
            </div>
            <div class="input-field col s12">
                <select  class="select2 browser-default" id="cate" name="cate" title="Categoria (*)">
                </select>
                <span class="" id="cate"></span>
            </div>
            <div class="input-field col s12">
                <select  class="select2 browser-default" id="tpe" name="tpe" title="Tipo de producto (*)">
                </select>
                <span class="" id="tpe"></span>
            </div>
          </div>
          <button type="submit" class=" btn">Editar <i class="material-icons">save</i></button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
    </div>


<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/product.js"></script>