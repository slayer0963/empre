
<title>Negocios</title>

<div class="animated slideInLeft">

<a class="  btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">work</i>Agregar negocio</a>

      <div class="tb">
                    <table id="tbbusi" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th style="text-align: center;">Nombre</th>
                              <th style="text-align: center;">Imagen</th>
                              <th style="text-align: center;">Usuario</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th style="text-align: center;">Nombre</th>
                              <th style="text-align: center;">Imagen</th>
                              <th style="text-align: center;">Usuario</th>
                              <th style="text-align: center;">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>

 

</div>
    


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer  businessmodal">
    <div class="modal-content">
      <h4>Negocio</h4>
      <div class="row">
      <form class="col s12 center-align" id="formbusi" name="formbusi" method="post">
        <div class="row">
        
           

           <div class="input-fiel col s12">

             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://png.pngtree.com/png-vector/20190223/ourmid/pngtree-vector-camera-icon-png-image_696326.jpg" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>

            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Logo de empresa</span>
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen (*)" id="img"  type="text">
              </div>
            </div>
            <span class="" id="txtimg"></span>
            </div>

            <div class="input-field col s12 m12 l6">
              <input type="text" name="name" title="Nombre (*)" id="name">
              <label for="name">Nombre del negocio</label>
              <span class="" id="txtname"></span>
            </div>

            <div class="input-field col s12 m12 l6">
              <select  class="select2 browser-default" id="user" name="user" title="Usuario (*)">
              </select>
              <span class="" id="txtuser"></span>
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

      <div id="modal2" class="modal modal-fixed-footer businessmodal">
      <div class="modal-content">
        <h4>Editar Negocio</h4>
        <div class="row">
        <form class="col s12 center-align" id="formbusie" name="formbusie" method="post">
        <div class="row">
          <div class=" col s12">

            <input type="hidden" name="id"  id="id">

           <div class="input-fiel col s12">

             <div class="col s12 align-center">
              <div id="vista-previae">
                 <img src="https://png.pngtree.com/png-vector/20190223/ourmid/pngtree-vector-camera-icon-png-image_696326.jpg" style="height: 150px; width: 150px;" id="imgcontainere" alt="" class="circle responsive-img">
              </div>
            </div>
            <br>

            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Logo de empresa</span>
                <input type="file" id="filee" name="filee">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="imge" title="Logo de empresa" id="imge"  type="text">
              </div>
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="input-field col s12 m12 l6">
              <input type="text" name="namee" title="Nombre del negocio" id="namee">
              <span class="" id="txtnamee">Nombre del negocio</span>
            </div>

            <div class="input-field col s12 m12 l6">
              <select  class="select2 browser-default" id="usere" name="usere" title="Usuario (*)">
              </select>
              <span class="" id="txtusere"></span>
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
    <script src="<?php echo SERVERURL; ?>jsproject/business.js"></script>