$(document).ready(function(){
getData();
getDataA();
setComboUser();
$("#user").select2({
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

$("#bus").select2({
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

$("#usere").select2({
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

$("#buse").select2({
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

$("#user").change(function(argument) {
  setComboBusi($(this).val());
});

$("#usere").change(function(event) {
  setComboBuseu($(this).val());
});



$('#formassig').submit(function() {
  if(Validate(1)==idinput.length){
  $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btnsetData=setData", 
            data: $("#formassig").serialize(),
            success: function(resp) {
              //alert(resp);
                   if(resp==1){
                   getData();
                    getDataA();
                    
                    M.toast({html: "¡Se ha agregado el producto exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                     
                   }else if (resp==2) {
                      M.toast({html: "¡El producto ingresado ya existe dentro del inventario de ese negocio!", classes: 'rounded deep-orange'});
                   }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }   
                
        });
}
  return false;
});

$('#formassige').submit(function() {
  if(Validate(0)==idinput.length){
  $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btnsetData=updateData", 
            data: $("#formassige").serialize(),
            success: function(resp) {
                   if(resp==1){
                   // getData();
                    getDataA();
                    
                    M.toast({html: "¡Se ha modificado exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                     
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información a modificar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }   
                
        });
}
  return false;
}); 


});

var idinput = ['user','bus'];
var idinputerror= ['txtuser','txtbus'];
var idinpute = ['usere','buse'];
var idinputerrore= ['txtusere','txtbuse'];


var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinput.forEach(names => {
          
       if($("#"+names).val()>0){
        
         validate+=1;
         html="Listo";
         $("#"+idinputerror[count]).html($("#"+names).attr('title'));
         $("#"+idinputerror[count]).removeClass('errorinputs');
         $("#"+idinputerror[count]).addClass('successinputs');
         
       }
       else{  

        $("#"+idinputerror[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerror[count]).removeClass('successinputs');      
         $("#"+idinputerror[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }
  else{
   idinpute.forEach(names => {
       if($("#"+names).val()!=0){
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


var setComboUser = () =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataUsers",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un usuario</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#user").html(html);
            } 
        }); 
      
}

var setComboBusi = (val) =>{
          var html="";
          var dataString = 'id='+val;
          $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataBusi",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un negocio</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#bus").html(html);
            } 
        }); 
      
}

var setComboBuseu = (val) =>{
          var html="";
          var dataString = 'id='+val;
          $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataBusi",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un negocio</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#buse").html(html);
            } 
        }); 
      
}

var setComboBusie = (id,name) =>{
          var html="";
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataBusi",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
               html+="<option value='0' selected>Seleccione un negocio</option>";
                for (var i = 0; i < values.length; i++) {
                 if (name==values[i][1]) {
                    html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                  }else{
                    html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                  }
                }
               $("#buse").html(html);
            } 
        }); 
      
}

var setComboBusiee = (id,name) =>{
          var html="";
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataBusi",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
             
                for (var i = 0; i < values.length; i++) {
                 if (name==values[i][1]) {
                    html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                  }else{
                    html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                  }
                }
               $("#buse").html(html);
            } 
        }); 
      
}


var FillBoxes =(id,name,des) =>{
    $("#productid").val(id);
    $("#name").html(name);
    $("#des").html(des);       
}
    var iduser=0;
var FillBoxese =(id,idp,name,des,namebus,nameus) =>{
  $("#asign").val(id);
    $("#productide").val(idp);
    $("#namee").html(name);
    $("#dese").html(des);

    $.ajax({
        type: "POST",
            url: "../../controller/cproductassigment.php?btngetData=getDataUsers",
            }).done(function(resp) {
      
               var values = eval(resp);
               html="";
              
               for (var i = 0; i < values.length; i++) {
                
                if (nameus==values[i][1]) {
                  setComboBusiee(values[i][0],namebus);
                  html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                }else{
                  html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                }

               }
               $("#usere").html(html);
    });


      
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
      url: "../../controller/cproductassigment.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "name_pro" },
      { "data": "descr_pro" },
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

var getDataA = ()=> {

    $('#tbassigmentprod').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/cproductassigment.php?btngetData=getDataPro",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "name_pro" },
      { "data": "descr_pro" },
      { "data": "name_bus" },
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