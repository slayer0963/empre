$(document).ready(function() {
	var obj = JSON.parse(localStorage.getItem('motoper'));
      // alert(obj.id);
	getdata();
	getdataProcess(obj.id);
});

function getdata() {
			var obj = JSON.parse(localStorage.getItem('motoper'));
	     $.ajax({
            type: "POST",
            url: "../controller/cdelivery.php?btngetData=getDeliveriesD", 
            success: function(resp) {
            	var html='';

            	var respu = eval(resp);
            	$("#containerpedidos").html("");
            	if(respu.length!=0){
            		$("#txtdispo").removeClass('hide');
            	for (var i = 0; i < respu.length; i++) {
  

				html+='<div  class="col s12 m6 l6 center-align animated slideInDown ">';
									html+='<div class="card"><br>';
	   									 html+='<div class="card-image waves-effect waves-block waves-light">';
	   									 if(respu[i].status_delivery==0){
	   									 	html+='<a class="waves-effect waves-light btn green" onclick="activDeli('+obj.id+','+respu[i].id_delivery+')">Activo</a>'
	   									 }
	   								
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									 html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].fullname_cl+'</span>';
	   									   html+=''+respu[i].datesold+'<br>';
	   									   html+='Calle:'+respu[i].department+'<br>';
	   									   html+='Calle:'+respu[i].streetdir+'<br>';
	   									   html+='Referencia:'+respu[i].reference+'';
	   									   html+='<p><br><a class="btn modal-trigger"  href="#deliverylist"  onclick="viewdelivery('+respu[i].id_shop_c+');">Ver pedido</a>&nbsp;';
	    									html+='</div>';
	  									html+='</div>';
								html+='</div>';
							}
            	$("#containerpedidos").html(html);
            }
            else{
            	$("#txtdispo").addClass('hide');
            }
            }
        });
}

function getdataProcess(idus) {
	var obj = JSON.parse(localStorage.getItem('motoper'));
		var dataString = 'idus='+idus;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cdelivery.php?btngetData=getDeliveriesUs", 
            data: dataString,
            success: function(resp) {
            	var html='';

            	var respu = eval(resp);
            	$("#containerpedidosproce").html("");
            	if(respu.length!=0){
            		$("#txtactive").removeClass('hide');
            		for (var i = 0; i < respu.length; i++) {
  

				html+='<div  class="col s12 m6 l6 center-align animated slideInDown ">';
									html+='<div class="card"><br>';
	   									 html+='<div class="card-image waves-effect waves-block waves-light">';
	   									 if(respu[i].status_delivery==2){
	   									 	html+='<a class="waves-effect waves-light btn yellow " onclick="deliveryp('+respu[i].id_delivery+','+obj.id+');">En Proceso</a>'
	   									 }
	   								
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									 html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].fullname_cl+'</span>';
	   									   html+=''+respu[i].datesold+'';
	   									   html+='<br><br><a  class="btn modal-trigger" href="#deliverylist" onclick="viewdelivery('+respu[i].id_shop_c+');">Ver pedido</a><br>&nbsp;';
	    									html+='</div>';
	  									html+='</div>';
								html+='</div>';
							}
            	$("#containerpedidosproce").html(html);
            	}
            	else{
            		$("#txtactive").addClass('hide');
            	}
            	
            }
        });



}

function activDeli(idus,iddeli) {
	var dataString = 'idus='+idus+'&ide='+iddeli;
	$.ajax({
            type: "POST",
            url: "../controller/cdelivery.php?btnsetData=setDelivery", 
            data: dataString,
            success: function(resp) {
            	if(resp==1){
            		getdata();
					getdataProcess(idus);
					M.toast({html: 'El pedido ya esta en proceso de entrega!', classes: 'rounded green'});
            	}
            	
            }
        });
}

function deliveryp(deli,idus) {
	swal({
		  title: "Pregunta?",
		  text: "Dar Si, si ya finalizaste el pedido \nNo, si ya no lo puedes entregar!",
		  icon: "warning",
		  buttons: ["Si", "No"],
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	var dataString = 'idus='+idus+'&ide='+deli;
			$.ajax({
		            type: "POST",
		            url: "../controller/cdelivery.php?btnsetData=setDeliveryFF", 
		            data: dataString,
		            success: function(resp) {
		            	if(resp==1){
		            		getdata();
							getdataProcess(idus);
							M.toast({html: 'Te entendemos, Gracias!', classes: 'rounded green'});
		            	}
		            	
		            }
		        });
		    
		  } else {
		  	var dataString = 'idus='+idus+'&ide='+deli;
			$.ajax({
		            type: "POST",
		            url: "../controller/cdelivery.php?btnsetData=setDeliveryE", 
		            data: dataString,
		            success: function(resp) {
		            	if(resp==1){
		            		getdata();
							getdataProcess(idus);
							M.toast({html: 'Pedido finalizado gracias!', classes: 'rounded green'});
		            	}
		            	
		            }
		        });
		    
		  }
		});
}

function viewdelivery(idcar){

  var dataString = 'id='+idcar;
  var html='', htmltf='', name='',fecha='';
  $.ajax({
      type: "POST",
      url: '../controller/cdelivery.php?btngetData=getDataDetailsSalesR',
      data: dataString,
      success: function(datas) {
        let totoalf=0, totalf=0;
        var lbl = eval(datas);
         for (var i = 0; i < lbl.length; i++) {
          name=lbl[i].fullname_cl;
          fecha=lbl[i].fecha;
          totalf+=parseInt(lbl[i].quantity);
          html+='<tr><td>'+lbl[i].name_pro+'</td><td><a href="../view/imgdetails/'+lbl[i].img+'" data-lightbox="image-'+lbl[i].name_pro+'" data-title="'+lbl[i].name_pro+'"><img src="../view/imgdetails/'+lbl[i].img+'" style="width:50px; height:50px;"/></a></td><td>'+lbl[i].name_color+'<br>'+lbl[i].name_mat+'<br>'+lbl[i].name_size+'-'+lbl[i].number_size+'</td><td>'+lbl[i].quantity+'</td></tr>';
        }
        $("#bodysales").html(html);
         htmltf+='<tr><td colspan="3" >Cantidad total:</td><td>'+totalf+'</td></tr>';
        $("#bodysalesfoot").html(htmltf);
        $("#nameclide").html("Pedido de "+name);
        
      }
    });
   


}