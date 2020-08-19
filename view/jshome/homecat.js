

var activemod=0,activemodm=0;
$(document).ready(function(){
              fechaevent();
              categories();
              business();
              producttype();
              gettypes();
              getcategories();

              var obj = JSON.parse(localStorage.getItem('Store'));
                    $("#range").change(function(event) {

                        if($("#range").val()==0){
                          productbybusiness();
                        }
                        else{
                          mybusiibyrange($("#range").val());
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
                M.toast({html: "¡Verifica si has puntuado, eso nos ayuda demasiado!", classes: 'rounded  deep-orange'});
            }
        }
        else{
              M.toast({html: "Tu comentario esta vacio", classes: 'rounded  red'});
        }

         }
      });

          if(localStorage.getItem('activemod')==1){
            $("#modpage").attr('checked',true);
              activemod=1;
              $(".typescont").addClass('hide');
              $("#business").addClass('hide');
              $("#container").removeClass('container');
              $("#contprod").removeClass('hide');
              productbybusiness();
          }else{
              $(".typescont").removeClass('hide');
              $("#business").removeClass('hide');
              categories();
              business();
              producttype();
               gettypes();
              getcategories();
          }

          $("#modpage").change(function(event) {

            if(activemod==0){

              localStorage.setItem('activemod',1);
              activemod++;
              $("#contbusi").removeClass('fadeInUp');
              $("#contbusi").addClass('fadeOutLeft');
              $(".typescont").addClass('hide');
              $("#business").addClass('hide');
               $("#container").removeClass('container');
              $("#contprod").removeClass('hide');
              productbybusiness();
            }
            else{

              localStorage.setItem('activemod',0)
              activemod=0;
              $("#container").addClass('container');
              $("#contprod").addClass('hide');
              $("#contbusi").removeClass('fadeOutLeft');
              $("#contbusi").addClass('fadeInUp');
              $(".typescont").removeClass('hide');
              $("#business").removeClass('hide');

            }
          });



          $("#modpagem").change(function(event) {

            if(activemodm==0){

              localStorage.setItem('activemod',1);
              activemodm++;
              $("#contbusi").removeClass('fadeInUp');
              $("#contbusi").addClass('fadeOutLeft');
              $(".typescont").addClass('hide');
              $("#business").addClass('hide');
               $("#container").removeClass('container');
              $("#contprod").removeClass('hide');
              productbybusiness();
            }
            else{

              localStorage.setItem('activemod',0)
              activemodm=0;
              $("#container").addClass('container');
              $("#contprod").addClass('hide');
              $("#contbusi").removeClass('fadeOutLeft');
              $("#contbusi").addClass('fadeInUp');
              $(".typescont").removeClass('hide');
              $("#business").removeClass('hide');

            }
          });





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
            url: "controller/cevent.php?btngetevent=getEventT",
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              if(respu.length!=0){
                  for (var i = 0; i < respu.length; i++) {
                    contevent++;
                 html+='<div class="card row">';
                   html+='<div class=" col s12 m6 l6 center-align">';
                     html+='<br><img src="view/imgevents/'+respu[i].img+'" style="width: 100%; height:200px;"><br>';
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
                html+='<h3 style="margin-top:0px;">Por el momento no hay ningún evento programado</h3>';
                 html+='</div>';
              $("#container-event").html(html);
              $(".eventsnum").html(contevent);
             }
            }
          });
}

function gettypes() {


       $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataProductType",
            success: function(resp) {
              var respu = eval(resp);
              var html='';
                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group1" onclick="productbybusiness();" type="radio" checked  />';
                    html+='<span>Todos</span>';
                  html+='</label>';
                html+='</p>';
              for (var i = 0; i < respu.length; i++) {

                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group1" onclick="productbybusinesstype('+respu[i].id_tpro+');" type="radio"  />';
                    html+='<span>'+respu[i].name_tpro+'</span>';
                  html+='</label>';
                html+='</p>';

              }

               $("#typeshome").html(html);
            }
          });
}



