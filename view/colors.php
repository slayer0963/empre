
<title>Colores</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5   modal-trigger" id="btng" href="#modal1"><i class="material-icons right">color_lens</i>Agregar colores</a>

      <div class="tb">
                    <table id="tbcolor" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Color</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Color</th>
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
      <h4>Colores</h4>
      <div class="row">
        <form class="col s12 center-align" id="formcolor" name="formcolor" method="post">
        <div class="row">
           <div class="input-field col s12">
           <input type="color" name="pcolor" id="pcolor"><input type="hidden" name="txtcode" title="Selecciona un color (*)" id="txtcode">
            <span class="" id="txtcodeerror">Selecciona un color</span>
          </div>
          <div class="input-field col s12">
            <input type="text" name="txtcolor" title="Nombre (*)" id="txtcolor">
            <label for="txtcolor">Color</label>
            <span class="" id="txtcolorerror"></span>
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
        <h4>Editar Colores</h4>
        <div class="row">
          <form class="col s12 center-align" name="formcolore" id="formcolore" method="post">
           <div class="input-field col s12">
           <input type="color" name="pcolore" id="pcolore"><input type="hidden" name="txtcodee" title="Selecciona un color" id="txtcodee">
            <span class="" id="txtcodeeerror">Selecciona un color</span>
          </div>
          <div class="row">
            <input type="hidden" name="colorid" title="nombre" id="colorid">
            
            <div class="input-field col s12">
              
              <input  id="colore" name="colore" title="Nombre" type="text">
              <span class="" id="txtcoloreerror">Nombre</span>
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
    <script src="<?php echo SERVERURL; ?>/jsproject/color.js"></script>