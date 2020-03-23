$(document).ready(function(){




$(".select2").select2({
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





    





getData();






$("#img").change(function(event) {
     document.getElementById("imgcontainer").removeAttribute('src');
        //limpar vista previa
        $("#vista-previa").html('');
                var archivos=document.getElementById('file').files;
        var navegador=window.URL || window.webkitURL;
        //Recorrer los archivos
        for (var i = 0; i < archivos.length; i++) {
            //Validar tamaño y tipo de archivo
            var size=archivos[i].size;
            var type=archivos[i].type;
            var name=archivos[i].name;
            
                var objeto_url=navegador.createObjectURL(archivos[i]);

         $("#vista-previa").append('<img src="'+objeto_url+'" id="imgcontainer" alt="" style="height: 150px; width: 150px;" class=" responsive-img">');
       }
});


$('#formuser').submit(function() {
  if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("formuser"));
      formData.append("dato", "valor");
	         $.ajax({
            type: "POST",
            url: "../../controller/cuser.php?btnsetData=setData", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
              alert(resp);
                   if(resp==1){
                    getData();
                    cleanform();
                    
                    M.toast({html: "¡Se ha agregado el usuario exitosamente!", classes: 'rounded  green'});
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

$('#formusere').submit(function() {
   if(Validate(0)==idinpute.length){
    var formData = new FormData(document.getElementById("formusere"));
            $.ajax({
            type: "POST",
            url: "../../controller/cuser.php?updateData=update", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {

                   if(resp==1){
                    M.toast({html: "¡Se ha modiicado el usuario exitosamente!", classes: 'rounded  green'});
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

var idinput = ['fullname','phone','img','email','user','pass'];
var idinpute = ['fullnamee','phonee','imge','emaile','usere','passe'];

var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}

var Validate = (type) =>{
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



var FillBoxes =(id,name,phone,imagen,mail,user,pass, typeuser) =>{
    $("#id").val(id);
    $("#fullnamee").val(name);
    $("#phonee").val(phone);
    $("#imgcontainere").attr("src",'../imguser/'+imagen);
    $("#imge").val(imagen);
    $("#emaile").val(mail);
    $("#usere").val(user);
    $("#passe").val(pass);
    $("#passe").val(pass);

    
}


var load_combo = () =>{

}



var StateChange = (id,estado) =>{

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

    $('#tbusers').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
      url: "../../controller/cuser.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "id_user" },
      { "data": "fullname_user" },
      { "data": "phone_user" },
      { "data": "imagen" },
      { "data": "email_user" },
      { "data": "user_user" },
      { "data": "pass_user" },
      { "data": "id_ustp" },
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