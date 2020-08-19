$(document).ready(function() {
	var obj = JSON.parse(localStorage.getItem('motoper'));
      // alert(obj.id);
	getdata();
	getdataProcess(obj.id);
	getDatadelyhisto(obj.id);
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
  

				html+='<div  class="col s12 m6 l4 center-align animated slideInDown ">';
									html+='<div class="card"><br>';
	   									 html+='<div class="card-image waves-effect waves-block waves-light center-align">';
	   									 html+='<center><img src="../view/imguser/'+respu[i].imagen+'" style="width: 150px; height: 155px;"></center><br>';
	   									 if(respu[i].status_delivery==0){
	   									 	html+='<a class="waves-effect waves-light btn green" onclick="activDeli('+obj.id+','+respu[i].id_delivery+')">Activo</a>'
	   									 }
	   								
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									 html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].fullname_cl+'</span>';
	   									   html+=''+respu[i].datesold+'<br>';
	   									   html+='Departamento:'+respu[i].department+'<br>';
	   									   html+='Calle:'+respu[i].streetdir+'<br> N°'+respu[i].numberdir+'<br>';
	   									   html+='Referencia:'+respu[i].reference+'<br>';
	   									   html+='Contacto:'+respu[i].contact+'';
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
  

				html+='<div  class="col s12 m6 l4 center-align animated slideInDown ">';
									html+='<div class="card"><br>';
	   									 html+='<div class="card-image waves-effect waves-block waves-light">';
	   									 html+='<center><img src="../view/imguser/'+respu[i].imagen+'" style="width: 150px; height: 155px;"></center><br>';
	   									 if(respu[i].status_delivery==2){
	   									 	html+='<a class="waves-effect waves-light btn yellow " onclick="deliveryp('+respu[i].id_delivery+','+obj.id+');">En Proceso</a>'
	   									 }
	   								
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									 html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].fullname_cl+'</span>';
	   									   html+=''+respu[i].datesold+'<br>';
	   									    html+='Departamento:'+respu[i].department+'<br>';
	   									   html+='Calle:'+respu[i].streetdir+'<br> N°'+respu[i].numberdir+'<br>';
	   									   html+='Referencia:'+respu[i].reference+'<br>';
	   									   html+='Contacto:'+respu[i].contact+'';
	   									   html+='<br><br><a  class="btn modal-trigger" href="#deliverylist" onclick="viewdelivery('+respu[i].id_shop_c+');">Ver pedido</a><br>&nbsp;';
	    									html+='</div>';
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
							getDatadelyhisto(idus);
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


var getDatadelyhisto = (iduser)=> {
    $('#tbdelivery').DataTable( {
    "responsive": true,
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
    "ajax": {
          url:"../controller/cdelivery.php?btngetData=getDatadelyhisto&id="+iduser,
          "type": "GET",
    },
    "columns": [
      { "data": "id_delivery" },
      { "data": "fullname_cl" },
      { "data": "date" },
      { "data": "actions" }
      ],

      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });

}