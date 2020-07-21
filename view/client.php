
<title>Clientes</title>
<div class="animated slideInLeft">
<a class="  btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">people</i>Agregar cliente</a>

      <div class="tb">
                    <table id="tbclient" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th style="text-align: center;">Nombre</th>
                              <th style="text-align: center;">Imagen</th>
                              <th style="text-align: center;">Correo</th>
                              <th style="text-align: center;">Usuario</th>
                              <th style="text-align: center;">Contraseña</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th style="text-align: center;">Nombre</th>
                              <th style="text-align: center;">Imagen</th>
                              <th style="text-align: center;">Correo</th>
                              <th style="text-align: center;">Usuario</th>
                              <th style="text-align: center;">Contraseña</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>

 </div>


    


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer  usuariomodal">
    <div class="modal-content">
      <h4>Cliente</h4>
      <div class="row">
      <form class="col s12 center-align" id="formcli" name="formcli" method="post">
        <div class="row">
        
           

           <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://image.flaticon.com/icons/png/512/149/149071.png" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Imagen</span>
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen (*)" id="img"  type="text">
              </div>
            </div>
            <span class="" id="txtimg"></span>
            </div>


            <div class="input-field col s12 m12 l6">
              <input type="text" name="fullname" title="Nombre completo (*)" id="fullname">
              <label for="fullname">Nombre completo</label>
              <span class="" id="txtfullname"></span>
            </div>

            

            <div class="input-field col s12 m12 l6">
              <input type="email" name="email" title="Correo electr&oacute;nico (*)" id="email">
              <label for="email">Correo electr&oacute;nico</label>
              <span class="" id="txtemail"></span>
            </div>
            
            <div class="input-field col s12 m12 l6 ">
              <input type="text" name="user" title="Usuario (*)" id="user">
              <label for="user">Usuario</label>
              <span class="" id="txtuser"></span>
            </div>

            <div class="input-field col s12 m12 l6">
              <input type="text" name="pass" title="Contraseña (*)" id="pass">
              <label for="pass">Contraseña</label>
              <span class="" id="txtpass"></span>
            </div>




            

          
        </div>
        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
          <div class="modal-footer">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer usuariomodal">
      <div class="modal-content">
        <h4>Editar cliente</h4>
        <div class="row">
        <form class="col s12 center-align" id="formclie" name="formclie" method="post">
        <div class="row">
          <div class=" col s12">

            <input type="hidden" name="id"  id="id">

            <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previae">
                 <img src="https://image.flaticon.com/icons/png/512/149/149071.png" class="circle responsive-img" style="height: 150px; width: 150px;" id="imgcontainere"  >
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Imagen</span>
                <input type="file" id="filee" name="filee">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Imagen" id="imge"  type="text">
              </div>
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="fullnamee" title="Nombre completo" id="fullnamee" style="text-align: center;">
              <span class="" id="txtfullnamee">Nombre completo</span>
            </div>

            <div class="input-field col s12 m12 l6 col s12 m12 l6 ">
              <input type="email" name="emaile" title="Correo electr&oacute;nico" id="emaile" style="text-align: center;">
              <span class="" id="txtemaile">Correo electr&oacute;nico</span>
            </div>
   
            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="usere" title="Usuario" id="usere" style="text-align: center;">
              <span class="" id="txtusere">Usuario</span>
            </div>

            <div class="input-field col s12 m12 l6 ">
              <input type="text" name="passe" title="Contraseña" id="passe" style="text-align: center;">
              <span class="" id="txtpasse">Contraseña</span>
            </div>
            
          </div>
        </div>
          <button type="submit" class="waves-effect waves-light btn">Editar <i class="material-icons">save</i></button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close  btn-flat">Salir</a>
        
      </div>
    </div>


<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/client.js"></script>
    <script>
      $(document).ready(function() {
        
      });
    </script>