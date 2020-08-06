
    <div id="profiled" class="modal">
    <div class="modal-content row">

      <div class="col s12 m12 l12">
                <form class="col s12 center-align" id="formusere" name="formusere" method="post">
        <div class="row">
          <div class=" col s12">

            <input type="hidden" name="id_profile"  id="id_profile">

            <div class="input-fiel col s12">
             <h3>Mi Perfil</h3>
            
            <div class="file-field input-field col s12">
              <div class="col s8 m6 l6 ">
              <div id="vista-previaedp">
                
                       <img src="https://image.flaticon.com/icons/png/512/149/149071.png" class=" responsive-img" style="height: 150px; width: 150px;" id="imgcontaineredp"  >
                    </div>
            </div>
              <div class="col s4 m6 l6 center-align">
                <div class="btn " style="margin-top: 4rem;">
                  <span>Cambiar imagen</span>
                  <input type="file" id="filedp" name="filedp">
                  <div class="file-path-wrapper">
                <input class="file-path validate" name="imgedp" title="Imagen" id="imgedp"  type="hidden">
              </div>
                </div>
              </div>
              
              
              
              
            </div>
            <span class="" id="txtimge"></span>
            </div>

            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="fullnamee"  title="Nombre completo" id="fullnamee" style="text-align: center;">
              <span class="" id="txtfullnamee">Nombre completo</span>
            </div>

            <div class="input-field col s12 m12 l6 col s12 m12 l6 ">
              <input type="email" name="emaile" title="Correo electr&oacute;nico" id="emaile" style="text-align: center;">
              <span class="" id="txtemaile">Correo electr&oacute;nico</span>
            </div>
   
            <div class="input-field col s12 m12 l6  ">
              <input type="text" name="usere"  title="Usuario" id="usere" style="text-align: center;">
              <span class="" id="txtusere">Usuario</span>
            </div>

            <div class="input-field col s11 m11 l5 ">
              <input type="password" name="passe"  title="Contraseña" id="passe" style="text-align: center;">
              <span class="" id="txtpasse">Contraseña</span>
            </div>

            <div class="input-field col s1 m1 l1 " >
              <button type="button" class="btn btn-xs" id="viewpass" style="margin-top: 1rem;"><i class="material-icons">remove_red_eye</i></button>
            </div>
            <div class="input-field col s12 m12 l6 offset-l3">
              <input type="text" name="phonee" title="Tel&eacute;fono" id="phonee" style="text-align: center;">
              <span class="" id="txtphonee">Tel&eacute;fono</span>
            </div>
          </div>
        </div>
          <button type="submit" class="waves-effect waves-light btn">Editar <i class="material-icons">save</i></button>
        </form>
      </div>
      
      
    </div>
    <div class="modal-footer">
      
    </div>
   
  </div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript" src="<?php echo SERVERURLB; ?>view/jsproject/local.js"></script>

<script type="text/javascript">
	
	 $(document).ready(function(){

	 	          if(localStorage.getItem('modificaperfiluser')==1){
		            M.toast({html: "¡Tus datos se cambiaron exitosamente!", classes: 'rounded green'});
		            localStorage.setItem('modificaperfiluser',0)
		          }
	 	        $("#imgedp").change(function(event) {
                 document.getElementById("imgcontaineredp").removeAttribute('src');

                    $("#vista-previaedp").html('');
                            var archivos=document.getElementById('filedp').files;
                    var navegador=window.URL || window.webkitURL;

                    for (var i = 0; i < archivos.length; i++) {

                        var size=archivos[i].size;
                        var type=archivos[i].type;
                        var name=archivos[i].name;
                        
                            var objeto_url=navegador.createObjectURL(archivos[i]);

                     $("#vista-previaedp").append('<img src="'+objeto_url+'" id="imgcontaineredp" alt="" style="height: 150px; width: 150px;" class=" responsive-img">');
                   }
                });

	 	    $('#formusere').submit(function() {
               // if(Validate(0)==idinpute.length){
                var formData = new FormData(document.getElementById("formusere"));
                        $.ajax({
                        type: "POST",
                        url: "../controller/cuser.php?updateData=updatepro", 
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {

                            var datos = eval(resp);
                            if(datos[0].estado==1){
                                localStorage.setItem('client',datos[0].id);
                                localStorage.setItem('nameper',datos[0].nombre);
                                localStorage.setItem('modificaperfiluser',1);
                                location.reload();

                               }else if(resp=="x"){
                                M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});
                                
                               }
                               else{
                                M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                               } 
                           }
                            
                    });
                
              // }
              return false;
            });

	    $('.tooltipped').tooltip();


	        var contpass=0;
	      $("#viewpass").click(function(event) {

	        if(contpass==0){
	          $("#passe").attr({
	          type: 'text'
	          });
	          contpass++;
	        }
	        else{
	          $("#passe").attr({
	            type: 'password'
	          });
	          contpass=0;
	        }
	        
	        
	      });

	  });

	         function fillboxprofile(id) {
				          var dataString = 'id='+id;
				              $.ajax({
				                    type: "POST",
				                    url: "../controller/cuser.php?btngetDatauser=getdataprofile", 
				                    data: dataString,
				                    success: function(resp) {
				                      //alert(resp);
				                      var respu = eval(resp);
				                          for (var i = 0; i < respu.length; i++) {
				                          	
				                            $("#id_profile").val(respu[0].id_user);
				                            $("#fullnamee").val(respu[0].fullname_user);
				                            $("#imgcontaineredp").attr("src",'../view/imguser/'+respu[0].imagen);
				                            $("#imgedp").val(respu[0].imagen);
				                            $("#emaile").val(respu[0].email_user);
				                            $("#usere").val(respu[0].user_user);
				                            $("#passe").val(respu[0].pass_user);
				                            $("#phonee").val(respu[0].phone_user);
				                          }
				                    }
				                  });
				}
</script>