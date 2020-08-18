
$(document).ready(function($) {

fechaevent();
  if(localStorage.getItem('modificaperfil')==1){
    M.toast({html: "¡Tus datos se cambiaron exitosamente!", classes: 'rounded green'});
    localStorage.setItem('modificaperfil',0)
  }

 

  if(localStorage.getItem('newuser')==1){
    swal({
        title: "Hola!",
        text: "Te damos la bienvenida a Tienda Local!",
        icon: "success",
        button: "Comenzar",
      });
    localStorage.setItem('newuser',0)
  }

      var obj = JSON.parse(localStorage.getItem('Store'));
             //alert(obj.name);
             $("#namebusi").html("<strong>"+obj.name+"</strong>");
             $("#title").html(obj.name);
             $("#titlebusi").html(obj.name);
            $(".namebusi").html(obj.name);
             $("#description").html(obj.des);
            mybusii(obj.id);
             gettypes(obj.id);
              
      // alert(obj.id);

      $("#range").change(function(event) {
        
        if($("#range").val()==0){
          mybusii(obj.id);
        }
        else{
          mybusiibyrange(obj.id,$("#range").val());
        }
        
      });

      $("#comentproduc").click(function () {
         if(localStorage.getItem('nameper')==null){
            $('#loginm').modal('open');
         }
         
      });

      $("#publish").click(function () {
         if(localStorage.getItem('nameper')==null){
           $('#loginm').modal('open');
         }else{
            if ($("#comentproduc").val()!="") {
            if($('#rate').swidget().value()>0){
                 addcomentario($("#idclient").val(),$("#comentproduc").val(),$('#rate').swidget().value())
            }
            else{
                 M.toast({html: "Verifica si has puntuado, eso nos ayuda demasiado", classes: 'rounded  deep-orange'});
            }
        }
        else{
              M.toast({html: "Tu comentario esta vacio", classes: 'rounded  red'});
        }
           
         }
      });
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
      $("#img").change(function(event) {
                 document.getElementById("imgcontainer").removeAttribute('src');

                    $("#vista-previa").html('');
                            var archivos=document.getElementById('file').files;
                    var navegador=window.URL || window.webkitURL;

                    for (var i = 0; i < archivos.length; i++) {

                        var size=archivos[i].size;
                        var type=archivos[i].type;
                        var name=archivos[i].name;
                        
                            var objeto_url=navegador.createObjectURL(archivos[i]);

                     $("#vista-previa").append('<img src="'+objeto_url+'" id="imgcontainer" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
                   }
                });
            $("#imge").change(function(event) {
                 document.getElementById("imgcontainere").removeAttribute('src');

                    $("#vista-previae").html('');
                            var archivos=document.getElementById('filee').files;
                    var navegador=window.URL || window.webkitURL;

                    for (var i = 0; i < archivos.length; i++) {

                        var size=archivos[i].size;
                        var type=archivos[i].type;
                        var name=archivos[i].name;
                        
                            var objeto_url=navegador.createObjectURL(archivos[i]);

                     $("#vista-previae").append('<img src="'+objeto_url+'" id="imgcontainere" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
                   }
                });

            $('#frmregister').submit(function() {
              if(Validate(1)==idinput.length){
                var formData = new FormData(document.getElementById("frmregister"));
                  formData.append("dato", "valor");
                         $.ajax({
                        type: "POST",
                        url: "../controller/cclienta.php?btnsetData=setRegister", 
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                         var datos = eval(resp);
                               if(datos[0].estado==1){
                                localStorage.setItem('client',datos[0].id);
                                localStorage.setItem('nameper',datos[0].nombre);
                                localStorage.setItem('newuser',1);
                                location.reload();
                                 
                               }else if(resp=="x"){
                                M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});
                                
                               }
                               else{
                                M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                                
                               }
                                 
                        }       
                            
                    });
            }
                return false;
            });



            $('#formclie').submit(function() {
               if(Validate(0)==idinpute.length){
                var formData = new FormData(document.getElementById("formclie"));
                        $.ajax({
                        type: "POST",
                        url: "../controller/cclienta.php?updateData=updatepro", 
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                           var datos = eval(resp);
                               if(datos[0].estado==1){
                                localStorage.setItem('client',datos[0].id);
                                localStorage.setItem('nameper',datos[0].nombre);
                                localStorage.setItem('modificaperfil',1);
                                location.reload();
                      
                                cleanbox();
                               }else if(resp=="x"){
                                M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});
                                
                               }
                               else{
                                M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                               } 
                           }
                            
                    });
                
              }
              return false;
            });


            var idinpute = ['imge','fullnamee','emaile','usere','passe'];
            var idinputerrore= ['txtimge','txtfullnamee','txtemaile','txtusere','txtpasse'];
            var idinput = ['img','fullname','emailr','user','pass'];
            var idinputerror= ['txtimg','txtfullname','txtemail','txtuser','txtpass'];

            var Validate = (type) =>{
              var validate=0, html="", count=0, counte=0;
              if(type==1){
                    idinput.forEach(names => {
                      
                   if($("#"+names).val()!=0){
                    
                     validate+=1;
                     html="Listo";
                     //alert($("#"+names).val());
                     $("#"+idinputerror[count]).html($("#"+names).attr('title'));
                     $("#"+idinputerror[count]).removeClass('errorinputs');
                     $("#"+idinputerror[count]).addClass('successinputs');
                     
                   }
                   else{  
                    //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
                    $("#"+idinputerror[count]).html($("#"+names).attr('title')); 
                    $("#"+idinputerror[count]).removeClass('successinputs');      
                     $("#"+idinputerror[count]).addClass('errorinputs'); 
                   }
                   count++;
                });
              }
              else{
               idinpute.forEach(names => {
                   if($("#"+names).val()!=0){
                    validate+=1;
                     $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
                     $("#"+idinputerrore[counte]).removeClass('errorinputs');
                     $("#"+idinputerrore[counte]).addClass('successinputs');
                   }
                   else{
                     $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
                     $("#"+idinputerrore[counte]).removeClass('successinputs');
                     $("#"+idinputerrore[counte]).addClass('errorinputs');
                   }
                    counte++;
                });

              }

                return validate;
            }

            var cleanbox=()=>{
            idinputerror.forEach(names => {
              $("#"+names).removeClass('successinputs');      
            });
            idinputerrore.forEach(names => {
              $("#"+names).removeClass('successinputs');      
            });
            }
});




