$(document).ready(function(){


$("#contact").mask("(503) 9999-9999");
$("#contacte").mask("(503) 9999-9999");


$("#city").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#frmadd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#department").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#frmadd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#citye").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#frmadde"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#departmente").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#frmadde"),
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

$('#frmadd').submit(function() {
  //if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("frmadd"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../../controller/caddress.php?btnsetData=setData", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
              //alert(resp);
                   if(resp==1){
                    
                    M.toast({html: "¡Se ha agregado la dirección exitosamente!", classes: 'rounded  green'});
                    getDataAddre($('#idcla').val());
                     
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }   
                
        });
//}
  return false;
}); 


$('#frmadde').submit(function() {
 // if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("frmadde"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../../controller/caddress.php?updateData=update", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
             // alert(resp);
                   if(resp==1){
                    
                    M.toast({html: "¡Se modificó la dirección exitosamente!", classes: 'rounded  green'});
                    getDataAddre($('#idcla').val());
                     
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }   
                
        });
//}
  return false;
}); 

$('#formcli').submit(function() {
  if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("formcli"));
      formData.append("dato", "valor");
	         $.ajax({
            type: "POST",
            url: "../../controller/cclienta.php?btnsetData=setData", 
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

$('#formclie').submit(function() {
   if(Validate(0)==idinpute.length){
    var formData = new FormData(document.getElementById("formclie"));
            $.ajax({
            type: "POST",
            url: "../../controller/cclienta.php?updateData=update", 
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

var idinput = ['img','fullname','email','user','pass'];
var idinputerror= ['txtimg','txtfullname','txtemail','txtuser','txtpass'];
var idinpute = ['imge','fullnamee','emaile','usere','passe'];
var idinputerrore= ['txtimge','txtfullnamee','txtemaile','txtusere','txtpasse'];


var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}



var bta = () =>{

$("#adda").removeClass('slideOutUp');
      $("#adda").addClass('slideInUp');
      $("#dataa").addClass('slideOutUp');
      $("#txtvaal").html('<a id="backtb" onclick="btb()" title="Regresar" class="btn-floating blu"><i class="material-icons">arrow_back</i></a> Agregar dirección');
      $("#adda").removeClass('hide');
      $("#dataa").addClass('hide'); 
}

var btb = () =>{

$("#dataa").removeClass('slideOutUp');
      $("#dataa").addClass('slideInUp');
      $("#adda").addClass('slideOutUp');
      $("#txtvaal").html('Direcciones <a class="btn" onclick="bta()" title="Agregar" id="btnadda"><i class="material-icons">add_location</i></a>');
      $("#dataa").removeClass('hide');
      $("#adda").addClass('hide'); 
}

var bte = () =>{

$("#dataa").removeClass('slideOutUp');
      $("#dataa").addClass('slideInUp');
      $("#adde").addClass('slideOutUp');
      $("#txtvaal").html('Direcciones <a class="btn" onclick="bta()" title="Agregar" id="btnadda"><i class="material-icons">add_location</i></a>');
      $("#dataa").removeClass('hide');
      $("#adde").addClass('hide'); 
}


var EditAddress = (id,contact,department,city,streetdir,numberdir,reference) =>{
      $("#adde").addClass('slideInUp');
      $("#dataa").addClass('slideOutUp');
      $("#txtvaal").html('<a id="backtb" onclick="bte()" title="Regresar" class="btn-floating blu"><i class="material-icons">arrow_back</i></a> Editar dirección');
      $("#adde").removeClass('hide');
      $("#dataa").addClass('hide');

      $("#idadd").val(id);
      $("#contacte").val(contact);


      html2='';
      $('#departmente').find('option').each( function() {
      var $this = $(this);
      if ($this.text()==department) {
          //alert(city);
         html2+='<option value="'+$this.text()+'" selected>'+$this.text()+'</option>';
         
      }else{
          html2+='<option value="'+$this.text()+'">'+$this.text()+'</option>';
      }
      });
      $('#departmente').html(html2);
      html='';
      $('#citye').find('option').each( function() {
      var $this = $(this);
      if ($this.text()==city) {
          //alert(city);
         html+='<option value="'+$this.text()+'" selected>'+$this.text()+'</option>';
         
      }else{
          html+='<option value="'+$this.text()+'">'+$this.text()+'</option>';
      }
      
      
      });
       $('#citye').html(html);
       $("#citye option[value='" + city + "']").attr("selected","selected");


      $("#streetdire").val(streetdir);
      $("#numberdire").val(numberdir);
      $("#referencee").val(reference);

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





var FillBoxes =(id,name,imagen,mail,user,pass) =>{
    $("#id").val(id);
    $("#fullnamee").val(name);
    $("#imgcontainere").attr("src",'../imguser/'+imagen);
    $("#imge").val(imagen);
    $("#emaile").val(mail);
    $("#usere").val(user);
    $("#passe").val(pass);
    $("#passe").val(pass);
   
    
}






var StateChange = (id,estado) =>{

    var paren = id
          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/cclienta.php?updateData=statechange",
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



var StateAChange = (id,id_cl,estado) =>{

    var paren = id
          var dataString = 'id='+id+'&id_cl='+id_cl+'&state='+estado;
           $.ajax({
            type: "POST",
            url: "../../controller/caddress.php?updateData=statechange",
            data: dataString,
            success: function(resp) {            
                    if (resp=="1") {
                               M.toast({html: "¡Se actualizó a la nueva dirección activa exitosamente!", classes: 'rounded  green'});
                    }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                    
                   } 
            getDataAddre($('#idcla').val());
            }
        }); 
     return false;
}




function FillBoxAdress(id){
  $("#idcla").val(id);
  getDataAddre(id);
}


var getData = ()=> {

    $('#tbclient').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,

    "ajax": {
      url: "../../controller/cclienta.php?btngetData=getData",//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "POST"
    },
    "columns": [
      { "data": "fullname_cl" },
      { "data": "imagen" },
      { "data": "email_cl" },
      { "data": "user_cl" },
      { "data": "pass_cl" },
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



var getDataPhone= (id)=> {

    $('#tbphone').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,

    "ajax": {
          url:"../../controller/cclienta.php?btngetData=getDataPhone&id="+id,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "GET",
    },
    "columns": [
      { "data": "contac" },
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

var getDataAddre = (id)=> {

    $('#tbaddres').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,

   "ajax": {
          url:"../../controller/caddress.php?btngetData=getData&id="+id,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "GET",
    },
    "columns": [
      { "data": "fullname_cl" },
      { "data": "contact" },
      { "data": "department" },
      { "data": "city" },
      { "data": "streetdir" },
      { "data": "numberdir" },
      { "data": "reference" },
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
        "sEmptyTable":     "El cliente no posee con al menos una dirección de entrega aún",
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