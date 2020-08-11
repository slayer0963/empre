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
	   									   html+=''+respu[i].datesold+'';
	   									   html+='<p><br><a href="#" class="btn" onclick="viewdelivery('+respu[i].id_shop_c+');">Ver pedido</a>&nbsp;';
	    									html+='</div>';
	  									html+='</div>';
								html+='</div>';
							}
            	$("#containerpedidos").html(html);
            }
        });
}

function getdataProcess(idus) {
		var dataString = 'idus='+idus;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cdelivery.php?btngetData=getDeliveriesUs", 
            data: dataString,
            success: function(resp) {
            	var html='';

            	var respu = eval(resp);

            	for (var i = 0; i < respu.length; i++) {
  

				html+='<div  class="col s12 m6 l6 center-align animated slideInDown ">';
									html+='<div class="card"><br>';
	   									 html+='<div class="card-image waves-effect waves-block waves-light">';
	   									 if(respu[i].status_delivery==2){
	   									 	html+='<a class="waves-effect waves-light btn yellow" onclick="deliveryp('+respu[i].id_delivery+','+respu[i].id_bus+');">En Proceso</a>'
	   									 }
	   								
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									 html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].fullname_cl+'</span>';
	   									   html+=''+respu[i].datesold+'';
	   									   html+='<br><br><a href="#" class="btn" onclick="viewdelivery('+respu[i].id_shop_c+');">Ver pedido</a><br>&nbsp;';
	    									html+='</div>';
	  									html+='</div>';
								html+='</div>';
							}
            	$("#containerpedidosproce").html(html);
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