function fechaevent() {
  var date = new Date();
      var mes='';
    if ((date.getMonth()+1)<= 9) {
      mes='0'+(date.getMonth()+1);
    }
    else{
        mes=(date.getMonth()+1);
    }
    getevents(date.getFullYear()+'-'+mes+'-'+date.getDate()); 
}

function getevents(fecha) {
  var dataString = 'fecha='+fecha;
  var contevent=0;
  var html='';
  // alert(fecha);
         $.ajax({
            type: "POST",
            url: "../controller/cevent.php?btngetevent=getEventT",
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              if(respu.length!=0){
                  for (var i = 0; i < respu.length; i++) {
                    contevent++;
                 html+='<div class="card row">';
                   html+='<div class=" col s12 m6 l6 center-align">';
                     html+='<br><img src="../view/imgevents/'+respu[i].img+'" style="width: 100%; height:200px;"><br>';
                   html+='</div>';
                   html+='<div class="col s12 m6 l6 center-align">';
               
                      html+='<p><h6>'+respu[i].name_e+'</h6></p>';
                      html+='<blockquote><p style="font-style: italic;">'+respu[i].details+'</p></blockquote>';
                      html+='<p>Inicia '+respu[i].releasedate+' y finaliza '+respu[i].finishdate+'</p>';
                    

                   html+='</div>';
                    html+='<div class=" col s12 m12 l12 center-align">&nbsp;';
                     html+='</div>';
                 html+='</div>';
               }
               $("#container-event").html(html);
               $(".eventsnum").html(contevent);
            }
             else{
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="https://media2.giphy.com/media/If0TFnUk0jRQrW2jgm/giphy.gif" style="height:350px; width:350px;"/>'
                html+='<h3 style="margin-top:0px;">Por el momemento no hay ningun evento programado</h3>';
                 html+='</div>';
              $("#container-event").html(html);
              $(".eventsnum").html(contevent);
             }
          }
          });
}

