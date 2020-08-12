$(document).ready(function() {

	consultcar(localStorage.getItem('client'));
  consultwish(localStorage.getItem('client'));
  

	$("#addcarr").click(function () {
        
        if(localStorage.getItem('nameper')==null){
            
            $('#loginm').modal('open');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "controller/cuserhome.php?btnsetshcar=setshcar", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
                
	            	if(resp==1){
	            		M.toast({html: '¡Producto agregado al carrito!', classes: 'rounded green'});
 						consultcar(localStorage.getItem('client'));
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: '¡El producto ya se encuentra en el carrito!', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		M.toast({html: '¡Estamos teniendo inconvenientes, inténtalo en otro momento!', classes: 'rounded orange'});
	            	}

	            }
	        });
	    }
     });


	$("#addwish").click(function () {
        
        if(localStorage.getItem('nameper')==null){
            
            $('#loginm').modal('open');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "controller/cuserhome.php?btnsetwish=setwish", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
	            	// alert(resp);
	            	if(resp==1){
	            		M.toast({html: '¡Producto agregado en mi lista de deseos!', classes: 'rounded green'});
 						consultwish(localStorage.getItem('client'));
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: '¡El producto ya se encuentra en la lista de deseos!', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		M.toast({html: '¡Estamos teniendo inconvenientes, inténtalo en otro momento!', classes: 'rounded orange'});
	            	}

	            }
	        });
	    }
     });
});

function deletecar(id_shp_c_d){
              
                     $.ajax({
                          type: "POST",
                          url: "controller/cuserhome.php?btnEliminar=eliminar&id_detalle_carrito="+id_shp_c_d, 
                      success: function(resp2) {
                        //alert(resp2);
                        if(resp2==1){
                          M.toast({html: "¡El producto se eliminó correctamente del carrito!", classes: 'rounded  green'});
                          consultcar(localStorage.getItem('client'));
                        }else if (resp2==0){
                          M.toast({html: "¡Hubo un problema al eliminar el prodcuto del carrito, inténtalo más tarde!", classes: 'rounded deep-orange'});

                          
                        }
                     
                      }   
                
                 });              
            
          }

function deletewish(id_detalle_wish){
              
                     $.ajax({
                          type: "POST",
                          url: "controller/cuserhome.php?btnEliminar=eliminarwish&id_detalle_wish="+id_detalle_wish, 
                      success: function(resp2) {
                        //alert(resp2);
                        if(resp2==1){
                          M.toast({html: "¡El producto se eliminó correctamente de la lista!", classes: 'rounded  green'});
                          consultwish(localStorage.getItem('client'));
                        }else if (resp2==0){
                          M.toast({html: "¡Hubo un problema al eliminar el producto del carrito, inténtalo más tarde!", classes: 'rounded deep-orange'});

                          
                        }
                     
                      }   
                
                 });              
            
          }

function consultcar(id){
	var dataString = 'id='+id;
   
    $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetcart=getcart", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                var cont=0, total=0;
                for (var i = 0; i < respu.length; i++) {
                	cont++;
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l1 center-align"><a href="#!" style="margin-top:2rem;" class="btn red" title="Remover"  onClick="deletecar('+String("'"+respu[i].id_shp_c_d+"'")+');"><i class="material-icons">remove_shopping_cart</i></a>  <br><br></div> <div class="col s12 m12 l2 center-align">';
                html+='<img src="view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
                html+='<div class="col s12 m12 l3 center-align"><h5>'+respu[i].name_pro+'</h5>';
                
                html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_color;
                          html+='</div>';
                          html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_mat;
                          html+='</div>';
                 html+='<div class="chip chips-initial" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div><br><br>';
                 
                html+='</div><div class="col s12 m12 l3 center-align stockec"><b>Stock: </b><i>'+ respu[i].tquantity+'</i><br>';
                          
                          html+='<b>Cantidad: </b><label style="font-size:17px;font-weight: bold;" id="cantidad'+i+'">'+ respu[i].quantity+'</label>&nbsp;&nbsp;';
                          html+='<br><br></div>';
                html+='<div class="col s12 m12 l1 center-align">Precio<br><label class="price-new right-align">$'+parseFloat(respu[i].precio).toFixed(2)+'</label><br><br></div><div class="col s12 m12 l2 center-align">Sub total<br><label class="price-new">$</label><label id="totalf'+i+'" class="right-align price-new">'+parseFloat(respu[i].precio*respu[i].quantity).toFixed(2)+'</label></div></div>';
              html+='</li> ';
              total+=(parseFloat(respu[i].precio)*respu[i].quantity);
					    
                }
                
                if(respu.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Carrito vacío</h3>';
                 html+='</div>';
                 $('.carocult').addClass('hide');
                 $("#cartcli").html(html);
                }
                else{
                  $('.carocult').removeClass('hide');
                  $("#cartcli").html(html);
                }
                $(".numbercar").html(cont);
                $("#totalshop").html("Total: $"+parseFloat(total).toFixed(2));
            }
        });
}

