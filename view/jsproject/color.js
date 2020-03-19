$(document).ready(function(){
consultar();
$('#formcolor').submit(function() {
	$.ajax({
            type: "POST",
            url: "../../controller/ccolor.php?btnsetData=setData", 
            data: $("#formcolor").serialize(),
            success: function(resp) {
                   //alert(resp);
                   if(resp==1){
                    consultar();
                    swal("¡Buen trabajo!", "¡Se ha agregado el color exitosamente!", "success");
                     
                   }
                   else{
                    swal("Upps!", "¡Algo ha ido mal, revisa la información que deseaste ingresar!", "error");
                   }
                     
            }		
                
        });
	return false;
});	
$('#formcolor2').submit(function() {
    $.ajax({
            type: "POST",
            url: "../../controlador/ccolor.php?btnModificar=modificar", 
            data: $("#formcolor2").serialize(),
            success: function(resp) {
                   //alert(resp);
                   if(resp==1){
                    swal("¡Buen trabajo!", "¡Se ha modificado el color exitosamente!", "success");
                    $('#modal').modal('toggle');
                    consultar();
                    $("[data-dismiss=modal]").trigger({ type: "click" }); 
                   }
                   else{
                    swal("¡Upps!", "¡Creemos que se han encontrado problemas, esperemos se solucione pronto!", "error");
                   } 
               }
                
        });
    return false;
}); 
});



function llenarCajas(id, nombre){
    document.formcolor2.id2.value=id;
    document.formcolor2.txtcolor2.value=nombre;
    
}

function estado(id,estado) {
  swal({
  title: "¿Ésta seguro?",
  text: "¡Que desea cambiar el estado del registro!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Okay! ¡Permítenos un momento!", {
      icon: "success",
    });
    var paren = id
          var dataString = 'id='+paren+"&estado="+estado;
           $.ajax({
            type: "POST",
            url: "../../controlador/ccolor.php?btnModificar=modificarEstado",
            data: dataString,
            success: function(resp) {            
            //alert(resp);
  if (resp=="1") {
            swal("¡Éxito!", "¡Se modificó el estado del registro correctamente!", "success");
  }else{
                    swal("¡Upps!", "¡Creemos que se han encontrado problemas al deshabilitar el registro, esperemos se solucione pronto!", "error");
                    return false;
                   } 
            consultar();
            }
        }); 
  } else {
    swal("Ten cuidado.");
    consultar();
  }
});   
}


function consultar() {

    $('#tbcolor').DataTable( {
    "responsive": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/ccolor.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "name_color" },
      { "data": "state" },
      { "data": "actions" }
      ],
      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">All</option>'+
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