function addcomentario(idcliente,comentario,valoracion) {
    var obj = JSON.parse(localStorage.getItem('ProductC'));
    var dataString = 'idcliente='+idcliente+'&idprod='+obj.id+'&comentario='+comentario+'&valoracion='+valoracion;
    //alert(dataString);
    $.ajax({
            type: "POST",
            url: "../controller/cclient.php?btnaddcoment=setcoment", 
            data: dataString,
            success: function(resp) {
                //alert(resp);
                if(resp==1){
                    getcoments(obj.id);
                } else if (resp==2) {
                   M.toast({html: "¡Usted no posee permiso para comentar en este producto!", classes: 'rounded deep-orange'});
                }      
            }
        });
}



function mybusii(id) {
 
		var dataString = 'id='+id;
		
	     $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetpro=getDatac", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var html='';
            	 
            	for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="../view/imgdetails/'+respu[i].img+'" style="height:175px; width:80%;"></center>';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                         html+='<span class="card-title" style="font-size: 25px; font-weight: bold;">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" && parseFloat(respu[i].discount)!=0){
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-new"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='</div>'; 
                                          }
                                      html+='</div>';
                                    html+='</div>';
                                  html+='</div>';
                              
            	}
            	if(respu.length==0){
                $("#contentpage").addClass('hide');
            		html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="https://www.noooquebarato.com/public/images/loader.gif" style="height:350px; width:350px;"/>'
                html+='<h3 style="margin-top:0px;">Por el momento estamos tratando de comenzar dentro de poco traeremos algo interesante para ti</h3>';
                 html+='</div>';
                 $("#none").html(html);
            	}
            	else{
                $("#productstore").html(html);
              }
            	

            	
            	
            }
            });
}

function mybusiibyrange(id,range) {
    var dataString = 'id='+id+'&range='+range;
    
       $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetpro=getDatacbr", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';
               
              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="../view/imgdetails/'+respu[i].img+'" style="height:175px; width:80%;"></center>';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                         html+='<span class="card-title " style="font-size: 25px; font-weight: bold;">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" && parseFloat(respu[i].discount)!=0){
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-new"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='</div>'; 
                                          }
                                      html+='</div>';
                                    html+='</div>';
                                  html+='</div>';
                              
              }
              if(respu.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<h1>No tenemos productos con estos precios</h1>';
                 html+='</div>';
              }
              //alert(html);
              $("#productstore").html(html);
                  // alert(html);
              //$("#idbusinp").val(id);
              
              
            }
            });
}

function mybusiibytype(id,type) {
    var dataString = 'id='+id+'&type='+type;
    
       $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetprotp=getDatactp", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';
               
              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="../view/imgdetails/'+respu[i].img+'" style="height:175px; width:80%;"></center>';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                         html+='<span class="card-title" style="font-size: 25px; font-weight: bold;">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" && parseFloat(respu[i].discount)!=0){
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-new"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='</div>'; 
                                          }
                                      html+='</div>';
                                    html+='</div>';
                                  html+='</div>';
                              
              }
              if(respu.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<h1>No tenemos productos con estos precios</h1>';
                 html+='</div>';
              }
              //alert(html);
              $("#productstore").html(html);
                  // alert(html);
              //$("#idbusinp").val(id);
              
              
            }
            });
}

function mybusiibytypeandcat(id,type,cat) {
    var dataString = 'id='+id+'&type='+type+'&cat='+cat;
    
       $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetprotpcat=getDatactpandcat", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';
               
              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="../view/imgdetails/'+respu[i].img+'" style="height:175px; width:80%;"></center>';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                         html+='<span class="card-title" style="font-size: 25px; font-weight: bold;">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" && parseFloat(respu[i].discount)!=0){
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price center-align">';
                                                html+='<span class="price price-new"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='</div>'; 
                                          }
                                      html+='</div>';
                                    html+='</div>';
                                  html+='</div>';
                              
              }
              if(respu.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<h1>No tenemos productos con estos precios</h1>';
                 html+='</div>';
              }
              //alert(html);
              $("#productstore").html(html);
                  // alert(html);
              //$("#idbusinp").val(id);
              
              
            }
            });
}