function getcategories() {



       $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataCategories",
            success: function(resp) {
              var respu = eval(resp);
              var html='';

              for (var i = 0; i < respu.length; i++) {

                html+='<p class="animated zoomIn">';
                  html+='<label>';
                    html+='<input class="with-gap" name="group1" type="radio" onclick="productbybusinesscat('+respu[i].id_cat+');"  />';
                    html+='<span>'+respu[i].name_cat+'</span>';
                  html+='</label>';
                html+='</p>';

              }

               $("#categorieshome").html(html);
            }
          });
}

function viewstore(id,nombre, description){
    var obj = new Object();
     obj.id = id;
     obj.name  = nombre;
     obj.des  = description;
     var jsonString= JSON.stringify(obj);
      location.href="store/";
      localStorage.setItem('Store',jsonString);
}

var business = () =>{
  var html='';
  var htmlcarru='';

          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHome",
            success: function(resp) {
            var values = eval(resp);
             // alert(resp);
             for (var i = 0; i < values.length; i++) {

                html+='<div class="col l4 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<br><center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 175px; width: 80%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content  center-align">';
                    // html+='<form><p class="clasificacion">';
                    //     html+='<input id="radio1'+values[i].id_bus+'" id_bus type="radio" name="estrellas" value="5">';
                    //     html+='<label for="radio1'+values[i].id_bus+'">★</label>';
                    //    html+='<input id="radio2'+values[i].id_bus+'" type="radio" name="estrellas" value="4">';
                    //     html+='<label for="radio2'+values[i].id_bus+'">★</label>';
                    //     html+='<input id="radio3'+values[i].id_bus+'" type="radio" name="estrellas" value="3">';
                    //     html+='<label for="radio3'+values[i].id_bus+'">★</label>';
                    //      html+='<input id="radio4'+values[i].id_bus+'" type="radio" name="estrellas" value="2">';
                    //     html+='<label for="radio4'+values[i].id_bus+'">★</label>';
                    //     html+='<input id="radio5'+values[i].id_bus+'" type="radio"  name="estrellas" value="1">';
                    //     html+='<label for="radio5'+values[i].id_bus+'">★</label>';
                    // html+='</p></form><p id="valoracionte'+values[i].id_bus+'"><p>';
                    //                         getvaloration(values[i].id_bus);
                     html+='<h4 class="card-title" style="margin-top:-1rem; font-size: 25px; font-weight: bold;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate" style="font-style:oblique;">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!" class="btn"  onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';
              }


             $("#contbusi").addClass('fadeOutLeft');

            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft');
              $("#contbusi").addClass('fadeInUp');

            }, 500);

            }
        });

}

var getvaloration = (idbus) =>{
  var dataString = 'idbus='+idbus;
    //alert(dataString);
    $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getrating",
            data: dataString,
            success: function(resp) {

              var values = eval(resp);
              var rating = parseInt(values[0].rating);
              console.log(rating);
              $("#valoracionte"+idbus+"").html(String(rating));
                      if(rating==5){
                        $('#radio1'+idbus+"'").attr('checked');
                      }
                      else if(rating==4){
                        $('#radio1'+idbus+"'").attr('checked');
                      }
                      else if(rating==3){
                        $('#radio1'+idbus+"'").attr('checked');
                      }
                      else if(rating==2){
                       $('#radio1'+idbus+"'").attr('checked');
                      }
                      else if(rating==1){
                        $('#radio1'+idbus+"'").attr('checked');
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
            url: "controller/cclient.php?btnaddcoment=setcoment",
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

var productbybusiness = () =>{

       $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetpro=getDataall",
            success: function(resp) {

              var respu = eval(resp);

              var html='';

              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="view/imgdetails/'+respu[i].img+'" style="height:175px; width: 80%;"></center>';

                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                          html+='<span class="rigth-align" >'+respu[i].name_bus+'</span>';
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
                $("#productbystore").html(html);
              }
            }
            });

}

var productbybusinesstype = (type) =>{
     var dataString = 'type='+type;
       $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetpro=getDataalltype",
            data: dataString,
            success: function(resp) {

              var respu = eval(resp);

              var html='';

              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="view/imgdetails/'+respu[i].img+'" style="height:175px; width: 80%;"></center>';

                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                          html+='<span class="rigth-align">'+respu[i].name_bus+'</span>';
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
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Por el momento no tenemos este tipo de producto</h3>';
                 html+='</div>';
                 $("#productbystore").html(html);
              }
              else{
                $("#productbystore").html(html);
              }
            }
            });

}


