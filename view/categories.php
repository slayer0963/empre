
<title>Categor&iacute;as</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5   modal-trigger" id="btng" href="#modal1"><i class="material-icons right">assignment</i>Agregar categor&iacute;as</a>

      <div class="tb">
                    <table id="tbcat" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
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
  <div id="modal1" class="modal modal-fixed-footer  peque">
    <div class="modal-content">
      <h4>Categor&iacute;as</h4>
      <div class="row">
        <form class="col s12 center-align" id="formcat" name="formcat" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input type="text" name="categories" title="Nombre (*)" id="categories">
            <label for="categories">Categor&iacute;a</label>
            <span class="" id="txtcategories"></span>
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

      <div id="modal2" class="modal modal-fixed-footer  peque">
      <div class="modal-content">
        <h4>Editar Categor&iacute;as</h4>
        <div class="row">
          <form class="col s12 center-align" name="formcate" id="formcate" method="post">
          <div class="row">
            <input type="hidden" name="id" title="id" id="id">
            
          <div class="input-field col s12">
            <input type="text" name="categoriese" title="Nombre (*)" id="categoriese">
            <span class="" id="txtcategoriese"></span>
          </div>
          

          </div>
          <button type="submit" class=" btn">Editar <i class="material-icons">save</i></button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close btn-flat">Salir</a>
        
      </div>
    </div>


<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/categories.js"></script>