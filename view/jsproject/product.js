$(document).ready(function(){
getData();


$("#cat").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modal1"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#tp").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modal1"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

setComboCat();
setComboTp();

$("#cate").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modal2"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#tpe").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modal2"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});
 



$('#formproduct').submit(function() {

  if(Validate(1)==idinput.length){ 
	$.ajax({
            type: "POST",
            url: "../../controller/cproduct.php?btnsetData=setData", 
            data: $("#formproduct").serialize(),
            success: function(resp) {
                   if(resp==1){
                    getData();
                    cleanform();
                    cleanbox();
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

$('#formproducte').submit(function() {
   if(Validate(0)==idinpute.length){
    $.ajax({
            type: "POST",
            url: "../../controller/cproduct.php?updateData=update", 
            data: $("#formproducte").serialize(),
            success: function(resp) {
                   if(resp==1){
                    M.toast({html: "¡Se ha modificado el tipo de usuario exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                    getData();
                    cleanform();
                    cleanbox();
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

var idinput = ['name','descrip','cat','tp'];
var idinputerror= ['txtname','txtdescripe','txtcat','txttp'];
var idinpute = ['namee','descripe','cate','tpe'];
var idinputerrore= ['txtnamee','txtdescripe','txtcate','txttpe'];

var cleanform = () => {
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}

var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinput.forEach(names => {
          
       if($("#"+names).val() !=0){
         validate+=1;
         html="Listo";
         $("#"+idinputerror[count]).html($("#"+names).attr('title'));
         $("#"+idinputerror[count]).removeClass('errorinputs');
         $("#"+idinputerror[count]).addClass('successinputs');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerror[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerror[count]).removeClass('successinputs');      
         $("#"+idinputerror[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }
  else{
   idinpute.forEach(names => {
       if($("#"+names).val().length > 0){
        validate+=1;
         $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
         $("#"+idinputerrore[counte]).removeClass('errorinputs');
         $("#"+idinputerrore[counte]).addClass('successinputs');
       }
       else{
         $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
         $("#"+idinputerrore[counte]).removeClass('successinputs');
         $("#"+idinputerrore[counte]).addClass('errorinputs');
       }
        counte++;
    });

  }

    return validate;
}

var cleanbox=()=>{
idinputerror.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
idinputerrore.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
}



var FillBoxes =(id,name,des,cat,tp) =>{
    $("#id").val(id);
    $("#namee").val(name);
    $("#descripe").val(des);
    $("#namee").focus();
    $.ajax({
        type: "POST",
            url: "../../controller/cproduct.php?btngetData=getDataCategories",
            }).done(function(resp) {
      
               var values = eval(resp);
               html="";
               for (var i = 0; i < values.length; i++) {
                
                if (cat==values[i][1]) {
                  html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                }else{
                  html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                }

               }
               $("#cate").html(html);
    });
        $.ajax({
        type: "POST",
            url: "../../controller/cproduct.php?btngetData=getDataProductType",
            }).done(function(resp) {
      
               var values = eval(resp);
               html="";
               for (var i = 0; i < values.length; i++) {
                
                if (tp==values[i][1]) {
                  html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                }else{
                  html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                }

               }
               $("#tpe").html(html);
    });   
}

var setComboCat = (val) =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../../controller/cproduct.php?btngetData=getDataCategories",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione una categoria</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#cat").html(html);
            } 
        }); 
      
}

var setComboTp = (val) =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../../controller/cproduct.php?btngetData=getDataProductType",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un tipo de producto</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#tp").html(html);
            } 
        }); 
      
}




var StateChange = (id,estado) => {

    var paren = id
          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/cproduct.php?updateData=statechange",
            data: dataString,
            success: function(resp) {            
                    if (resp=="1") {
                               M.toast({html: "¡Se ha modificado el estado exitosamente!", classes: 'rounded  green'});
                    }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                    
                   } 
            getData();
            }
        }); 
     return false;
}


var getData = ()=> {

    $('#tbproduct').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/cproduct.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "name_pro" },
      { "data": "descr_pro" },
      { "data": "id_cat" },
      { "data": "id_tpro" },
      { "data": "actions" }
      ],
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
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