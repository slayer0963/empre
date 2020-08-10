
$(document).ready(function($) {
	  var obj =JSON.parse(localStorage.getItem('Store'));
  if(obj.name!=""){
   
    getDataDely(obj.idbusi);
  }
});



var StateChange = (id,estado) =>{

          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../controller/cdelivery.php?updateData=statechange",
            data: dataString,
            success: function(resp) {
 
                    if (parseInt(resp)=="1") {
                               M.toast({html: "¡Se entrego!", classes: 'rounded  green'});
                               var obj =JSON.parse(localStorage.getItem('Store'));
                               getDataDely(obj.idbusi);
                    }else{
                              M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});  
                   } 
            
            }
        }); 
     return false;
}

var getDelivery =(idcart,idbus)=>{
  getDataDeliveryList(idcart,idbus);
  
}

var getDataDeliveryList = (cart,bus)=> {
  var dataString = 'id='+cart+'&idbus='+bus;
  var html='', htmltf='', name='',fecha='';
  $.ajax({
      type: "POST",
      url: '../controller/cdelivery.php?btngetData=getDataDetailsSales',
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

var getDataDely = (bussi)=> {
    $('#tbdelivery').DataTable( {
    "responsive": true,
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
    "ajax": {
          url:"../controller/cdelivery.php?btngetData=getDatadely&id="+bussi,
          "type": "GET",
    },
    "columns": [
      { "data": "id_delivery" },
      { "data": "fullname_cl" },
      { "data": "datesold" },
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