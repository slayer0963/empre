
<title>Tipo de producto</title>
<div class="animated slideInLeft">
<a class=" btn z-depth-5  modal-trigger" href="#modal1"><i class="material-icons right">person_pin</i>Agregar tipo producto</a>

      <div class="tb">
                    <table id="tbproducttype" class="table table-striped table-bordered table-hover text-center " cellspacing="0" width="100%">
                            <thead >
                            <tr>
                              <th class="text-center">Logo</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                             <tfoot>
                            <tr>
                              <th class="text-center">Logo</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
      </div>
</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer product">
    <div class="modal-content">
      <h4>Tipo de producto</h4>
      <div class="row">
        <form class="col s12 center-align" id="formproducttype" name="formproducttype" method="post">
        <div class="row">
          <div class="input-fiel col s12">
             <div class="col s12 align-center">
              <div id="vista-previa">
                 <img src="https://artemasa.cl/img/team/team.png" class="circle responsive-img" style="height: 150px; width: 150px;" id="imgcontainer" alt="" class=" responsive-img">
              </div>
            </div>
            <br>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>Logo</span>
                <input type="file" id="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" title="Imagen (*)" id="img"  type="text">
              </div>
            </div>
            <span class="" id="txtimg"></span>
            </div>
          <div class="input-field col s12">
            <input type="text" name="producttype" title="Tipo de producto (*)" id="producttype">
            <label for="producttype">Tipo producto</label>
            <span class="" id="txtproducttype"></span>
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

      <div id="modal2" class="modal modal-fixed-footer product">
      <div class="modal-content">
        <h4>Editar tipo de usuario</h4>
        <div class="row">
          <form class="col s12 center-align" name="formproducttypee" id="formproducttypee" method="post">
          <div class="row">
            <input type="hidden" name="id" title="nombre" id="id">
           <div class="col s12 align-center">
              <div id="vista-previae">
                 <img src="https://artemasa.cl/img/team/team.png" class="circle responsive-img" style="height: 150px; width: 150px;" id="imgcontainere"  >
              </div>
            </div>
            <br>
           <div class="file-field input-field">
            <div class="btn">
              <span>Logo</span>
              <input type="file" id="filee" name="filee">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="imge" title="Imagen" id="imge"  type="text">
            </div>
          </div>
            <div class="input-field">
              <input  id="producttypee" name="producttypee" title="Tipo de producto (*)" type="text">
              <span class="" id="txtproducttypee">Tipo de producto</span> 
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
    <script src="<?php echo SERVERURL; ?>jsproject/producttype.js"></script>