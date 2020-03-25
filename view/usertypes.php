
<title>Tipo de usuario</title>

<a class=" btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">person_pin</i>Agregar tipo usuario</a>

      <div class="tb">
                    <table id="tbusertype" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
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


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer peque">
    <div class="modal-content">
      <h4>Tipo de usuario</h4>
      <div class="row">
        <form class="col s12 center-align" id="formusertype" name="formusertype" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input type="text" name="usertype" title="Tipo de usuario (*)" id="usertype">
            <label for="usertype">Tipo Usuario</label>
            <span class="" id="txtusertype"></span>
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
          <form class="col s12 center-align" name="formusertypee" id="formusertypee" method="post">
          <div class="row">
            <input type="hidden" name="id" title="nombre" id="id">
            <div class="input-field">
              <input  id="usertypee" name="usertypee" title="Tipo de usuario" type="text">
              <span class="" id="txtusertypee"></span> 
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
    <script src="<?php echo SERVERURL; ?>jsproject/usertype.js"></script>