function gettypes(id) {
   var dataString = 'id='+id;
    
       $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngettype=getDatatype", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';
                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group1" onclick="mybusii('+id+');getcategories('+id+');" type="radio" checked  />';
                    html+='<span>Todos</span>';
                  html+='</label>';
                html+='</p>';
              for (var i = 0; i < respu.length; i++) {

                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group1" onclick="getcategoriesbytype('+id+','+respu[i].id_tpro+');" type="radio"  />';
                    html+='<span>'+respu[i].name_tpro+'</span>';
                  html+='</label>';
                html+='</p>';

              }
              
               $("#types").html(html);
            }
          });
}

function getcategories(id) {
    
  $("#cate").addClass('hide');
}

function getcategoriesbytype(id,idtype) {
  mybusiibytype(id,idtype);
  $("#cate").removeClass('hide');
   var dataString = 'id='+id+'&type='+idtype;
    
       $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetcategoriesbtype=getDatacategoriesbytype", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';
                
              for (var i = 0; i < respu.length; i++) {

                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group2" type="radio" onclick="mybusiibytypeandcat('+id+','+idtype+','+respu[i].id_cat+')"  />';
                    html+='<span>'+respu[i].name_cat+'</span>';
                  html+='</label>';
                html+='</p>';

              }
              
               $("#categories").html(html);
            }
          });
}


function viewproduct(id,name,img,desc){
      //$("#namepromo").html(name);
     
      var obj = new Object();
           obj.id = id;
           obj.name  = name;
           obj.img  = img;
           obj.desc  = desc;
       var jsonString= JSON.stringify(obj);
      localStorage.setItem('ProductC',jsonString);
      Colors(obj.id);
      getcoments(obj.id);
}

function getcoments(id) {
    var dataString = 'id='+id;
    $("#comentinput").html('');
    $.ajax({
            type: "POST",
            url: "../controller/cclient.php?btngetcoment=getcoment", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                for (var i = 0; i < respu.length; i++) {
                  html+='<div class="col s10 m10 s10 offset-s1 offset-m1 offset-l1">';
              html+='<div class="card   lighten-5" id="card'+respu[i].id_prev+'">';
                html+='<div class="card-content white-text row">';
                    html+='<div class="col l2 m2 s12 center-align black-text">';
                      html+='<img class="circle" style="height:75px; width:80;"  src="../view/imguser/'+respu[i].img+'" alt="..."><br>'+respu[i].fullname_cl;
                    html+='</div>';
                    html+='<div class="col l10 m10 s12 black-text center-align">';
                  
                      html+=' <h6>'+respu[i].coment+'</h6>';
                   
                    html+='</div>';
                    html+='<div class="col l12 m12 s12 black-text">';
                      html+='<div class="row">';
                        html+='<div class="col l6 m6 s6 center-align">';
                        if(respu[i].rating>2.5)
                        {
                              
                              html+='<span class="material-input">VALORACIÓN<div class="rating" style="color:green;" id="ratess"><i class="material-icons">star</i> '+respu[i].rating+'</div></span>';
                        }
                        else{
                              
                              html+='<span class="material-input">VALORACIÓN<div class="rating" style="color:red;" id="ratess"><i class="material-icons">star</i> '+respu[i].rating+'</div></span>';

                        }
                        html+='</div>';
                        html+='<div class="col l6 m6 s6 right-align">';
                         html+='<a onclick="reactions('+$("#idclient").val().trim()+','+respu[i].id_prev+')" class="btn btn-xs red">';
                                                     html+='<i class="material-icons">favorite</i> '+respu[i].likes+'';
                                                 html+='</a>';
                        html+='</div>';
                      html+='</div>';
                    html+='</div>';
                html+='</div>';
            html+='</div>';                       
        html+='</div>';
        html+='<div class="col s12 m12 s12" id="contestacion'+respu[i].id_prev+'">';
        
        html+='</div>';
        getreply(respu[i].id_prev);           
                }
                
                $("#comentinput").html(html);
            }
        });
}

