
$(document).ready(function($) {

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
        mybusiibyrange(obj.id,$("#range").val());
        
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
                alert("verifica si has putuando el producto esto nos sirve para mejorar como negocio");
            }
        }
        else{
              alert("tu comentatio esta vacio");
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

    $('#formclie').submit(function() {
   if(Validate(0)==idinpute.length){
    var formData = new FormData(document.getElementById("formclie"));
            $.ajax({
            type: "POST",
            url: "../controller/cclienta.php?updateData=update", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {

                   if(resp==1){
                    M.toast({html: "¡Se ha modificado al usuario exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
          
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




var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==0){
   idinpute.forEach(names => {
       if($("#"+names).val()!=0){
        validate+=1;
         $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
         $("#"+idinputerrore[counte]).removeClass('red-text');
         $("#"+idinputerrore[counte]).addClass('green-text');
       }
       else{
         $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
         $("#"+idinputerrore[counte]).removeClass('green-text');
         $("#"+idinputerrore[counte]).addClass('red-text');
       }
        counte++;
    });

  }

    return validate;
}

var cleanbox=()=>{
idinputerrore.forEach(names => {
  $("#"+names).removeClass('green-text');      
});
}
});

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
                if(resp!=0){
                    getcoments(obj.id);
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
                                        html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:125px;">';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content">';
                                         html+='<span class="card-title">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                                                html+='<div class="price">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price">';
                                                html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
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
                                        html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:125px;">';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content">';
                                         html+='<span class="card-title">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                                                html+='<div class="price">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price">';
                                                html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
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
                                        html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:125px;">';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content">';
                                         html+='<span class="card-title">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                                                html+='<div class="price">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price">';
                                                html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
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
                                        html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:125px;">';
                                       
                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content">';
                                         html+='<span class="card-title">'+respu[i].name_pro+'</span>';
                                         if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                                                html+='<div class="price">';
                                                html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                                html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                                html+='</div>';  
                                          }
                                          else{
                                                html+='<div class="price">';
                                                html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
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
                         html+='<a href="#pablo" class="btn btn-xs red">';
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
                         html+='<a href="#!" class="col l2 m4 s4" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+','+String("'"+namecolor+"'")+');">';
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

                              $("#quantity").html(respu[i].quantity);
                              $("#pdet").html(respu[i].name_pro+" color "+namecolor+" "+respu[i].descr_pro);
                              $("#discount").val(respu[i].discount);
                              if(respu[i].discount==0||respu[i].discount==""){
                                    $("#pricepro").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)));
                        $("#pfprices").val((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)))
                              }
                              else{
                                    $("#priceprosindes").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)));
                                    $("#pricepro").html("$"+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*respu[i].discount)));
                        $("#pfprices").val(((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*respu[i].discount)))
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