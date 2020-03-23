
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
  <div id="modal1" class="modal modal-fixed-footer  usuariomodal">
    <div class="modal-content">
      <h4>Usuario</h4>
      <div class="row">

        <form class="col s12 center-align" id="formuser" name="formuser" method="post">
        <div class="row">
            
            <div class="input-field col s12 ">
              <input type="text" name="fullname" title="Nombre" id="fullname">
              <label for="">Nombre completo</label>
              <span class="helper-text">Nombre completo</span>
            </div>
            <div class="input-field col s12">
              <input type="text" name="phone" title="Telefono" id="phone">
              <label for="">Telefono</label>
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
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen" id="img"  type="text">
              </div>
            </div>
            </div>
            <div class="input-field col s12">
              <input type="text" name="email" title="Correo electronico" id="email">
              <label for="">Correo electronico</label>
              <span class="helper-text">Correo electronico</span>
            </div>
   
            <div class="input-field col s12 ">
              <input type="text" name="user" title="Usuario" id="user">
              <label for="">Usuario</label>
              <span class="helper-text">Usuario</span>
            </div>
            <div class="input-field col s12">
              <input type="text" name="pass" title="Contraseña" id="pass">
              <label for="">Contraseña</label>
              <span class="helper-text">Contraseña</span>
            </div>

            <div class="input-field col s12">
              <select  class="select2 browser-default" id="tipouser" name="usertp">
                <option value="0" disabled selected>Seleccione tipo de usuario</option>
                <option value="1" >Usuario</option>
                <option value="3" >Usuario</option>
                <option value="2" >Usuario</option>
                <option value="4" >Usuario</option>
                <option value="5" >Usuario</option>
                <option value="6" >Usuario</option>

              </select>
            </div>



            

          
        </div>
        <button type="submit" class="waves-effect waves-light btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer usuariomodal">
      <div class="modal-content">
        <h4>Editar usuario</h4>
        <div class="row">
        <form class="col s12 center-align" id="formusere" name="formusere" method="post">
        <div class="row">
          <div class=" col s12">
            <input type="text" name="id"  id="id">
            <div class="input-field col s12 ">
              <input type="text" name="fullnamee" title="Nombre" id="fullnamee">
              <span class="helper-text">Nombre completo</span>
            </div>
            <div class="input-field col s12">
              <input type="text" name="phonee" title="Telefono" id="phonee">
              <span class="helper-text">Telefono</span>
            </div>
            <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://image.flaticon.com/icons/png/512/149/149071.png" style="height: 150px; width: 150px;" id="imgcontainere" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>File</span>
                <input type="file" id="filee" name="filee">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Imagen" id="imge"  type="text">
              </div>
            </div>
            </div>
            <div class="input-field col s12">
              <input type="text" name="emaile" title="Correo electronico" id="emaile">
              <span class="helper-text">Correo electronico</span>
            </div>
   
            <div class="input-field col s12 ">
              <input type="text" name="usere" title="Usuario" id="usere">
              <span class="helper-text">Usuario</span>
            </div>


            <div class="input-field col s12">
              <select  class="select2 browser-default" id="tipousere" name="usertp">
                <option value="0" disabled selected>Seleccione tipo de usuario</option>
                <option value="1" >Usuario</option>
                <option value="3" >Usuario</option>
                <option value="2" >Usuario</option>
                <option value="4" >Usuario</option>
                <option value="5" >Usuario</option>
                <option value="6" >Usuario</option>

              </select>
            </div>


            <div class="input-field col s12">
              <input type="text" name="passe" title="Contraseña" id="passe">
              <span class="helper-text">Contraseña</span>
            </div>
            
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