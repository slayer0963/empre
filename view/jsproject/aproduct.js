var colores =  new Array();
var materiales =  new Array();
var tallas =  new Array();




function changeSelect1(event){
     var select2Value = $(event.target).val();
     
     var str1 =  select2Value;
     colores = str1.toString().split(",");
    
}
function changeSelect2(event){
     var select2Value = $(event.target).val();
     
     var str2 =  select2Value;
     materiales = str2.toString().split(",");
    
}
function changeSelect3(event){
     var select2Value = $(event.target).val();
     
     var str3 =  select2Value;
     tallas = str3.toString().split(",");
    
}




/*var dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ]];*/


$(document).ready(function(){

  



$("#tbproduct").DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
   
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
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
setComboBusi();
$("#bus").select2({
    dropdownAutoWidth: true,
    width: '100%',
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
  	templateResult: formatStateB,
    templateSelection: formatStateB
});

setComboUser();
$("#user").select2({
    dropdownAutoWidth: true,
    width: '100%',
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#user").select2({
  	templateResult: formatStateU,
    templateSelection: formatStateU
});

setComboColor();
$("#color").select2({
    dropdownAutoWidth: true,
    width: '100%',
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#color").select2({
    templateResult: formatStateC,
    templateSelection: formatStateC
});

setComboMaterial();
$("#mater").select2({
    dropdownAutoWidth: true,
    width: '100%',
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

setComboSize();
$("#size").select2({
    dropdownAutoWidth: true,
    width: '100%',
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

$("#bus").change(function(argument) {
  //setComboProduct($(this).val());
  getData($(this).val());
});

	$("#addprice").click(function(event) {
		Validatebtn();
	});


  $("#atras").click(function(event) {
      $("#inicial").removeClass('hide');
      $("#addproduct").addClass('hide');
  });


    $("#addpricepro").click(function(event) {
      Validatebtnprice();
    });



$("#backtb").click(function(event) {
     $("#datospro").addClass('hide');
      $("#tabla").removeClass('hide');
      $("#inicial").removeClass('hide');
  });


/*$('#color').on("select2:select", function (e) {
      console.log("ID seleccionado: " + e.params.data.text);
    });
*/



$("#generar").click(function(event) {
      var dataSet="";
      var dataa="";
      var btn="";
      var table = $('#tbgen').DataTable({
        "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
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
     // alert(colores[0]);
     table.clear().draw();
      for (var i = 0; i < colores.length; i++) {
        for (var j = 0; j < materiales.length; j++) {
          for (var k = 0; k < tallas.length; k++) {
               
     
                 
               
                 
                  
                  //add some rows
                  
                  btn='<a class="btn-floating #ffeb3b blue" onclick="modalGen('+String("'"+colores[i]+"'")+','+String("'"+materiales[j]+"'")+','+String("'"+tallas[k]+"'")+');" ><i class="material-icons">playlist_add</i></a>';
                  table.row.add([colores[i], materiales[j],tallas[k],btn]).draw(false);
                 //dataa+='['+ colores[i]+','+ materiales[j]+','+tallas[k] +'],';
                    
          }
        }
      }

        //dataSet=JSON.stringify("["+dataa.toString().slice(0, -1)+"]");
        /*var dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh"  ],
    [ "Garrett Winters", "Accountant", "Tokyo" ]];*/
        //alert(dataSet);
        

          

        $("#llenado").addClass('slideOutUp');
      setTimeout(function(){ 
        $("#llenado").addClass('hide');
        $("#tablage").removeClass('hide');
        $("#tablage").removeClass('slideOutUp');
        $("#tablage").addClass('slideInUp');
        $("#backfrm").removeClass('hide');
      }, 1000);

            

  });







$("#backfrm").click(function(event) {
  $("#backfrm").addClass('hide');
      $("#llenado").removeClass('slideOutUp');
      $("#llenado").addClass('slideInUp');
      $("#tablage").addClass('slideOutUp');
    setTimeout(function(){ 
      $("#llenado").removeClass('hide');
      $("#tablage").addClass('hide'); 
    }, 1000);
      
  });



  

});







var idinputi = ['user','bus'];
var idinputerrori= ['txtuser','txtbus'];
var Validatebtn=()=>{
  var count=0,validate=0;
    idinputi.forEach(names => {
	    if($("#"+names).val()> 0){
	    validate+=1;
         $("#"+idinputerrori[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrori[count]).removeClass('errorinputs');
         $("#"+idinputerrori[count]).addClass('successinputs');
         
       }
       else{
        $("#"+idinputerrori[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrori[count]).removeClass('successinputs');      
         $("#"+idinputerrori[count]).addClass('errorinputs'); 
       }
       count++;
   	});

   	if(validate==idinputi.length){
   		// $("#modaladd").modal();
   		// $("#modaladd").modal('open');
      $("#inicial").addClass('hide');
      $("#addproduct").removeClass('hide');
      
   	}
}



var idinputie = ['pcompra','pventa','cantidad'];
var idinputerrorie= ['txtpcompra','txtpventa','txtcantidad'];

var cleanform = () =>{
    idinpute.forEach(names => {
        $("#"+names).val("");
        
    });

}

var Validatebtnprice=()=>{
  var count=0,validate=0;
    idinputie.forEach(names => {
      if($("#"+names).val()> 0){
      validate+=1;
         $("#"+idinputerrorie[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrorie[count]).removeClass('errorinputs');
         $("#"+idinputerrorie[count]).addClass('successinputs');
         
       }
       else{
        $("#"+idinputerrorie[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrorie[count]).removeClass('successinputs');      
         $("#"+idinputerrorie[count]).addClass('errorinputs'); 
       }
       count++;
    });

    if(validate==idinputie.length){
      
      //$("#modaladd").modal('close');
      $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btnsetData=setData",
            data: $("#frmprice").serialize(),
            success: function(resp) {
              M.toast({html: "¡Se ha agregado el color exitosamente!", classes: 'rounded  green'});
              $('.modal').modal('close');
              cleanform();
              
            }
          });
    }
}



var setComboUser = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataU",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un usuario</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"' data-image='"+values[i][2]+"'><span>"+values[i][1]+"</span></option>";
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
            url: "../../controller/caproduct.php?btngetData=getDataB",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un negocio</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"' data-image='"+values[i][2]+"'>"+values[i][1]+"</option>"
               }
               $("#bus").html(html);
            } 
        }); 
      
}


var setComboColor = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataColor",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][2]+"' data-color='"+values[i][1]+"'><span>"+values[i][2]+"</span></option>";
               }
               $("#color").html(html);
            } 
        }); 
      
}


