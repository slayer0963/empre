
<title>Eventos</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5   modal-trigger" id="btng" href="#modal1"><i class="material-icons right">event</i>Agregar evento</a>

      <div class="tb">
                    <table id="tbevent" class="table table-striped table-bordered table-hover text-center "  cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Imagen</th>
                              <th class="text-center">Detalles</th>
                              <th class="text-center">Fecha de Lanzamiento</th>
                              <th class="text-center">Fecha Finalizaci&oacute;n</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody ></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Imagen</th>
                              <th class="text-center">Detalles</th>
                              <th class="text-center">Fecha de Lanzamiento</th>
                              <th class="text-center">Fecha Finalizaci&oacute;n</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>

</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer eventmodal">
    <div class="modal-content" id="contenedorevent">
      <h4>Evento.</h4>
      <div class="row">
        <form class="col s12 center-align" id="forevent" name="forevent" method="post">
        <div class="row">
          <div class="col s12 m12 l12">
          <div class="input-field col s12 center-align">
            <input type="text" class="center-align" name="txtname" title="Nombre (*)" id="txtname">
            <label for="txtname">Nombre</label>
            <span class="" id="txtnameerror"></span>
          </div>
          <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://artemasa.cl/img/team/team.png" class="circle responsive-img" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
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

            <div class="form-group col s12">
              <textarea id="detalle" name="detalle" class="materialize-textarea" title="Detalle (*)"></textarea>
              <label for="detalle">Detalles</label><br>
              <span class="" id="txtdet"></span>
            </div>
            <div class="form-group col s12">
            <input type="text" id="dateini" name="dateini" title="Fecha de lanzamiento (*)" class="datepicker datepicker-start">
            <label>Fecha de lanzamiento</label><br>
            <span class="" id="txtdateini"></span>
            </div>
            <div class="form-group col s12">
            <input type="text" id="datefin" name="datefin" title="Fecha Fin (*)" class="datepicker datepicker-end">
            <label>Fecha Fin</label><br>
            <span class="" id="txtdatefin"></span>
            </div>
          </div>
        </div>
        <button type="submit" class=" btn">Programar <i class="material-icons">save</i></button>
      </form>
      </div>
    </div>
    <div class="modal-footer">
      <a id="salir" class="modal-close  btn-flat">Salir</a>
      
    </div>
  </div>

      <div id="modal2" class="modal modal-fixed-footer eventmodal">
      <div class="modal-content">
        <h4>Editar Material.</h4>
        <div class="row">
          <form class="col s12 center-align" name="forevente" id="forevente" method="post">
            <input type="hidden" name="id" id="id">
        <div class="row">
          <div class="col s12 m12 l12">
          <div class="form-group col s12 center-align">
            <input type="text" class="center-align" name="txtnamee" title="Nombre (*)" id="txtnamee">
            <label for="txtname">Nombre</label>
            <span class="" id="txtnameerrore"></span>
          </div>
          <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://artemasa.cl/img/team/team.png" class="circle responsive-img" style="height: 150px; width: 150px;" id="imgcontainere" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Imagen</span>
                <input type="file" id="filee" name="filee">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Imagen (*)" id="imge"  type="text">
              </div>
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="form-group col s12">
              <textarea id="detallee" name="detallee" class="materialize-textarea"></textarea>
              <label for="detalle">Detalles</label>
              <span class="" id="txtdete"></span>
            </div>
            <div class="form-group col s12">
            <input type="text" id="dateinie" name="dateinie" class="datepicker">
            <label>Fecha de lanzamiento</label>
             <span class="" id="txtdateinie"></span>
            </div>
            <div class="form-group col s12">
            <input type="text" id="datefine" name="datefine" class="datepicker">
            <label>Fecha Fin</label>
            <span class="" id="txtdatefine"></span>
            </div>
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
    <script src="<?php echo SERVERURL; ?>/jsproject/events.js"></script>