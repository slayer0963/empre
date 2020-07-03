$(document).ready(function(){


$("#phone").mask("(503) 9999-9999");
$("#phonee").mask("(503) 9999-9999");


setCombo();

getData();

$("#usertp").select2({
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

$("#usertpe").select2({
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
             // alert(resp);
                   if(resp==1){
                    getData();
                    cleanform();
                    cleanbox();
                    M.toast({html: "¡Se ha agregado al usuario exitosamente!", classes: 'rounded  green'});
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
                    M.toast({html: "¡Se ha modificado al usuario exitosamente!", classes: 'rounded  green'});
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

var idinput = ['img','fullname','usertp','phone','email','user','pass'];
var idinputerror= ['txtimg','txtfullname','txtusertp','txtphone','txtemail','txtuser','txtpass'];
var idinpute = ['imge','fullnamee','usertpe','phonee','emaile','usere','passe'];
var idinputerrore= ['txtimge','txtfullnamee','txtusertpe','txtphonee','txtemaile','txtusere','txtpasse'];


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
   
     $.ajax({
        type: "POST",
            url: "../../controller/cuser.php?btngetData=getDataTypeUser",
            }).done(function(resp) {
      
               var values = eval(resp);
               html="";
               for (var i = 0; i < values.length; i++) {
                
                if (typeuser==values[i][1]) {
                  html+="<option value='"+values[i][0]+"' selected>"+values[i][1]+"</option>"
                }else{
                  html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
                }

               }
               $("#usertpe").html(html);
            });
    
}


var setCombo = (val) =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../../controller/cuser.php?btngetData=getDataTypeUser",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione tipo de usuario</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#usertp").html(html);
            } 
        }); 
      
}



var StateChange = (id,estado) =>{

    var paren = id
          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/cuser.php?updateData=statechange",
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
      { "data": "fullname_user" },
      { "data": "phone_user" },
      { "data": "imagen" },
      { "data": "email_user" },
      { "data": "user_user" },
      { "data": "pass_user" },
      { "data": "id_ustp" },
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