var setComboMaterial = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataMaterial",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][1]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#mater").html(html);
            } 
        }); 
      
}


var setComboSize = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataSize",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][2]+"'><span>"+values[i][1]+"-"+values[i][2]+"</span></option>";
               }
               $("#size").html(html);
            } 
        }); 
      
}





function formatStateB (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var imagen = $(opt.element).attr('data-image'); 
    console.log(imagen)
    if(!imagen){
       return opt.text;
    } else {                    
        var $opt = $(
           '<span><img class="" src="../imgbusiness/' + imagen + '" width="25px" height="25px" /> ' + opt.text + '</span>'
        );
        return $opt;
    }
};

function formatStateU (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var imagen = $(opt.element).attr('data-image'); 
    console.log(imagen)
    if(!imagen){
       return opt.text;
    } else {                    
        var $opt = $(
           '<span><img src="../imguser/' + imagen + '" width="25px" height="25px"  /> ' + opt.text + '</span>'
        );
        return $opt;
    }
};

function formatStateC (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var color = $(opt.element).attr('data-color'); 
    console.log(color)
    if(!color){
       return opt.text;
    } else {

        var $opt = $(
           '<span><input type="color" value="'+color+'" disabled>&nbsp;' + opt.text + '</span>'
        );
        return $opt;
    }
};

 var FillBoxes = (id,nombre) =>{
  $("#namepro").html(nombre);
  $("#idpro").val(id);

 }

 var FillDiv = (id,nombre) =>{
  
      $("#nombredtp").html("Producto: "+nombre);
      $("#inicial").addClass('hide');
      $("#tabla").addClass('hide');
      $("#datospro").removeClass('hide');

 }

var getData = (bussi)=> {
    var dataString = "bussi="+bussi;

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
          url:"../../controller/caproduct.php?btngetData=getDataAp&bussi="+bussi,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "GET",
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