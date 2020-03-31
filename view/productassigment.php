
<title>Asignaci&oacute;n de producto</title>
<div class="animated slideInLeft">
<!-- <a class=" btn z-depth-5   modal-trigger" id="btng" href="#modal1"><i class="material-icons right">color_lens</i>Agregar Asignaci&oacute;n de producto</a> -->

<div class="row">
  <div class="col l6 m6 s12">
    <h5>Todos los productos</h5>
          <div class="tb">
                    <table id="tbproduct" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center" data-priority="1">Nombre</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center" data-priority="2">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center" data-priority="1">Nombre</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center" data-priority="2">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>
  </div>
  <div class="col l6 m6 s12">
    <h5>Productos del negocio</h5>
          <div class="tb">
                    <table id="tbassigmentprod" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center" data-priority="1">Producto</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center" data-priority="2">Negocio</th>
                              <th class="text-center" data-priority="3">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center" data-priority="1">Producto</th>
                              <th class="text-center">Descripci&oacute;n</th>
                              <th class="text-center" data-priority="2">Negocio</th>
                              <th class="text-center" data-priority="3">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>
  </div>
</div>

</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer asign">
    <div class="modal-content">
      <h4>Asignaci&oacute;n de producto</h4>
      <div class="row">
        <form class="col s12 center-align" id="formassig" name="formassig" method="post">
        <div class="row">
          <input type="hidden" id="productid" name="productid">
          <ul class="collapsible popout left-align">
                  <li class="active">
                    <div class="collapsible-header"><i class="material-icons">menu_book</i>Nombre:</div>
                    <div class="collapsible-body"><span id="name"></span></div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">reorder</i>Descripci&oacute;n:</div>
                    <div class="collapsible-body"><span id="des"></span></div>
                  </li>
          </ul>
          <label for="tp">Usuario</label>
              <div class="input-field">

              <select  class="select2 browser-default" id="user" name="user" title="Usuario (*)">
              </select>
              <span class="" id="txtuser"></span>
          </div>
              <label for="tp">Negocio</label>
              <div class="input-field">
              
              <select  class="select2 browser-default" id="bus" name="bus" title="Negocio (*)">
              </select>
              <span class="" id="txtbus"></span>
          </div>
        </div>
        <button type="submit" class=" btn">Agregar <i class="material-icons">add</i></button>
      </form>
      </div>
    </div>
    <div class="modal-footer">
      <a id="salir" class="modal-close  btn-flat">Salir</a>
      
    </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer asign">
      <div class="modal-content">
        <h4>Editar asignaci&oacute;n de producto</h4>
        <div class="row">
        <form class="col s12 center-align" id="formassige" name="formassige" method="post">
        <div class="row">
          <input type="hidden" id="asign" name="asign">
          <input type="hidden" id="productide" name="productide">
          <ul class="collapsible popout left-align">
                  <li class="active">
                    <div class="collapsible-header"><i class="material-icons">menu_book</i>Nombre:</div>
                    <div class="collapsible-body"><span id="namee"></span></div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">reorder</i>Descripci&oacute;n:</div>
                    <div class="collapsible-body"><span id="dese"></span></div>
                  </li>
          </ul>
          <label for="tp">Usuario</label>
              <div class="input-field">

              <select  class="select2 browser-default" id="usere" name="usere" title="Usuario (*)">
              </select>
              <span class="" id="txtusere"></span>
          </div>
              <label for="tp">Negocio</label>
              <div class="input-field">
              
              <select  class="select2 browser-default" id="buse" name="buse" title="Negocio (*)">
              </select>
              <span class="" id="txtbuse"></span>
          </div>
        </div>
        <button type="submit" class=" btn">Modificar <i class="material-icons">edit</i></button>
      </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close btn-flat">Salir</a>
        
      </div>
    </div>


<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/productassigment.js"></script>