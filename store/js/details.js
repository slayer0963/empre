$(document).ready(function() {
	var obj = JSON.parse(localStorage.getItem('ProductC'));
	Colors(obj.id);

    getcoments(obj.id);



      $("#comentproduc").click(function () {
         if(localStorage.getItem('nameper')==""){
            $("#modallogin").modal('show');
         }
      });

      $("#publish").click(function () {
         if(localStorage.getItem('nameper')==""){
            $("#modallogin").modal('show');
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
});

function addcomentario(idcliente,comentario,valoracion) {
    var obj = JSON.parse(localStorage.getItem('ProductC'));
    var dataString = 'idcliente='+idcliente+'&idprod='+obj.id+'&comentario='+comentario+'&valoracion='+valoracion;
    alert(dataString);
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
                
                 html+='<div class="media-area">';
                                    
                                     html+='<div class="media">';
                                         html+='<a class="pull-left" href="#pablo">';
                                             html+='<div class="avatar">';
                                                 html+='<img class="img-circle img-responsive"" style="height:100%;" src="../view/imguser/'+respu[i].img+'" alt="...">';
                                             html+='</div>';
                                         html+='</a>';
                                         html+='<div class="media-body">';
                                             html+='<h4 class="media-heading">'+respu[i].fullname_cl+'<small>· 7 minutes ago</small></h4>';
                                             html+='<h6 class="text-muted"></h6>';
                                            html+=' <p>'+respu[i].coment+'</p>';
                                             html+='<div class="media-footer">';
                                                html+='<a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="" data-original-title="Reply to Comment">';
                                                     html+='<i class="material-icons">reply</i> Reply';
                                                 html+='</a>';
                                                 html+='<a href="#pablo" class="btn btn-danger btn-simple pull-right">';
                                                     html+='<i class="material-icons">favorite</i> '+respu[i].likes+'';
                                                 html+='</a>';
                                                 if(respu[i].rating>2.5){
                                                        html+='<span class="material-input">VALORACIÓN<div class="rating" style="color:green;" id="ratess">'+respu[i].rating+'</div></span>';
                                                 }
                                                 else{
                                                        html+='<span class="material-input">VALORACIÓN<div class="rating" style="color:red;" id="ratess">'+respu[i].rating+'</div></span>';

                                                 }
                                                  
                                             html+='</div>';
                                         html+='</div>';
                                     html+='</div>';
                                    
                                 html+='</div>';
                    
                }
                
                $("#comentinput").html(html);
            }
        });
}





function Colors(id) {
		var dataString = 'id='+id;
		var htmltab='';
		var contadors=0;
	     $.ajax({
            type: "POST",
            url: "../controller/cclient.php?btngetData=getDetailsColor", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var htmlca='';
            	 // alert(resp);
            	for (var i = 0; i < respu.length; i++) {
            		contadors++;
            		if(i==0){
            			htmlca+='<div class="tab-pane active text-center" id="product-page'+respu[i].id_color+'">';
                        htmlca+='<img src="../view/imgdetails/'+respu[i].img+'" style="height: 175px;"/>';
                       
                    htmlca+='</div>';



                    htmltab+='<li class="active">';
						htmltab+='<a href="#product-page'+respu[i].id_color+'" onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+')" role="tab" data-toggle="tab" aria-expanded="false">';
							htmltab+='<img src="../view/imgdetails/'+respu[i].img+'"/>';
						htmltab+='</a>';
					htmltab+='</li>';
					productDet(respu[i].id_pro,respu[i].id_color,respu[i].code_color,respu[i].name_pro,respu[i].name_color,respu[i].id_material,respu[i].id_size);
					
            		}
            		else{
            			htmlca+='<div class="tab-pane " id="product-page'+respu[i].id_color+'">';
                        htmlca+='<img src="../view/imgdetails/'+respu[i].img+'" style="height: 175px;"/>';
                        
                    htmlca+='</div>';



                    htmltab+='<li class="">';
						htmltab+='<a href="#product-page'+respu[i].id_color+'" onclick="productDet('+respu[i].id_pro+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].name_color+"'")+','+respu[i].id_material+','+respu[i].id_size+');" role="tab" data-toggle="tab" aria-expanded="false">';
							htmltab+='<img src="../view/imgdetails/'+respu[i].img+'"/>';
						htmltab+='</a>';
					htmltab+='</li>';
            		}
            		
            	}

            	$("#flexiselDemo1").html(htmltab);
            	$("#carru").html(htmlca);
            	$("#flexiselDemo1").flexisel({
					visibleItems: contadors,
		    		itemsToScroll: 1,
		    		animationSpeed: 400,
		            enableResponsiveBreakpoints: true,
		            responsiveBreakpoints: {
		                portrait: {
		                    changePoint:480,
		                    visibleItems: contadors
		                },
		                landscape: {
		                    changePoint:640,
		                    visibleItems: contadors
		                },
		                tablet: {
		                    changePoint:768,
		                    visibleItems: contadors
		                }
		            }
		        });
            }
        });
	 }

	 function productDet(id,idcolor,code,pro,color,material,talla) {
	 	$("#producttittle").html(pro+' color '+color);
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
            		html+='<a href="#!"   onclick="getsizes('+id+','+respu[i].id_material+','+color+')"><span id="material'+respu[i].id_material+'" class="badge badge-pill badge-secondary" style="background-color:'+code+' ;">'+respu[i].name_mat+'</span></a>&nbsp;';
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
            		html+='<a href="#!" id="size'+respu[i].id_size+'" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+');"><span class="badge badge-pill badge-secondary">'+respu[i].number_size+'-'+respu[i].name_size+'</span></a>&nbsp;';
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
            		
				
					$("#quantity").html(respu[i].quantity);
					$("#pdet").html(""+respu[i].descr_pro);
					
					if(respu[i].discount==0||respu[i].discount==""){
						$("#pricepro").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)));
					}
					else{
						$("#priceprosindes").html("$"+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)));
						$("#pricepro").html("$"+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*respu[i].discount)));
					}
					// $("#discodeta").html(respu[i].discount);   
					// $("#imgpro").html(htmlimg);
            	}
            }
        });
}