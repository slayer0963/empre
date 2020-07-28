
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

    <div id="modaladdress" class="modal">
    <div class="modal-content">
      <h3 id="txtvaal">Direcciones <a class="btn" onclick="bta()" title="Agregar" id="btnadda"><i class="material-icons">add_location</i></a></h3>
      
      <div class="hide" id="adda">
        

      <form action="" id="frmadd" name="frmadd" class="center-align">
        <div class="row">
        <input type="hidden" name="idcla" id="idcla">
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="department"  name="department" title="Departamento (*)"  style="text-align: center;">
                <option value="">Seleccione departamento</option>
                <option value="San Miguel">San Miguel</option>
              </select>
              
        </div>
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="city"  name="city" title="Ciudad (*)"  style="text-align: center;">
                <option value="">Seleccione ciudad</option>
                <option value="Carolina"> Carolina</option>
                <option value="Chapeltique"> Chapeltique</option>
                <option value="Chinameca"> Chinameca</option>
                <option value="Chirilagua"> Chirilagua</option>
                <option value="Ciudad Barrios"> Ciudad Barrios</option>
                <option value="Comacarán"> Comacarán</option>
                <option value="El Tránsito"> El Tránsito</option>
                <option value="Lolotique"> Lolotique</option>
                <option value="Moncagua"> Moncagua</option>
                <option value="Nueva Guadalupe"> Nueva Guadalupe</option>
                <option value="Nuevo Edén de San Juan"> Nuevo Edén de San Juan</option>
                <option value="Quelepa"> Quelepa</option>
                <option value="San Antonio"> San Antonio</option>
                <option value="San Gerardo"> San Gerardo</option>
                <option value="San Jorge"> San Jorge</option>
                <option value="San Luis de la Reina"> San Luis de la Reina</option>
                <option value="San Miguel"> San Miguel</option>
                <option value="San Rafael Oriente"> San Rafael Oriente</option>
                <option value="Sesori"> Sesori</option>
                <option value="Uluazapa"> Uluazapa</option>
              </select>
              
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="streetdir" title="Colonia/Calle o Avenida (*)" id="streetdir" style="text-align: center;">
              <label for="streetdir">Colonia/Calle o Avenida</label>
              <span class="" id="txtstreetdir"></span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="numberdir" title="# Casa, Edificio, Nivel o Apartamento (*)" id="numberdir" style="text-align: center;">
              <label for="numberdir"># Casa, Edificio, Nivel o Apartamento</label>
              <span class="" id="txtnumberdir"></span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="contact" title="Teléfono de contacto (*)" id="contact" style="text-align: center;">
              <label for="contact">Teléfono de contacto</label>
              <span class="" id="txtcontact"></span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text"  name="reference"  id="reference" style="text-align: center;">
              <label for="reference">Referencia para ubicar mejor al repartidor</label>
              <span class="" id="txtreference"></span>
        </div>
        </div>

        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>





      <div class="hide" id="adde">
        

      <form action="" id="frmadde" name="frmadde" class="center-align">
        <div class="row">
        <input type="hidden" name="idadd" id="idadd">
        
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="departmente"  name="departmente" title="Departamento (*)"  style="text-align: center;">
                <option value="San Miguel">San Miguel</option>
              </select>
              <span class="" id="txtdepartmente">Departamento</span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="citye"  name="citye" title="Ciudad (*)"  style="text-align: center;">
                <option value="Carolina">Carolina</option>
                <option value="Chapeltique">Chapeltique</option>
                <option value="Chinameca">Chinameca</option>
                <option value="Chirilagua">Chirilagua</option>
                <option value="Ciudad Barrios">Ciudad Barrios</option>
                <option value="Comacarán">Comacarán</option>
                <option value="El Tránsito">El Tránsito</option>
                <option value="Lolotique">Lolotique</option>
                <option value="Moncagua">Moncagua</option>
                <option value="Nueva Guadalupe">Nueva Guadalupe</option>
                <option value="Nuevo Edén de San Juan">Nuevo Edén de San Juan</option>
                <option value="Quelepa">Quelepa</option>
                <option value="San Antonio">San Antonio</option>
                <option value="San Gerardo">San Gerardo</option>
                <option value="San Jorge">San Jorge</option>
                <option value="San Luis de la Reina">San Luis de la Reina</option>
                <option value="San Miguel">San Miguel</option>
                <option value="San Rafael Oriente">San Rafael Oriente</option>
                <option value="Sesori">Sesori</option>
                <option value="Uluazapa">Uluazapa</option>
              </select>
              <span class="" id="txtcitye">Ciudad</span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="streetdire" title="Colonia/Calle o Avenida (*)" id="streetdire" style="text-align: center;">
              <span class="" id="txtstreetdire">Colonia/Calle o Avenida</span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="numberdire" title="# Casa, Edificio, Nivel o Apartamento (*)" id="numberdire" style="text-align: center;">
              <span class="" id="txtnumberdire"># Casa, Edificio, Nivel o Apartamento</span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="contacte" title="Teléfono de contacto (*)" id="contacte" style="text-align: center;">
              <span class="" id="txtcontacte">Teléfono de contacto</span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" placeholder="Ej. Frente a casa Municipal, etc." name="referencee"  id="referencee" style="text-align: center;">
              <span class="" id="txtreferencee">Referencia para ubicar mejor al repartidor</span>
        </div>
        </div>

        <button type="submit" class=" btn">Guardar <i class="material-icons">save</i></button>
      </form>
      </div>



      <div  id="dataa">
        
      <table id="tbaddres" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th style="text-align: center;">Cliente</th>
                              <th style="text-align: center;">Teléfono</th>
                              <th style="text-align: center;">Departamento</th>
                              <th style="text-align: center;">Ciudad</th>
                              <th style="text-align: center;">Colonia/Calle o Avenida</th>
                              <th style="text-align: center;"># Casa, Edificio, Nivel o Apartamento</th>
                              <th style="text-align: center;">Referencia</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th style="text-align: center;">Cliente</th>
                              <th style="text-align: center;">Teléfono</th>
                              <th style="text-align: center;">Departamento</th>
                              <th style="text-align: center;">Ciudad</th>
                              <th style="text-align: center;">Colonia/Calle o Avenida</th>
                              <th style="text-align: center;"># Casa, Edificio, Nivel o Apartamento</th>
                              <th style="text-align: center;">Referencia</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </tfoot>
                        </table></div>
    </div>

  </div>




<?php require 'blocks/footer.php'; ?>
    <script src="<?php echo SERVERURL; ?>jsproject/client.js"></script>
    <script>
      $(document).ready(function() {
        
      });
    </script>