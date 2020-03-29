
<title>Tipo de producto</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">person_pin</i>Agregar tipo producto</a>

      <div class="tb">
                    <table id="tbproducttype" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>
</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer peque">
    <div class="modal-content">
      <h4>Tipo de producto</h4>
      <div class="row">
        <form class="col s12 center-align" id="formproducttype" name="formproducttype" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input type="text" name="producttype" title="Tipo de producto (*)" id="producttype">
            <label for="producttype">Tipo producto</label>
            <span class="" id="txtproducttype"></span>
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
            <input type="hidden" name="id" title="nombre" id="id">
            <div class="input-field">
              <input  id="producttypee" name="producttypee" title="Tipo de producto (*)" type="text">
              <span class="" id="txtproducttypee">Tipo de producto</span> 
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
    <script src="<?php echo SERVERURL; ?>jsproject/producttype.js"></script>