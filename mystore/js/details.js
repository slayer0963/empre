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



$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Product'));
	if(obj.idpro!=""){
		details(obj.idpro);
	}


      setComboColor();
      $("#colora").select2({
    templateResult: formatStateC,
    templateSelection: formatStateC
});

      setComboMaterial();
      $("#matera").select2({
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
      $("#sizea").select2({
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


      $('#pcompra').keyup(function(event) {
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


      $('#pventa').keyup(function(event) {
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

      $('#frmpricesa').submit(function() {
    if(ValidateGen()==idinput.length){
    var formData = new FormData(document.getElementById("frmpricesa"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../controller/cadetailsgeneral.php?btnsetData=setData", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
             //alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se agregó el detalle exitosamente!", classes: 'rounded  green'});
                    $('#modaladdproduct').modal('close');
                    reloadTable();
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


       $('#frmeditpr').submit(function() {
    //if(ValidateUpdt()==idinput.length){
    var dataString = 'idpro='+$("#id_product").val()+'&pcompra='+$("#pcompra").val()+'&pventa='+$("#pventa").val();
           $.ajax({
            type: "POST",
            url: "../controller/caproduct.php?btnsetData=updateData", 
            data: dataString,
            
            success: function(resp) {
             //alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se modificó el registro exitosamente!", classes: 'rounded  green'});
                    $('#modaledit').modal('close');
                    details($("#id_product").val());
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }   
                
        });
//}
  return false;
}); 



      $("#addcombi").click(function(event) {
  
            $("#nombredtp").html("Producto: <b>"+$("#name_product").val()+"</b>");
            $("#printbutton").html('<button class="btn right-align modal-trigger" href="#tablaviewcombi" onclick="viewcombi('+$("#id_product").val()+')">Ver combinaciones</button>');
            $("#details").addClass('hide');
            $("#datospro").removeClass('hide');
            $("#namepres").html("Agregar detalles de "+$("#name_product").val());

      });

         
         


         $('#frmpricese').submit(function() {
    if(ValidateE()==idinput.length){
    var formData = new FormData(document.getElementById("frmpricese"));
      formData.append("dato", "valor");
           $.ajax({
            type: "POST",
            url: "../controller/cadetailsgeneral.php?btnsetData=setDataUpdt", 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp) {
             //alert(resp);
                   if(resp==1){
                    M.toast({html: "¡Se modificó el detalle exitosamente!", classes: 'rounded  green'});
                    viewcombi($("#id_product").val());
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



         /*-----------------*/

/*add color*/

$("#pcolor").change(function(event) {
  $("#txtcode").val($("#pcolor").val());
});


$('#formcolor').submit(function() {
  if(Validatecolor(1)==idinputcolor.length){
      $.ajax({
            type: "POST",
            url: "../controller/ccolor.php?btnsetData=setData", 
            data: $("#formcolor").serialize(),
            success: function(resp) {
                   if(resp==1){
                   setComboColor();
                   $('.modal').modal('close');
                    cleanformcolor();
                    M.toast({html: "¡Se ha agregado el color exitosamente!", classes: 'rounded  green'});
                     cleanboxcolor();
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }           
                
        });
}
      return false;
});




var idinputcolor = ['txtcolor','txtcode'];
var idinputerrorcolor= ['txtcolorerror','txtcodeerror'];
var Validatecolor = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinputcolor.forEach(names => {
          
       if($("#"+names).val().length > 0){
         validate+=1;
         html="Listo";
         $("#"+idinputerrorcolor[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrorcolor[count]).removeClass('errorinputs');
         $("#"+idinputerrorcolor[count]).addClass('successinputs');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerrorcolor[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrorcolor[count]).removeClass('successinputs');      
         $("#"+idinputerrorcolor[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }


    return validate;
}


var cleanformcolor = () =>{
    idinputcolor.forEach(names => {
        $("#"+names).val("");
        
    });

}
var cleanboxcolor=()=>{
idinputerrorcolor.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
}
/*--------------------------------------------------------------------------------------*/

/*add material*/


var idinputmat = ['txtnamemat'];
var idinputerrormat= ['txtnamematerror'];

$('#formmaterial').submit(function() {
  if(Validatematerial(1)==idinputmat.length){
      $.ajax({
            type: "POST",
            url: "../controller/cmaterial.php?btnsetData=setData", 
            data: $("#formmaterial").serialize(),
            success: function(resp) {
                   if(resp==1){
                        setComboMaterial();
                        $('.modal').modal('close');
                    cleanformmat();
                    
                    M.toast({html: "¡Se ha agregado el material exitosamente!", classes: 'rounded  green'});
                    
                     cleanboxmat();
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }           
                
        });
}
      return false;
});





var cleanformmat = () =>{
    idinputmat.forEach(names => {
        $("#"+names).val("");
        
    });

}



var Validatematerial = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinputmat.forEach(names => {
          
       if($("#"+names).val().length > 0){
         validate+=1;
         html="Listo";
         $("#"+idinputerrormat[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrormat[count]).removeClass('errorinputs');
         $("#"+idinputerrormat[count]).addClass('successinputs');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerrormat[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrormat[count]).removeClass('successinputs');      
         $("#"+idinputerrormat[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }

    return validate;
}

var cleanboxmat=()=>{
idinputerrormat.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});

}
/*--------------------------------------------------------------------------------------*/
/*add size */
$('#formsize').submit(function() {
  if(Validatesize(1)==idinputsize.length){
      $.ajax({
            type: "POST",
            url: "../controller/csize.php?btnsetData=setData", 
            data: $("#formsize").serialize(),
            success: function(resp) {
                   if(resp==1){
                   setComboSize();
                    $('.modal').modal('close');
                    cleanform();
                    
                    M.toast({html: "¡Se ha agregado el tamaño exitosamente!", classes: 'rounded  green'});
                   
                     cleanbox();
                   }
                   else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                    
                   }
                     
            }           
                
        });
}
      return false;
});

var idinputsize = ['txtnumber','txtnamesize'];
var idinputerrorsize= ['txtnumbererror','txtnamesizeerror'];



var cleanformsize = () =>{
    idinputsize.forEach(names => {
        $("#"+names).val("");
        
    });

}



var Validatesize = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinputsize.forEach(names => {
          
       if($("#"+names).val().length > 0){
         validate+=1;
         html="Listo";
         $("#"+idinputerrorsize[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrorsize[count]).removeClass('errorinputs');
         $("#"+idinputerrorsize[count]).addClass('successinputs');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerrorsize[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrorsize[count]).removeClass('successinputs');      
         $("#"+idinputerrorsize[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }
    return validate;
}

var cleanboxsize=()=>{
idinputerrorsize.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
}
/*--------------------------------------------------------------------------------------*/


         $("#generar").click(function(event) {
      //alert($("#idprod").val());
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
                  var dataString = 'idprod='+$("#id_product").val()+'&idcolor='+colores[i]+'&idmaterial='+materiales[j]+'&idsize='+tallas[k];
                  $.ajax({
                    type: "GET",
                    url: "../controller/caproduct.php?btngetData=getDataExist",
                    data: dataString,
                    success: function(resp) {
                        //alert(resp);
                        var values = eval(resp);         
                        if (values[0].existe==1){
                          btn='<a class="btn-floating #ffeb3b green darken-3" ><i class="material-icons">playlist_add_check</i></a>';
                          table.row.add([values[0].id_color, values[0].id_material,values[0].id_size,btn]).draw(false);
                        }
                        else{
                          btn='<a class="btn-floating #ffeb3b blue" onclick="modalGen('+$("#id_product").val()+','+String("'"+values[0].id_color+"'")+','+String("'"+values[0].id_material+"'")+','+String("'"+values[0].id_size+"'")+');" ><i class="material-icons">playlist_add</i></a>';
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

});




function mybusiis(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;
	localStorage.setItem('Store',JSON.stringify(obj));
	location.href="./products";
	
	
}

var idinput = ['fname','quantity'];
var idinputerror= ['txtfname','txtquantity'];
var ValidateGen = () =>{
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

  var FillBox = (id_prices,id_color,id_material,id_size,img,quantity,extraprice,discount) =>{
  $("#id_pricese").val(id_prices);
  $("#id_colore").val(id_color);
  $("#id_materiale").val(id_material);
  $("#id_sizee").val(id_size);
  $("#imge").attr("src",'../view/imgdetails/'+img); 
  $("#fnamee").val(img);
  $("#quantitye").val(quantity);
  $("#pextrae").val(extraprice);
  $("#discounte").val(discount);
  

 }


var idinpute = ['fnamee','quantitye'];
var idinputerrore= ['txtfnamee','txtquantitye'];
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






var reloadTable= () =>{
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
                  var dataString = 'idprod='+$("#id_product").val()+'&idcolor='+colores[i]+'&idmaterial='+materiales[j]+'&idsize='+tallas[k];
                  $.ajax({
                    type: "GET",
                    url: "../controller/caproduct.php?btngetData=getDataExist",
                    data: dataString,
                    success: function(resp) {
                        //alert(resp);
                        var values = eval(resp);         
                        if (values[0].existe==1){
                          btn='<a class="btn-floating #ffeb3b green darken-3" ><i class="material-icons">playlist_add_check</i></a>';
                          table.row.add([values[0].id_color, values[0].id_material,values[0].id_size,btn]).draw(false);
                        }
                        else{
                          btn='<a class="btn-floating #ffeb3b blue" onclick="modalGen('+$("#id_product").val()+','+String("'"+values[0].id_color+"'")+','+String("'"+values[0].id_material+"'")+','+String("'"+values[0].id_size+"'")+');" ><i class="material-icons">playlist_add</i></a>';
                          table.row.add([values[0].id_color, values[0].id_material,values[0].id_size,btn]).draw(false);
                          
                        } 
                    } 
                }); 
          }
        }
      }
}








var StateChange = (id_prices,id_color,id_material,id_size,status) =>{
          var dataString = 'id_prices='+id_prices+"&id_color="+id_color+"&id_material="+id_material+"&id_size="+id_size+"&state="+status;
           $.ajax({
            type: "POST",
            url: "../controller/cadetailsgeneral.php?updateData=statechange",
            data: dataString,
            success: function(resp) {            
                    if (resp=="1") {
                            M.toast({html: "¡Se ha modificado el estado exitosamente!", classes: 'rounded  green'});
                            viewcombi($("#id_product").val());
                    }else{
                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});
                    
                   } 
            }
        }); 
     return false;
}


var viewcombi = (val)=>{
    

    $('#tgen').DataTable( {
    "responsive": true,
    "order": [[ 1, "desc" ]],
    "stateSave": true,
   
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
          url:"../controller/caproduct.php?btngetData=getvaDataGen2&id="+val,//hasta para consultar tenemos un boton imaginario en el controlador  => ($page = isset($_GET['btnConsultar'])?$_GET['btnConsultar']:'';)
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



function details(id) {
	var dataString = 'id='+id;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetproid=getData", 
            data: dataString,
            success: function(resp) {
            	getcolors(id);
            	//alert(resp);
            	var respu = eval(resp);
            	var html='';
            	
            	for (var i = 0; i < respu.length; i++) {
            		
					html+='<img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="display: block;margin-left: auto;margin-right: auto;padding:10px;">';
						    $("#nameprode").html(respu[i].name_pro);
                                         $("#pcompra").val(respu[i].pur_price);
                                         $("#pventa").val(respu[i].sal_price);
					getDataProductD(respu[i].id_pro,respu[i].id_color,respu[i].id_material,respu[i].id_size);
            	}
            	
         
   
	}
            });
}


function getcolors(id) {
	var dataString = 'id='+id;
	$("#cmaterialsp").html('');$("#csizesp").html('');
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetcolors=getDatapc", 
            data: dataString,
            success: function(resp) {
            	// alert(resp);
            	var respu = eval(resp);
            	var html='';
            	for (var i = 0; i < respu.length; i++) {
            		html+='<button class="btn " style="background-color:'+respu[i].code_color+' ;" onclick="getmaterials('+id+','+respu[i].id_color+','+String("'"+respu[i].code_color+"'")+')">'+respu[i].name_color+'</button>&nbsp;';
            	}
            	$("#ccolorsp").html(html);
            }});
}

function getmaterials(id,color,code) {
	var dataString = 'id='+id+'&idcolor='+color;
	$("#csizesp").html('');
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetmaterials=getDatamc", 
            data: dataString,
            success: function(resp) {
            	// alert(resp);
            	var respu = eval(resp);
            	var html='';
            	for (var i = 0; i < respu.length; i++) {
            		html+='<button class="btn" style="background-color:'+code+' ;" onclick="getsizes('+id+','+respu[i].id_material+','+color+')">'+respu[i].name_mat+'</button>&nbsp;';
            	}
            	$("#cmaterialsp").html(html);
            }});
}

function getsizes(id,material,color) {
	var dataString = 'id='+id+'&idcolor='+color+'&idmat='+material;
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetsizes=getDatazc", 
            data: dataString,
            success: function(resp) {
            	// alert(resp);
            	var respu = eval(resp);
            	var html='';
            	for (var i = 0; i < respu.length; i++) {
            		html+='<button class="btn" onclick="getDataProductD('+id+','+color+','+material+','+respu[i].id_size+');">'+respu[i].number_size+'-'+respu[i].name_size+'</button>&nbsp;';
            	}
            	$("#csizesp").html(html);
            }});
}

var setComboColor = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../controller/caproduct.php?btngetData=getDataColor",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][2]+"' data-color='"+values[i][1]+"'><span>"+values[i][2]+"</span></option>";
               }
               $("#colora").html(html);
            } 
        }); 
      
}

var modalGen = (a,c,m,z) =>{

  $("#modaladdproduct").modal('open');
  $("#idpres").val(a);
  $("#colorpre").val(c);
  $("#matpre").val(m);
  $("#sizepre").val(z);

}

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


var setComboMaterial = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../controller/caproduct.php?btngetData=getDataMaterial",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][1]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#matera").html(html);
            } 
        }); 
      
}


var setComboSize = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../controller/caproduct.php?btngetData=getDataSize",
            success: function(resp) {
            var values = eval(resp);        
              html+='';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][2]+"-"+values[i][1]+"'><span>"+values[i][1]+"-"+values[i][2]+"</span></option>";
               }
               $("#sizea").html(html);
            } 
        }); 
      
}

function openModalEdit(){

            $("#nameproduct").html("Producto: <b>"+$("#name_product").val()+"</b>");
            $('#modaledit').modal('open');
            //alert("holaaa");
         
}



function getDataProductD(id,color,material,size) {
	var dataString = 'id='+id+'&idcolor='+color+'&idmat='+material+'&idsiz='+size;
      
      $("#id_product").val(id);
      $("#idcolor").val(color);
      $("#idmat").val(material);
      $("#idsiz").val(size);
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetProdsc=getDataProc", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var htmlimg='';
            	
            	for (var i = 0; i < respu.length; i++) {
            		
					htmlimg+='<center><img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="display: block;margin-left: auto;margin-right: auto;padding:10px;" ></center>';
					$("#nameprode").html(respu[i].name_pro+'&nbsp;<button onclick="openModalEdit()" class="btn"><i class="material-icons">edit</i></button>');
                              $("#name_product").val(respu[i].name_pro);
					$("#id_product").val(id);
                              $("#quantitydeta").html(respu[i].quantity);
					$("#pricedeta").html("$"+parseFloat(respu[i].price).toFixed(2));  
					$("#discodeta").html(respu[i].discount*100+"%");   
					$("#imgpro").html(htmlimg);
            	}
            }
        });
}




