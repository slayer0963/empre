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





$(document).ready(function(){


  $('#pextra').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
    ;
  });
});

  $('#discount').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
    ;
  });
});

  $('#pextrae').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
    ;
  });
});

  $('#discounte').keyup(function(event) {
  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
    ;
  });
});

   consultar();
    $('#fileprice').change(function(){
        document.getElementById("img").removeAttribute('src');
        $("#viewpic").html('');
        var archivos=document.getElementById('fileprice').files;
        var navegador=window.URL || window.webkitURL;
        for (var i = 0; i < archivos.length; i++) {
            var size=archivos[i].size;
            var type=archivos[i].type;
            var name=archivos[i].name;
            var objeto_url=navegador.createObjectURL(archivos[i]);
            $("#viewpic").append("<center><img id='img' name='img' class='circle responsive-img'   src="+objeto_url+" style='height: 160px; width: 160px;' ></center>");
            
        };
    });


    $('#filepricee').change(function(){
        document.getElementById("imge").removeAttribute('src');
        $("#viewpice").html('');
        var archivos=document.getElementById('filepricee').files;
        var navegador=window.URL || window.webkitURL;
        for (var i = 0; i < archivos.length; i++) {
            var size=archivos[i].size;
            var type=archivos[i].type;
            var name=archivos[i].name;
            var objeto_url=navegador.createObjectURL(archivos[i]);
            $("#viewpice").append("<center><img id='imge' name='imge' class='circle responsive-img'   src="+objeto_url+" style='height: 160px; width: 160px;' ></center>");
            
        };
    });
/*$("#addpricesa").click(function(event) {
  alert($("#frmpricesa").serialize());
});*/
  

$('#frmpricesa').submit(function() {
    if(Validate()==idinput.length){
    var formData = new FormData(document.getElementById("frmpricesa"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../../controller/cadetailsgeneral.php?btnsetData=setData", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
             //alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se agregó el detalle exitosamente!", classes: 'rounded  green'});
                    
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


$('#frmpricese').submit(function() {
    if(ValidateE()==idinput.length){
    var formData = new FormData(document.getElementById("frmpricese"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../../controller/cadetailsgeneral.php?btnsetData=setDataUpdt", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
             //alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se modificó el detalle exitosamente!", classes: 'rounded  green'});
                    viewcombi($("#id_prod").val());
                    $('#modalaeditproduct').modal('close');
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


setComboColor();
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
     table.clear().draw();
      for (var i = 0; i < colores.length; i++) {
        for (var j = 0; j < materiales.length; j++) {
          for (var k = 0; k < tallas.length; k++) {
                  //alert(colores[i]+','+ materiales[j]+','+tallas[k]);
                  var html="";  
                  var dataString = 'idprod='+$("#id_prod").val()+'&idcolor='+colores[i]+'&idmaterial='+materiales[j]+'&idsize='+tallas[k];
                  $.ajax({
                    type: "GET",
                    url: "../../controller/caproduct.php?btngetData=getDataExist",
                    data: dataString,
                    success: function(resp) {
                      //alert(resp);
                        var values = eval(resp);         
                        if (values[0].existe==1){
                          btn='<a class="btn-floating #ffeb3b green darken-3" ><i class="material-icons">playlist_add_check</i></a>';
                          table.row.add([values[0].id_color, values[0].id_material,values[0].id_size,btn]).draw(false);
                        }
                        else{
                          btn='<a class="btn-floating #ffeb3b blue" onclick="modalGen('+String("'"+values[0].id_color+"'")+','+String("'"+values[0].id_color+"'")+','+String("'"+values[0].id_color+"'")+');" ><i class="material-icons">playlist_add</i></a>';
                          table.row.add([values[0].id_color, values[0].id_material,values[0].id_size,btn]).draw(false);
                          
                        } 
                    } 
                }); 
          }
        }
      }
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



function consultar() {

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

}


var idinput = ['fname','quantity'];
var idinputerror= ['txtfname','txtquantity'];
var idinpute = ['fnamee','quantitye'];
var idinputerrore= ['txtfnamee','txtquantitye'];


var Validate = () =>{
  var validate=0, html="", count=0, counte=0;
  
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
 
 

    return validate;
}

var ValidateE= () =>{
  var validate=0, html="", count=0, counte=0;
  
        idinpute.forEach(names => {
          
       if($("#"+names).val()!=0){
        
         validate+=1;
         html="Listo";
         //alert($("#"+names).val());
         $("#"+idinputerrore[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrore[count]).removeClass('errorinputs');
         $("#"+idinputerrore[count]).addClass('successinputs');
         
       }
       else{  
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerrore[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrore[count]).removeClass('successinputs');      
         $("#"+idinputerrore[count]).addClass('errorinputs'); 
       }
       count++;
    });
 
 

    return validate;
}

var StateChange = (id_prices,id_color,id_material,id_size,status) =>{

    
          var dataString = 'id_prices='+id_prices+"&id_color="+id_color+"&id_material="+id_material+"&id_size="+id_size+"&state="+status;
           $.ajax({
            type: "POST",
            url: "../../controller/cadetailsgeneral.php?updateData=statechange",
            data: dataString,
            success: function(resp) {            
                    if (resp=="1") {
                            M.toast({html: "¡Se ha modificado el estado exitosamente!", classes: 'rounded  green'});
                            viewcombi($("#id_prod").val());
                    }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                    
                   } 
            
            }
        }); 
     return false;
}

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



var idinputie = ['pcompra','pventa'];
var idinputerrorie= ['txtpcompra','txtpventa'];

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
              M.toast({html: "¡Información guardada con exito!", classes: 'rounded  green'});
              getData($("#bus").val());
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

  var FillBox = (id_prices,id_color,id_material,id_size,img,quantity,extraprice,discount) =>{
  $("#id_pricese").val(id_prices);
  $("#id_colore").val(id_color);
  $("#id_materiale").val(id_material);
  $("#id_sizee").val(id_size);
  $("#imge").attr("src",'../imgdetails/'+img); 
  $("#fnamee").val(img);
  $("#quantitye").val(quantity);
  $("#pextrae").val(extraprice);
  $("#discounte").val(discount);
  

 }

 var FillDiv = (id,nombre,id_tpro) =>{
  
      $("#nombredtp").html("Producto: <b>"+nombre+"</b>");
      $("#id_prod").val(id);
      $("#printbutton").html('<button class="btn right-align modal-trigger" href="#tablaviewcombi" onclick="viewcombi('+id+')">Ver combinaciones</button>');
      $("#inicial").addClass('hide');
      $("#tabla").addClass('hide');
      $("#datospro").removeClass('hide');
      $("#idpres").val(id);
      $("#namepres").html("Agregar detalles de "+nombre);

}


var viewcombi = (val)=>{
    

    $('#tgen').DataTable( {
    "responsive": true,
    "order": [[ 0, "desc" ]],
    "stateSave": true,
   
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
          url:"../../controller/caproduct.php?btngetData=getvaDataGen&id="+val,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
          "type": "GET",
    },
    "columns": [
      { "data": "img" },
      { "data": "name_color" },
      { "data": "name_mat" },
      { "data": "size" },
      { "data": "quantity" },
      { "data": "actions"}
      
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





 var modalGen = (c,m,z) =>{
  $('#modaladdproduct').modal('open');
  $("#colorpre").val(c);
  $("#matpre").val(m);
  $("#sizepre").val(z);

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