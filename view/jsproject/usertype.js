$(document).ready(function(){
getData();



 



$('#formusertype').submit(function() {

  if(Validates(1)==idinput.length){ 
	$.ajax({
            type: "POST",
            url: "../../controller/cusertype.php?btnsetData=setData", 
            data: $("#formusertype").serialize(),
            success: function(resp) {
                   if(resp==1){
                    getData();
                    cleanform();
                    
                    M.toast({html: "¡Se ha agregado el tipo de usuario exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                     
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }		
                
        });
}
	return false;
});	

$('#formusertypee').submit(function() {
   if(Validates(0)==idinpute.length){
    $.ajax({
            type: "POST",
            url: "../../controller/cusertype.php?updateData=update", 
            data: $("#formusertypee").serialize(),
            success: function(resp) {
                   if(resp==1){
                    M.toast({html: "¡Se ha modiicado el tipo de usuario exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                    getData();
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                   } 
               }
                
        });
    
  }
  return false;
}); 
});

var idinput = ['usertype'];
var idinpute = ['usertypee'];

var cleanform = () => {
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}

var Validates = (type) =>{
  var validate=0;
  var html="";
  var validate=0, error=0;
  var html="";
  if(type==1){
        idinput.forEach(names => {
       if($("#"+names).val().length > 0){
         validate+=1;
       }
       else{
        error+=1;
        html+="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        //console.log(validate.isEmpty($("#"+names).val()));
       }
    });
    if(error>=1){
      M.toast({html: html , classes: 'rounded orange lighten-2'});
    }
  }
  else{
   idinpute.forEach(names => {
       if($("#"+names).val().length > 0){
         validate+=1;
       }
       else{
        error+=1;
        html+="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
       }
    });
    if(error>=1){
      M.toast({html: html , classes: 'rounded orange lighten-2'});
    }
  }

    return validate;
}



var FillBoxes =(id,name,code) =>{
    $("#id").val(id);
    $("#usertypee").val(name);
    $("#usertypee").focus();   
}




var StateChange = (id,estado) => {

    var paren = id
          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/cusertype.php?updateData=statechange",
            data: dataString,
            success: function(resp) {            
                    if (resp=="1") {
                               M.toast({html: "¡Se ha modiicado el estado exitosamente!", classes: 'rounded  green'});
                    }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                    
                   } 
            getData();
            }
        }); 
     return false;
}


var getData = ()=> {

    $('#tbusertype').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/cusertype.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "id_ustp" },
      { "data": "name_ustp" },
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