
$(document).ready(function($) {

      var obj = JSON.parse(localStorage.getItem('Store'));
             //alert(obj.name);
             $("#namebusi").html("<strong>"+obj.name+"</strong>");
             $("#title").html(obj.name);
             $("#titlebusi").html(obj.name);
             $("#description").html(obj.des);
            mybusii(obj.id);
      //alert(obj.id);
});







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
            		



                                  html+='<div class="col s12 m6 l3">';
                                    html+='<div class="card hoverable">';
                                      html+='<div class="card-image">';
                                        html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:175px;">';
                                       
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
            		alert("nada");
            	}
            	//alert(html);
            	$("#productstore").html(html);
                  // alert(html);
            	//$("#idbusinp").val(id);
            	
            	
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

      Colors(obj.id);
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
            // $("#producttittle").html(pro+' color '+color);
            getmaterials(id,idcolor,code);
            getDataProductD(id,idcolor,material,talla);
            getsizes(id,material,idcolor);
            
            
       }


function getmaterials(id,color,code) {
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
                        html+='<a href="#!" class="col col l2 m4 s4"   onclick="getsizes('+id+','+respu[i].id_material+','+color+')">';
                        html+='<div class="chip chips-initial" >';
                        html+='<span style="height:5px; width:30px; background-color:'+code+' ;" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;';
                            html+=respu[i].name_mat;
                          html+='</div></a>&nbsp;';
                        // html+='<a href="#!"   onclick="getsizes('+id+','+respu[i].id_material+','+color+')"><span id="material'+respu[i].id_material+'" class="badge badge-pill badge-secondary" style="background-color:'+code+' ;">'+respu[i].name_mat+'</span></a>&nbsp;';
                  }
                  $("#contmat").html(html);
            }});
}

function getsizes(id,material,color) {
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
                              getDataProductD(id,color,material,respu[i].id_size);
                        }
                         html+='<a href="#!" class="col l2 m4 s4" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+');">';
                        html+='<div class="chip" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div></a>&nbsp;';
                        // html+='<a href="#!" id="size'+respu[i].id_size+'" ><span class="badge badge-pill badge-secondary">'+respu[i].number_size+'-'+respu[i].name_size+'</span></a>&nbsp;';
                  }
                  $("#contsize").html(html);
            }});
}

function getDataProductD(id,color,material,size) {
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
                              $("#pdet").html(""+respu[i].descr_pro);
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