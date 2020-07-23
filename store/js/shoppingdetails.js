$(document).ready(function() {

    consultcar(localStorage.getItem('client'));
    
});


function consultcar(id){
	var dataString = 'id='+id;
   
    $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetcart=getcart", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                var cont=0, total=0;
                for (var i = 0; i < respu.length; i++) {
                	cont++;
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l1 center-align"><a href="#!" style="margin-top:2rem;" class="btn red" title="Remover"  onClick="deletefromcar('+String("'"+respu[i].id_shp_c_d+"'")+');"><i class="material-icons">remove_shopping_cart</i></a>  <br><br></div> <div class="col s12 m12 l2 center-align">';
					      html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
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
                          html+='<a href="javascript:void(0)" title="Incrementar" class="btn green waves-effect waves-green" style="color:white" onClick="mas('+i+','+String("'"+respu[i].id_shp_c_d+"'")+','+String("'"+respu[i].tquantity+"'")+','+String("'"+respu[i].precio+"'")+','+String("'"+respu.length+"'")+');"><i class="tiny material-icons">exposure_plus_1</i></a>&nbsp;&nbsp;';
                          html+='<label style="font-size:17px;font-weight: bold;" id="cantidad'+i+'">'+ respu[i].quantity+'</label>&nbsp;&nbsp;';
                          html+='<a href="javascript:void(0)" title="Descontar" class="btn red waves-effect waves-red" style="color:white" onClick="menos('+i+','+String("'"+respu[i].id_shp_c_d+"'")+','+String("'"+respu[i].precio+"'")+','+String("'"+respu.length+"'")+');"><i class="tiny material-icons">exposure_neg_1</i></a><br><br></div>';
					      html+='<div class="col s12 m12 l1 center-align">Precio <label class="price-new right-align">$'+parseFloat(respu[i].precio).toFixed(2)+'</label><br><br></div><div class="col s12 m12 l2 center-align">Sub total<br><label class="price-new">$</label><label id="totalf'+i+'" class="right-align price-new">'+parseFloat(respu[i].precio).toFixed(2)+'</label></div></div>';
					    html+='</li> ';
					    total+=parseFloat(respu[i].precio);
                }
                
                $("#cartcli").html(html);
                $(".numbercar").html(cont);
                $("#totalshop").html("Total: $"+parseFloat(total).toFixed(2));
            }
        });
}


function mas(i, id_shp_c_d,tm,price,n){
        var numero = 0;
        numero = parseInt($("#cantidad"+i).text());
        var mas = numero+1;
        if(mas<=tm){
        $("#totalf"+i).html((parseFloat(price*mas)).toFixed(2));
        
        total(n);
        $("#cantidad"+i).html(mas);
        //$("#cantidadcaja"+i).val(mas);
         modificarCantidad(id_shp_c_d,mas);
        }
        else{
         M.toast({html: '¡Únicamente se cuenta con '+tm+' unidades dentro del inventario de este producto!', classes: 'rounded orange'});
        }

    }

    function menos(i, id_shp_c_d,price,n){
        var numero = 0;
        numero = parseInt($("#cantidad"+i).text());
        var menos = numero-1;
        if(menos>=1){
        $("#totalf"+i).html((parseFloat(price*menos)).toFixed(2));
        
        total(n);
        $("#cantidad"+i).html(menos);
        //$("#cantidadcaja"+i).val(menos);
        modificarCantidad(id_shp_c_d,menos);
        }
        else{
        M.toast({html: 'No puede adquirir un valor inferior a 1.', classes: 'rounded orange'});
        }
    }

      function eliminar(id_shp_c_d){
              
                     $.ajax({
                          type: "POST",
                          url: "../controller/cuserhome.php?btnEliminar=eliminar&id_detalle_carrito="+id_shp_c_d, 
                      success: function(resp2) {
                        //alert(resp2);
                        if(resp2==1){
                          M.toast({html: "¡El producto se eliminó correctamente del carrito!", classes: 'rounded  green'});
                          
                        }else if (resp2==0){
                          M.toast({html: "¡Hubo un problema al eliminar el prodcuto del carrito, intentalo más tarde!", classes: 'rounded deep-orange'});

                          
                        }
                     
                      }   
                
                 });              
            
          }  

    function total(n){
        var subtotal=0;
        for (var i = 0; i < n; i++) {
            subtotal+= parseFloat($("#totalf"+i).text());
            //alert(subtotal);
        }
        
        $("#totalshop").html("Total: $"+subtotal.toFixed(2));
      
    }


    function modificarCantidad(id_shp_c_d,numero){
      //numero = parseInt($("#cantidad"+i).text());
     
                $.ajax({
                          type: "POST",
                          url: "../controller/cuserhome.php?btnModificar=modificarCantidadCart&id_detalle_carrito="+id_shp_c_d+"&cantidad="+numero, 
                            success: function(resp2) {
                        //alert(resp2);
                        
                     
                      }   
                
                 }); 
    }      