var productbybusinesscat = (cat) =>{
     var dataString = 'cat='+cat;
       $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetpro=getDataallcat",
            data: dataString,
            success: function(resp) {

              var respu = eval(resp);

              var html='';

              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="view/imgdetails/'+respu[i].img+'" style="height: 175px; width: 80%;"></center>';

                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                          html+='<span class="rigth-align">'+respu[i].name_bus+'</span>';
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
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Por el momento no tenemos productos en esta categoria</h3>';
                 html+='</div>';
                 $("#productbystore").html(html);
              }
              else{
                $("#productbystore").html(html);
              }
            }
            });

}

function mybusiibyrange(range) {
    var dataString = 'range='+range;

       $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetpro=getDatacbrhome",
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
              var html='';

              for (var i = 0; i < respu.length; i++) {
                                  html+='<div class="col s12 m6 l4 animated zoomIn">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<br><center><img src="view/imgdetails/'+respu[i].img+'" style="height: 175px; width: 80%;"></center>';

                                       html+='<a class="btn-floating halfway-fab waves-effect waves-light modal-trigger" href="#prodetails" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')"><i class="material-icons">reorder</i></a>';
                                      html+='</div>';
                                      html+='<div class="card-content center-align">';
                                      html+='<span class="rigth-align">'+respu[i].name_bus+'</span>';
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

              $("#productbystore").html(html);



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


function Colors(id) {
            var dataString = 'id='+id;
           $.ajax({
            type: "POST",
            url: "controller/cclient.php?btngetData=getDetailsColor",
            data: dataString,
            success: function(resp) {
                  var respu = eval(resp);
                  var html='';

                  for (var i = 0; i < respu.length; i++) {

                        if(i==0){

                              html+='<div class="col col l2 m4 s4 "><img onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+');" src="view/imgdetails/'+respu[i].img+'" style="height:60px;" class="responsive-img" /></div>';

                              productDet(respu[i].id_pro,respu[i].id_color,respu[i].code_color,respu[i].name_pro,respu[i].name_color,respu[i].id_material,respu[i].id_size);

                        }
                        else{
                              html+='<div class="col col l2 m4 s4"><img onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+');" src="view/imgdetails/'+respu[i].img+'" style="height:60px;" class="responsive-img" /></div>';
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
            url: "controller/cuserhome.php?btngetmaterials=getDatamc",
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
            url: "controller/cuserhome.php?btnreaction=setreaction",
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
            url: "controller/cuserhome.php?btngetsizes=getDatazc",
            data: dataString,
            success: function(resp) {
                  // alert(resp);
                  var respu = eval(resp);
                  var html='';
                  for (var i = 0; i < respu.length; i++) {
                        if(i==0){
                              getDataProductD(id,color,material,respu[i].id_size,namecolor);
                        }
                         html+='<a href="#!" class="col l4 m6 s6" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+','+String("'"+namecolor+"'")+');">';
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
            url: "controller/cuserhome.php?btngetProdsc=getDataProcCli",
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
                                     src: 'view/imgdetails/'+respu[i].img
                               });
                              // $("#imgpro").html(htmlimg);
                  }
            }
        });
}