function consultwish(id){
	var dataString = 'id='+id;
   
    $.ajax({
            type: "POST",
            url: "controller/cuserhome.php?btngetwish=getwish", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                var cont=0, total=0,totdes=0, decuento=0;
                for (var i = 0; i < respu.length; i++) {
                	totdes=parseFloat(respu[i].sal_price)-(parseFloat(respu[i].sal_price)*parseFloat(respu[i].discount));
                	decuento=(parseFloat(respu[i].discount)*100);
                	cont++;
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l4 center-align">';
					      html+='<img src="view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
					      html+='<div class="col s12 m12 l4 center-align"><h5>'+respu[i].name_pro+'</h5>';
					      html+='<p>';
					      html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_color;
                          html+='</div>';
                          html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_mat;
                          html+='</div>';
					       html+='<div class="chip chips-initial" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div><br>';
                          	 if (decuento>0) {
                            html+='<span class="price-old">$'+ parseFloat(respu[i].sal_price).toFixed(2)+'</span>&nbsp;&nbsp;';
                   html+='<span class="price-new">$'+parseFloat(totdes).toFixed(2)+'</span><br><span class="price-new">'+decuento+'%</span>';
                          }else{

                   html+='<span class="price-new">$'+parseFloat(totdes).toFixed(2)+'</span><br><span class="price-new">'+decuento+'%</span>';
                          }
                             
                html+='</p></div>';
                html+='<div class="col s12 m12 l4 center-align"><a href="#!" style="margin-top:2rem;" title="Agregar al carrito" onClick="addcarfromwish('+respu[i].id_cl+','+respu[i].id_prices+','+respu[i].id_color+','+respu[i].id_mat+','+respu[i].id_size+','+totdes+','+respu[i].discount+','+respu[i].id_w_l_d+');" class="btn green"><i class="material-icons">add_shopping_cart</i></a>&nbsp;<a href="#!" style="margin-top:2rem;" class="btn red" title="Remover de mi lista de deseos" onClick="deletewish('+respu[i].id_w_l_d+');"><i class="material-icons">delete</i></a></div></div>';
                html+='</li> ';
					    total+=parseFloat(totdes);
                }
                
              if(respu.length==0){
                html+='<div class="col s12 m12 l12 animated zoomIn center-align">';
                html+='<img src="empty-box.png" style="width: 150px; height: 150px; margin-top: 4rem;"/>'
                html+='<h3 style="margin-top:0px;">Lista vacia</h3>';
                 html+='</div>';
                 $('.wiocult').addClass('hide');
                 $("#wishcli").html(html);
                }
                else{
                  $('.wiocult').removeClass('hide');
                  $("#wishcli").html(html);
                }
                //$(".numbercar").html(cont);
                $("#totalwish").html("Total: $"+parseFloat(total).toFixed(2));
            }
        });
}

function addcarfromwish(idcliente,pfidprices,pfcolor,pfmaterial,pfsize,pfprices,discount,idwish){
	$.ajax({
	            type: "POST",
	            url: "controller/cuserhome.php?btnsetshcar=setshcar", 
	            data: 'idcliet='+idcliente+'&pfidprices='+pfidprices+'&pfcolor='+pfcolor+'&pfmaterial='+pfmaterial+'&pfsize='+pfsize+'&pfprices='+pfprices+'&discount='+discount,
	            success: function(resp) {
	            	if(resp==1){
	            		M.toast({html: '¡Producto agregado!', classes: 'rounded green'});
 						consultcar(localStorage.getItem('client'));
 						$.ajax({
                          type: "POST",
                          url: "controller/cuserhome.php?btnEliminar=eliminarwish&id_detalle_wish="+idwish, 
                      success: function(resp2) {
                      	consultwish(localStorage.getItem('client'));
                      }});
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: '¡El producto ya se encuentra en el carrito!', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		$('#loginm').modal('open');
	            	}

	            }
	        });
}



