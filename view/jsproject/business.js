$(document).ready(function(){


$("#phone").mask("(503) 9999-9999");
$("#phonee").mask("(503) 9999-9999");


setCombo();

getData();

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

$("#img").change(function(event) {
     document.getElementById("imgcontainer").removeAttribute('src');

        $("#vista-previa").html('');
                var archivos=document.getElementById('file').files;
        var navegador=window.URL || window.webkitURL;

        for (var i = 0; i < archivos.length; i++) {

            var size=archivos[i].size;
            var type=archivos[i].type;
            var name=archivos[i].name;

                var objeto_url=navegador.createObjectURL(archivos[i]);

         $("#vista-previa").append('<img src="'+objeto_url+'" id="imgcontainer" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
       }
});

$("#imge").change(function(event) {
     document.getElementById("imgcontainere").removeAttribute('src');

        $("#vista-previae").html('');
                var archivos=document.getElementById('filee').files;
        var navegador=window.URL || window.webkitURL;

        for (var i = 0; i < archivos.length; i++) {

            var size=archivos[i].size;
            var type=archivos[i].type;
            var name=archivos[i].name;

                var objeto_url=navegador.createObjectURL(archivos[i]);

         $("#vista-previae").append('<img src="'+objeto_url+'" id="imgcontainere" alt="" style="height: 150px; width: 150px;" class="circle responsive-img">');
       }
});


$('#formbusi').submit(function() {
  if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("formbusi"));
      formData.append("dato", "valor");
	         $.ajax({
            type: "POST",
            url: "../../controller/cbusiness.php?btnsetData=setData",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
              //alert(resp);
                   if(resp==1){
                    getData();
                    cleanform();
                    cleanbox();
                    M.toast({html: "¡Se ha agregado el negocio exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');

                   }else if(resp=="x"){
                    M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});

                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});

                   }

            }

        });
}
	return false;
});

$('#formbusie').submit(function() {
   if(Validate(0)==idinpute.length){
    var formData = new FormData(document.getElementById("formbusie"));
            $.ajax({
            type: "POST",
            url: "../../controller/cbusiness.php?updateData=update",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
              // alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se ha modificado el negocio exitosamente!", classes: 'rounded  green'});
                    $('.modal').modal('close');
                    getData();
                    cleanbox();
                    cleanform();
                   }else if(resp=="x"){
                    M.toast({html: "¡Ocurrió un error al cargar la imagen, favor asegúrese que la imagen posea un formato reconocible ('JPG','GIF','PNG')!", classes: 'rounded deep-orange'});

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

var idinput = ['img','name','user','descrip'];
var idinputerror= ['txtimg','txtname','txtuser','txtdescrip'];
var idinpute = ['imge','namee','usere','descripe'];
var idinputerrore= ['txtimge','txtnamee','txtusere','txtdescripe'];


var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");

    });
}


var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinput.forEach(names => {

       if($("#"+names).val()!=0){

         validate+=1;
         html="Listo";
         //alert($("#"+names).val());
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

var cleanbox=()=>{
idinputerror.forEach(names => {
  $("#"+names).removeClass('successinputs');
});
idinputerrore.forEach(names => {
  $("#"+names).removeClass('successinputs');
});
}





var FillBoxes =(id,name,imagen,usuario,state,descrip) =>{
    $("#id").val(id);
    $("#namee").val(name);
    $("#imge").val(imagen);
    $("#imgcontainere").attr("src",'./imgbusiness/'+imagen);
     $.ajax({
        type: "POST",
            url: "../../controller/cbusiness.php?btngetData=getDataUser",
            }).done(function(resp) {

               var values = eval(resp);
               html="";
               for (var i = 0; i < values.length; i++) {

                if (usuario==values[i][1]) {
                  // alert(usuario+"---"+values[i][1])
                  html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                }else{
                  html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                }

               }
               $("#usere").html(html);
            });
    $("#descripe").val(descrip);
}


var setCombo = (val) =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../../controller/cbusiness.php?btngetData=getDataUser",
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



var StateChange = (id,estado) =>{

    var paren = id
          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/cbusiness.php?updateData=statechange",
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

    $('#tbbusi').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/cbusiness.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "name_bus" },
      { "data": "pic_logo_bus" },
      { "data": "id_user" },
      { "data": "description" },
      { "data": "actions" },
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
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros.",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros.",
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