function getcoments(id) {
    var dataString = 'id='+id;
    $("#comentinput").html('');
    $.ajax({
            type: "POST",
            url: "controller/cclient.php?btngetcoment=getcoment",
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
                      html+='<img class="circle" style="height:75px; width:80;"  src="view/imguser/'+respu[i].img+'" alt="..."><br>'+respu[i].fullname_cl;
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
            url: "controller/cmonitoringbybus.php?btngetreply=getreply",
            data: dataString,
            success: function(resp) {
              var respu = eval(resp);
               var html='';
                for (var i = 0; i < respu.length; i++) {
                html+='<div class="col s10 m10 s10 offset-s1 offset-m1 offset-l1">';
              html+='<div class="card  brown lighten-5" id="card'+respu[i].id_reply+'">';
                html+='<div class="card-content white-text row">';
                    html+='<div class="col l2 m2 s12 center-align black-text">Emprendedor<br>';
                      html+='<img class="circle" style="height:75px; width:80;"  src="view/imguser/'+respu[i].imagen+'" alt="..."><br>'+respu[i].fullname_user;
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

function reactions(id_cl,id_prev) {
      var dataString = 'id_cl='+id_cl+'&id_prev='+id_prev;
      var obj = JSON.parse(localStorage.getItem('ProductC'));
      $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btnreaction=setreaction",
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


var businessbycat = (id) =>{
  var html='';
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHomebycat",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                html+='<div class="col l4 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<br><center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 175px; width: 80%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content center-align">';
                     html+='<h4 class="card-title" style="margin-top:-1rem; font-size: 25px; font-weight: bold;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate" style="font-style:oblique;">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!" class="btn" onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';
             }

             if(values.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Por el momento no tenemos negocios en esta categoria</h3>';
                 html+='</div>';
                 $("#business").html(html);
              }
              else{
                $("#business").html(html);
              }

            $("#contbusi").addClass('fadeOutLeft');

            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft');
              $("#contbusi").addClass('fadeInUp');
            }, 500);


            }
        });

}

var categories = () =>{
  var html="";
  var htmlnor='';
          $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataCategories",
            success: function(resp) {
            var values = eval(resp);
                html+='<a href="#!" onClick="business();" class=""> ';

                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle "><br>Todos';
                                html+='</div>';
                              html+='</div>';

                    html+='</a>';
                    htmlnor+='<a href="#!" onClick="business();" class="col s2"><img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle ">Todos';
                    htmlnor+='</a>';
               for (var i = 0; i< values.length; i++) {

                   html+='<a href="#!'+values[i][0]+'" onClick="businessbycat('+values[i][0]+');" class=""> ';

                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle "><br>'+values[i][1];
                                html+='</div>';
                              html+='</div>';

                    html+='</a>';
                    htmlnor+='<a href="#!'+values[i][0]+'" onClick="businessbycat('+values[i][0]+');" class="col s2"><img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle ">'+values[i][1];
                    htmlnor+='</a>';

               }
               $("#categoriesm").html(html);
               $("#categories").html(htmlnor);
            }
        });

}

var businessbyproductype= (id) =>{
  var html='';
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHomebytp",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                html+='<div class="col l4 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<br><center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 175px; width: 80%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content center-align">';
                     html+='<h4 class="card-title" style="margin-top:-1rem; font-size: 25px; font-weight: bold;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate" style="font-style:oblique;">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!" class="btn"  onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';
             }
            if(values.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Por el momento no tenemos ningun negocio en este tipo de producto</h3>';
                 html+='</div>';
                 $("#business").html(html);
              }
              else{
                $("#business").html(html);
              }
            $("#contbusi").addClass('fadeOutLeft');

            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft');
              $("#contbusi").addClass('fadeInUp');
            }, 500);


            }
        });

}

var producttype = () =>{
    var html="";
  var htmlnor='';

          $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataProductType",
            success: function(resp) {
            var values = eval(resp);
             html+='<a href="#!" onClick="business();" class=""> ';
              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle "><br>Todos';
                                html+='</div>';
                              html+='</div>';

                    html+='</a>';
                    htmlnor+='<a href="#!" onClick="business();" class="col s2"><img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle ">Todos';
                    htmlnor+='</a>';
               for (var i = 0; i< values.length; i++) {
                   html+='<a href="#!'+values[i][0]+'" onClick="businessbyproductype('+values[i][0]+');" class=""> ';

                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle "><br>'+values[i][1];
                                html+='</div>';
                              html+='</div>';

                    html+='</a>';
                    htmlnor+='<a href="#!'+values[i][0]+'" onClick="businessbyproductype('+values[i][0]+');" class="col s2"><img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle ">'+values[i][1];;
                    htmlnor+='</a>';
               }
               $("#productypem").html(html);
               $("#producttype").html(htmlnor);
            }
        });

}