function getreply(idcoment){
 
  var dataString = 'id='+idcoment;
  $.ajax({
            type: "POST",
            url: "../controller/cmonitoringbybus.php?btngetreply=getreply", 
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
               var html='';
                for (var i = 0; i < respu.length; i++) {
                html+='<div class="col s10 m10 s10 offset-s1 offset-m1 offset-l1">';
              html+='<div class="card  brown lighten-5" id="card'+respu[i].id_reply+'">';
                html+='<div class="card-content white-text row">';
                    html+='<div class="col l2 m2 s12 center-align black-text">Emprendedor<br>';
                      html+='<img class="circle" style="height:75px; width:80;"  src="../view/imguser/'+respu[i].imagen+'" alt="..."><br>'+respu[i].fullname_user;
                    html+='</div>';
                    html+='<div class="col l10 m10 s12 black-text center-align">';
                  
                      html+=' <h6 style="margin-top:2rem;">'+respu[i].reply+'</h6>';
                   
                    html+='</div>';
                html+='</div>';
            html+='</div>';                       
        html+='</div>';
              }
             
            $("#contestacion"+idcoment+"").html(html);
            }
          });
  
}


function Colors(id) {
            var dataString = 'id='+id;
           $.ajax({
            type: "POST",
            url: "../controller/cclient.php?btngetData=getDetailsColor", 
            data: dataString,
            success: function(resp) {
                  var respu = eval(resp);
                  var html='';
                   
                  for (var i = 0; i < respu.length; i++) {
                        
                        if(i==0){

                              html+='<div class="col col l2 m4 s4 "><img onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+');" src="../view/imgdetails/'+respu[i].img+'" style="height:60px;" class="responsive-img" /></div>';

                              productDet(respu[i].id_pro,respu[i].id_color,respu[i].code_color,respu[i].name_pro,respu[i].name_color,respu[i].id_material,respu[i].id_size);
                              
                        }
                        else{
                              html+='<div class="col col l2 m4 s4"><img onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+');" src="../view/imgdetails/'+respu[i].img+'" style="height:60px;" class="responsive-img" /></div>';
                        }
                        
                  }

                  $("#colors").html(html);
               
            }
        });
       }

       function productDet(id,idcolor,code,pro,color,material,talla) {
            $("#producttittle").html(pro);
            getmaterials(id,idcolor,code,color);
            getDataProductD(id,idcolor,material,talla,color);
            getsizes(id,material,idcolor,color);
            
            
       }


function getmaterials(id,color,code,namecolor) {
      var dataString = 'id='+id+'&idcolor='+color;
      $("#contsize").html('');
      $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetmaterials=getDatamc", 
            data: dataString,
            success: function(resp) {
                  // alert(resp);
                  var respu = eval(resp);
                  var html='';
                  for (var i = 0; i < respu.length; i++) {
                        // html+='<button class="btn"  >'+respu[i].name_mat+'</button>&nbsp;';
                        html+='<a href="#!" class="col col l2 m4 s4"   onclick="getsizes('+id+','+respu[i].id_material+','+color+','+String("'"+namecolor+"'")+')">';
                        html+='<div class="chip chips-initial" >';
                        html+='<span style="height:5px; width:30px; background-color:'+code+' ;" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;';
                            html+=respu[i].name_mat;
                          html+='</div></a>&nbsp;';
                        // html+='<a href="#!"   onclick="getsizes('+id+','+respu[i].id_material+','+color+')"><span id="material'+respu[i].id_material+'" class="badge badge-pill badge-secondary" style="background-color:'+code+' ;">'+respu[i].name_mat+'</span></a>&nbsp;';
                  }
                  $("#contmat").html(html);
            }});
}

