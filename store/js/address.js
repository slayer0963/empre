$(document).ready(function() {

getDataAddre(localStorage.getItem('client'));


  $("#idcla").val(localStorage.getItem('client'));
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


  $('#frmadd').submit(function() {
  //if(Validate(1)==idinput.length){
    var formData = new FormData(document.getElementById("frmadd"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../controller/caddress.php?btnsetData=setData", 
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
            url: "../controller/caddress.php?updateData=update", 
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

});



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

var StateAChange = (id,id_cl,estado) =>{

    var paren = id
          var dataString = 'id='+id+'&id_cl='+id_cl+'&state='+estado;
           $.ajax({
            type: "POST",
            url: "../controller/caddress.php?updateData=statechange",
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
          url:"../controller/caddress.php?btngetData=getData&id="+id,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
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