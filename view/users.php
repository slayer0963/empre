
<title>Usuarios</title>

<a class="waves-effect waves-light btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">people</i>Agregar usuario</a>

      <div class="tb">
                    <table id="tbusers" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Id</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Telefono</th>
                              <th class="text-center">Imagen</th>
                              <th class="text-center">Correo</th>
                              <th class="text-center">Usuario</th>
                              <th class="text-center">Contraseña</th>
                              <th class="text-center">Tipo de usuario</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Id</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Telefono</th>
                              <th class="text-center">Imagen</th>
                              <th class="text-center">Correo</th>
                              <th class="text-center">Usuario</th>
                              <th class="text-center">Contraseña</th>
                              <th class="text-center">Tipo de usuario</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>


  <!-- Modal Structure -->
  <div id="modal1" class="modal  usuariomodal">
    <div class="modal-content">
      <h4>Usuario</h4>
      <div class="row">
        <form class="col s12 center-align" id="formuser" name="formuser" method="post">
        <div class="row">
          <div class="input-field col s12">
            <div class="input-field col s12 ">
              <input type="text" name="fullname" title="Nombre" id="fullname">
              <label for="email">Nombre completo</label>
              <span class="helper-text">Nombre completo</span>
            </div>
            <div class="input-field col s12">
              <input type="text" name="phone" title="Telefono" id="phone">
              <label for="email">Telefono</label>
              <span class="helper-text">Telefono</span>
            </div>
            <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://image.flaticon.com/icons/png/512/149/149071.png" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>File</span>
                <input type="file" id="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Telefono" id="img"  type="text">
              </div>
            </div>
            </div>
            <div class="input-field col s12">
              <input type="text" name="email" title="Correo electronico" id="email">
              <label for="email">Correo electronico</label>
              <span class="helper-text">Correo electronico</span>
            </div>
   
            <div class="input-field col s12 ">
              <input type="text" name="user" title="Usuario" id="user">
              <label for="email">Usuario</label>
              <span class="helper-text">Usuario</span>
            </div>
            <div class="input-field col s12">
              <input type="text" name="pass" title="Contraseña" id="pass">
              <label for="email">Contraseña</label>
              <span class="helper-text">Contraseña</span>
            </div>
            <div class="input-field col s12">
              <select class="" id="tipouser" name="usertp" style="width: 100%" name="state">
                <option value="0" disabled selected>Seleccione un tipo de usuario</option>
                <option value="1" >Usuario</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="waves-effect waves-light btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer peque">
      <div class="modal-content">
        <h4>Editar tipo de usuario</h4>
        <div class="row">
          <form class="col s12 center-align" name="formusertypee" id="formusertypee" method="post">
          <div class="row">
            <input type="hidden" name="id" title="nombre" id="id">
            <label for="first_name">Color</label>
            <div class="input-field">
              <input  id="usertypee" name="usertypee" title="Tipo de usuario" type="text"> 
            </div>

          </div>
          <button type="submit" class="waves-effect waves-light btn">Editar <i class="material-icons">save</i></button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        
      </div>
    </div>


<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/user.js"></script>