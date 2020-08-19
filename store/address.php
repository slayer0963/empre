 <?php include 'block/header.php'; ?>
 <style>
   
   #prodetails { padding: 0; margin-top: -40px; width: 80% !important ; height: 95% !important ;  max-height: 100%;}
 @media only screen and (max-width : 992px) {
   #prodetails { margin-top: 5px; width: 100% !important ; height: 95% !important ; } 
  }
 </style>
 <?php include 'block/menu.php'; ?>
 <title>Direcciones</title>
  


<!-- ADDRESS -->
      <div  class="container">
    <div class="modal-content">
      <h3 id="txtvaal">Direcciones <a class="btn" onclick="bta()" title="Agregar" id="btnadda"><i class="material-icons">add_location</i></a></h3>
      
      <div class="hide" id="adda">
        

      <form action="" id="frmadd" name="frmadd" class="center-align">
        <div class="row">
        <input type="hidden" name="idcla" id="idcla">
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="department" required="true" name="department" title="Departamento (*)"  style="text-align: center;">
                <option value="">Seleccione departamento</option>
                <option value="San Miguel">San Miguel</option>
              </select>
              
        </div>
        <div class="input-field col s12 m12 l6 ">
              <select  class="select2 browser-default" id="city" required="true" name="city" title="Ciudad (*)"  style="text-align: center;">
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
              <input type="text" name="streetdir" required="true" title="Colonia/Calle o Avenida (*)" id="streetdir" style="text-align: center;">
              <label for="streetdir">Colonia/Calle o Avenida</label>
              <span class="" id="txtstreetdir"></span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="numberdir" required="true" title="# Casa, Edificio, Nivel o Apartamento (*)" id="numberdir" style="text-align: center;">
              <label for="numberdir"># Casa, Edificio, Nivel o Apartamento</label>
              <span class="" id="txtnumberdir"></span>
        </div>
        <div class="input-field col s12 m12 l6 ">
              <input type="text" name="contact" required="true" title="Teléfono de contacto (*)" id="contact" style="text-align: center;">
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



      <div class="col s12 m12 l12" id="dataa">
        
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
  <!-- ADDRESS -->


 <?php include 'block/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/address.js"></script>
        <script type="text/javascript" src="<?php echo SERVERURLB; ?>store/js/buss.js"></script>

        <!-- <script type="text/javascript" src="<?php //echo SERVERURLB; ?>store/js/addcar.js"></script> -->

<script>
  $(document).ready(function() {
    initializeRatings();
      // $('#rate').swidget().value(4);
  });
    function initializeRatings() {
        $('#rate').shieldRating({
            max: 5,
            step: 0.1,
            value: 0,
            markPreset: false
        });
      }
</script>