function reactions(id_cl,id_prev) {
      var dataString = 'id_cl='+id_cl+'&id_prev='+id_prev;
      var obj = JSON.parse(localStorage.getItem('ProductC'));
      $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btnreaction=setreaction", 
            data: dataString,
            success: function(resp) {
                   if (resp==1) {


                   M.toast({html: "<i class='small material-icons'>thumb_up</i>", classes: 'rounded  blue'});
                 }else{
                  M.toast({html: "<i class='small material-icons'>thumb_down</i>", classes: 'rounded  red'});
                 }
                  getcoments(obj.id);
            }});
}

function getsizes(id,material,color,namecolor) {
      var dataString = 'id='+id+'&idcolor='+color+'&idmat='+material;
      $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetsizes=getDatazc", 
            data: dataString,
            success: function(resp) {
                  // alert(resp);
                  var respu = eval(resp);
                  var html='';
                  for (var i = 0; i < respu.length; i++) {
                        if(i==0){
                              getDataProductD(id,color,material,respu[i].id_size,namecolor);
                        }
                         html+='<a href="#!" class="col col l4 m6 s6" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+','+String("'"+namecolor+"'")+');">';
                        html+='<div class="chip" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div></a>';
                        // html+='<a href="#!" id="size'+respu[i].id_size+'" ><span class="badge badge-pill badge-secondary">'+respu[i].number_size+'-'+respu[i].name_size+'</span></a>&nbsp;';
                  }
                  $("#contsize").html(html);
            }});
}

function getDataProductD(id,color,material,size,namecolor) {
      var dataString = 'id='+id+'&idcolor='+color+'&idmat='+material+'&idsiz='+size;
      $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetProdsc=getDataProcCli", 
            data: dataString,
            success: function(resp) {
                  var respu = eval(resp);
                  var htmlimg='';
                  
                  for (var i = 0; i < respu.length; i++) {
                        
                            $("#pfidprices").val(respu[i].id_prices);
                    $("#pfidprod").val(id);
                    $("#pfcolor").val(color);
                    $("#pfmaterial").val(material);
                    $("#pfsize").val(size);
                    $("#priceprosindes").html("");
                              $("#quantity").html(respu[i].quantity);
                              $("#pdet").html(respu[i].name_pro+" color "+namecolor+" "+respu[i].descr_pro);
                              $("#discount").val(respu[i].discount);
                              if(respu[i].quantity<1){
                                $("#pricepro").html("");
                                $(".btnact").addClass('hide');
                                $("#priceprosindes").html("Agotado");

                              } else{
                                  $(".btnact").removeClass('hide');
                                  if(respu[i].discount==0||respu[i].discount==""){
                                        $("#pricepro").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2));
                                        $("#priceprosindes").html("");
                                        $("#pfprices").val((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2));
                                  }
                                  else{
                                        $("#priceprosindes").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2));
                                        $("#pricepro").html("$"+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*respu[i].discount)).toFixed(2));
                                         $("#pfprices").val(((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*respu[i].discount)).toFixed(2));
                                  }
                              }
                              // $("#discodeta").html(respu[i].discount);
                               $("#imginitial").attr({
                                     src: '../view/imgdetails/'+respu[i].img
                               });
                              // $("#imgpro").html(htmlimg);
                  }
            }
        });
}

function fillboxprofile(id) {
  var dataString = 'id='+id;
      $.ajax({
            type: "POST",
            url: "../controller/cclienta.php?btngetDatacli=getdataprofile", 
            data: dataString,
            success: function(resp) {
              //alert(resp);
              var respu = eval(resp);
                  for (var i = 0; i < respu.length; i++) {
                    $("#id").val(respu[0].id_cl);
                    $("#fullnamee").val(respu[0].fullname_cl);
                    $("#imgcontainere").attr("src",'../view/imguser/'+respu[0].imagen);
                    $("#imge").val(respu[0].imagen);
                    $("#emaile").val(respu[0].email_cl);
                    $("#usere").val(respu[0].user_cl);
                    $("#passe").val(respu[0].pass_cl);
                  }
            }
          });
}