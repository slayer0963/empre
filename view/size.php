
<title>Tamaño</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5   modal-trigger" id="btng" href="#modal1"><i class="material-icons right">color_lens</i>Agregar tamaño</a>

      <div class="tb">
                    <table id="tbsize" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Número</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Número</th>
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
      <h4>Tamaño.</h4>
      <div class="row">
        <form class="col s12 center-align" id="formsize" name="formsize" method="post">
        <div class="row">
           <div class="input-field col s12">
            <input type="text" name="txtnumber" title="Número (*)" id="txtnumber">
            <label for="txtnumber">Número</label>
            <span class="" id="txtnumbererror"></span>
          </div>
          <div class="input-field col s12">
            <input type="text" name="txtname" title="Nombre (*)" id="txtname">
            <label for="txtname">Nombre</label>
            <span class="" id="txtnameerror"></span>
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
        <h4>Editar Tamaño.</h4>
        <div class="row">
          <form class="col s12 center-align" name="formsizee" id="formsizee" method="post">
          <div class="row">
            <input type="hidden" name="sizeid" title="nombre" id="sizeid">
          <div class="input-field col s12">
            <input type="text" name="txtnumbere" title="Número" id="txtnumbere">
            <span class="" id="txtnumbererrore">Número</span>
          </div>
            <div class="input-field col s12">
              <input  id="txtnamee" name="txtnamee" title="Nombre" type="text">
              <span class="" id="txtnameerrore">Nombre</span>
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
    <script src="<?php echo SERVERURL; ?>jsproject/size.js"></script>