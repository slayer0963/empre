	var contclick=0;


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








$("#colora").select2({
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





	setComboCat();
	setComboTp();
	$("#btnmedit").click(function(event) {
		
		if(contclick==0){
			$(".editbusi").removeClass('hide');
			M.toast({html: "¡Modo Edicion activado!", classes: 'rounded  green'});
			contclick+=1;
		}
		else{
			$(".editbusi").addClass('hide');
			M.toast({html: "¡Modo Edicion desactivado!", classes: 'rounded  black'});
			contclick=0;
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

		$("#back").click(function(event) {
			$("#menu").addClass('zoomOut');

            	setTimeout(function(){ 
			        $("#menu").addClass('hide');
			        $("#business").removeClass('hide');
			        $("#business").removeClass('zoomOut');
			        $("#business").addClass('zoomIn');
			        $("#contenidomenu").addClass('hide');
			      }, 500);
		});

		$("#backe").click(function(event) {
			$("#products").addClass('zoomOut');

		    setTimeout(function(){ 
				$("#products").addClass('hide');
				$("#menu").removeClass('hide');
				$("#menu").removeClass('zoomOut');
				$("#menu").addClass('zoomIn');
			}, 500);
		});

		$("#backes").click(function(event) {
			$("#stadis").addClass('zoomOut');

		    setTimeout(function(){ 
				$("#stadis").addClass('hide');
				$("#menu").removeClass('hide');
				$("#menu").removeClass('zoomOut');
				$("#menu").addClass('zoomIn');
			}, 500);
		});

		$("#backd").click(function(event) {
			$("#details").addClass('zoomOut');

		    setTimeout(function(){ 
				$("#details").addClass('hide');
				$("#products").removeClass('hide');
				$("#products").removeClass('zoomOut');
				$("#products").addClass('zoomIn');
			}, 500);
		});

		$("#viewpro").click(function(event) {
				$("#menu").addClass('zoomOut');
				$("#menu").removeClass('zoomIn');
			    setTimeout(function(){ 
					$("#menu").addClass('hide');
					$("#products").removeClass('hide');
					$("#products").removeClass('zoomOut');
					$("#products").addClass('zoomIn');
				}, 500);
				return false;
		});

		$("#viewsta").click(function(event) {
				$("#menu").addClass('zoomOut');
				$("#menu").removeClass('zoomIn');
			    setTimeout(function(){ 
					$("#menu").addClass('hide');
					$("#stadis").removeClass('hide');
					$("#stadis").removeClass('zoomOut');
					$("#stadis").addClass('zoomIn');
				}, 500);
				return false;
		});


$("#cat").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#addpro"),
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
    dropdownParent: $("#addpro"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

		/*save busi*/
		$('#formbusi').submit(function() {
		  if(Validate(1)==idinput.length){
		    var formData = new FormData(document.getElementById("formbusi"));
		      formData.append("dato", "valor");
			         $.ajax({
		            type: "POST",
		            url: "../controller/cuserhome.php?btnsetDataBusi=setData", 
		            data: formData,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success: function(resp) {
		             
		                   if(resp==1){
		                    getdata($("#user").val());
		                    cleanform();
		                    cleanbox();
		                    $('.modal').modal('close');
		                    M.toast({html: "¡Se ha agregado el negocio exitosamente!", classes: 'rounded  green'});
		                    
		                     
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

$("#backmenuprin").click(function(event) {
	$("#productnocombimen").addClass('zoomOut');
	$("#productnocombimen").removeClass('zoomIn');
					    setTimeout(function(){ 
							$("#productnocombimen").addClass('hide');
							$("#menu").removeClass('hide');
							$("#menu").removeClass('zoomOut');
							$("#menu").addClass('zoomIn');
						}, 500);
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

$("#backmenuf").click(function(event) {
	
	$("#datospro").addClass('zoomOut');
	$("#datospro").removeClass('zoomIn');
					    setTimeout(function(){ 
							$("#datospro").addClass('hide');
							$("#productnocombimen").removeClass('hide');
							$("#productnocombimen").removeClass('zoomOut');
							$("#productnocombimen").addClass('zoomIn');
						}, 500);
});

$("#generar").click(function(event) {
	alert($("#idprod").val());
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
                  var dataString = 'idprod='+$("#idprod").val()+'&idcolor='+colores[i]+'&idmaterial='+materiales[j]+'&idsize='+tallas[k];
                  $.ajax({
                    type: "GET",
                    url: "../controller/caproduct.php?btngetData=getDataExist",
                    data: dataString,
                    success: function(resp) {
                      alert(resp);
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



		$('#formbusie').submit(function() {
		  if(Validate(0)==idinpute.length){
		    var formData = new FormData(document.getElementById("formbusie"));
		      formData.append("dato", "valor");
			         $.ajax({
		            type: "POST",
		            url: "../controller/cuserhome.php?btnsetDataBusie=setData", 
		            data: formData,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success: function(resp) {
		             
		                   if(resp==1){
		                    getdata($("#usere").val());
		                    //cleanform();
		                    cleanbox();
		                    $('.modal').modal('close');
		                    M.toast({html: "¡Se ha modificado el negocio exitosamente!", classes: 'rounded  green'});
		                    
		                     
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

		$('#formproduct').submit(function() {

		  if(Validatep(1)==idinputp.length){ 
			$.ajax({
		            type: "POST",
		            url: "../controller/cuserhome.php?btnsetDataproduct=setDataproduct", 
		            data: $("#formproduct").serialize(),
		            success: function(resp) {

		                   if(resp==1){
		                    //getData();
		                    cleanformp();
		                    cleanboxp();
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
		var idinput = ['img','name'];
		var idinputerror= ['txtimg','txtname'];
		var idinpute = ['imge','namee'];
		var idinputerrore= ['txtimge','txtnamee'];


var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });

}


var cleanbox=()=>{
idinputerror.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
idinputerrore.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
}

var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinput.forEach(names => {
          
       if($("#"+names).val()!=0){
        
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

var idinputp = ['namep','descrip','pcompra','pventa','cat','tp'];
var idinputerrorp= ['txtnamep','txtdescrip','txtpcompra','txtpventa','txtcat','txttp'];
// var idinpute = ['namee','descripe','cate','tpe'];
// var idinputerrore= ['txtnamee','txtdescripe','txtcate','txttpe'];

var cleanformp = () => {
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}

var cleanboxp=()=>{
idinputerrorp.forEach(names => {
  $("#"+names).removeClass('successinputs');      
});
// idinputerrore.forEach(names => {
//   $("#"+names).removeClass('successinputs');      
// });
}

var Validatep = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinputp.forEach(names => {
          
       if($("#"+names).val() !=0){
         validate+=1;
         html="Listo";
         $("#"+idinputerrorp[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrorp[count]).removeClass('errorinputs');
         $("#"+idinputerrorp[count]).addClass('successinputs');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerrorp[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrorp[count]).removeClass('successinputs');      
         $("#"+idinputerrorp[count]).addClass('errorinputs'); 
       }
       count++;
    });
  }
  // else{
  //  idinpute.forEach(names => {
  //      if($("#"+names).val().length > 0){
  //       validate+=1;
  //        $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
  //        $("#"+idinputerrore[counte]).removeClass('errorinputs');
  //        $("#"+idinputerrore[counte]).addClass('successinputs');
  //      }
  //      else{
  //        $("#"+idinputerrore[counte]).html($("#"+names).attr('title')); 
  //        $("#"+idinputerrore[counte]).removeClass('successinputs');
  //        $("#"+idinputerrore[counte]).addClass('errorinputs');
  //      }
  //       counte++;
  //   });

  // }

    return validate;
}





		/**/


	});



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
                   html+="<option value='"+values[i][2]+"'><span>"+values[i][1]+"-"+values[i][2]+"</span></option>";
               }
               $("#sizea").html(html);
            } 
        }); 
      
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
            		
					html+='<img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="height: 250px; width: 100%;">';
						    $("#nameprode").html(respu[i].name_pro); 
					getDataProductD(respu[i].id_pro,respu[i].id_color,respu[i].id_material,respu[i].id_size);
            	}
            	
            	
            	$("#imgpro").html(html);

	$("#products").addClass('zoomOut');
	$("#products").removeClass('zoomIn');
    setTimeout(function(){ 
		$("#products").addClass('hide');
		$("#details").removeClass('hide');
		$("#details").removeClass('zoomOut');
		$("#details").addClass('zoomIn');
	}, 500);
	}
            });
}






function mybusii(id,name) {
		var dataString = 'id='+id;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetpro=getData", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var html='';
            	validateproduct(id);
            	for (var i = 0; i < respu.length; i++) {
            		html+='<div class="col s12 m4 l3 " >';
						      html+='<div class="card ">';
						        html+='<div class="card-image">';
						          html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height: 150px;">';
						          html+='<a class="btn-floating halfway-fab waves-effect waves-light red" onclick="details('+respu[i].id_pro+');"><i class="material-icons">edit</i></a>';
						        html+='</div>';
						        html+='<div class="card-content">';
						          html+='<p>'+respu[i].name_pro+'</p>';
						        html+='</div>';
						      html+='</div>';
						    html+='</div>';	   
            	}
            	
            	$("#namebusi").html(name);
            	$("#idbusinp").val(id);
            	$("#contentpro").html(html);
            	$("#business").addClass('zoomOut');
            	$("#contenidomenu").removeClass('hide');

            	setTimeout(function(){ 

			        $("#business").addClass('hide');
			        $("#menu").removeClass('hide')
			        $("#menu").removeClass('zoomOut');;
			        $("#menu").addClass('zoomIn');
			      }, 500);
            	
            }
            });
}

function validateproduct(id) {
	var dataString = 'id='+id;
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btnvalidatepro=getvaData", 
            data: dataString,
            success: function(resp) {
            	var res = eval(resp);
            	if(res.length>0){
            		
            		swal("Tiene algunos productos pendientes de ingreso por lo tanto no apareceran en la tienda", {
					  buttons: {
					    cancel: "No en este momento",
					    catch: {
					      text: "Ver productos!",
					      value: "catch",
					    },
					    
					  },
					})
					.then((value) => {
					  switch (value) {
					 
					    case "defeat":
					      swal("Pikachu fainted! You gained 500 XP!");
					      break;
					 
					    case "catch":
					    $("#menu").addClass('zoomOut');
						$("#menu").removeClass('zoomIn');
					    setTimeout(function(){ 
							$("#menu").addClass('hide');
							$("#productnocombimen").removeClass('hide');
							$("#productnocombimen").removeClass('zoomOut');
							$("#productnocombimen").addClass('zoomIn');
						}, 500);

						var html='';
					      for (var i = 0; i < res.length; i++) {
					      	html+='<div class="col s12 m4 l3 " >';
						      html+='<div class="card ">';
						        html+='<div class="card-image">';
						          html+='<a class="btn-floating halfway-fab waves-effect waves-light red" onclick="adddetailspro('+res[i].id_pro+');"><i class="material-icons">edit</i></a>';
						        html+='</div>';
						        html+='<div class="card-content">';
						          html+='<p>'+res[i].name_pro+'</p>';
						        html+='</div>';
						      html+='</div>';
						    html+='</div>';	   
					      }

					      $("#productnocombi").html(html);
					      break;
					 
					   
					  }
					});
            	}
            }
        });
}

var setComboCat = () =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../controller/cproduct.php?btngetData=getDataCategories",
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

var setComboTp = () =>{
  var html="";

          $.ajax({
            type: "POST",
            url: "../controller/cproduct.php?btngetData=getDataProductType",
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



function getdata(id) {
	var dataString = 'id='+id;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetbusines=getDatab", 
            data: dataString,
            success: function(resp) {
            	var html='';

            	var respu = eval(resp);

            	for (var i = 0; i < respu.length; i++) {
  

				html+='<div  class="col s12 m6 l3 center-align animated slideInDown ">';
									html+='<div class="card">';
	   									 html+='<div class="card-image waves-effect waves-block waves-light">';
	   									   html+='<img class="activator" src="../view/imgbusiness/'+respu[i].pic_logo_bus+'" style="height: 150px; width: 100%;">';
	   									 html+='</div>';
	   									 html+='<div class="card-content">';
	   									   html+='<span class="card-title activator grey-text text-darken-4">'+respu[i].name_bus+'<i class="material-icons right">more_vert</i></span>';
	   									   html+='<p><a href="#" class="btn" onclick="mybusii('+respu[i].id_bus+','+String("'"+respu[i].name_bus+"'")+');">Ver negocio</a>&nbsp;';
	   									   if(contclick==1){
	   									   	html+='<a class="btn yellow modal-trigger  editbusi" href="#editbusi" onclick="fillboxbusi('+respu[i].id_bus+','+String("'"+respu[i].name_bus+"'")+','+String("'"+respu[i].pic_logo_bus+"'")+')" ><i class="material-icons ">edit</i></a></p>';
	   									   }
	   									   else{
	   									   	html+='<a class="btn yellow modal-trigger hide editbusi" href="#editbusi" onclick="fillboxbusi('+respu[i].id_bus+','+String("'"+respu[i].name_bus+"'")+','+String("'"+respu[i].pic_logo_bus+"'")+')" ><i class="material-icons ">edit</i></a></p>';
	   									   }
	    									html+='</div>';
	   									 html+='<div class="card-reveal">';
	      									html+='<span class="card-title grey-text text-darken-4">'+respu[i].name_bus+'<i class="material-icons right">close</i></span>';
	      									html+='<div class="collection">';
	      									html+='<p><a href="#!" class="collection-item"><span class="new badge blue">4</span>Pedidos</a></p>';
	      									html+='</div>';
	    									html+='</div>';
	  									html+='</div>';
								html+='</div>';
							}
            	$("#containerbusi").html(html);
            }
        });
}


function fillboxbusi(id,name,pic){
	//alert(id+"----"+name+"----"+pic+"------"+contclick);

	$("#imge").val(pic);
	$("#imgcontainere").attr("src","../view/imgbusiness/"+pic);
	$("#namee").val(name);
	$("#idbue").val(id);
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

function adddetailspro(idpro) {
	$("#idprod").val(idpro);
	$("#productnocombimen").addClass('zoomOut');
	$("#productnocombimen").removeClass('zoomIn');
					    setTimeout(function(){ 
							$("#productnocombimen").addClass('hide');
							$("#datospro").removeClass('hide');
							$("#datospro").removeClass('zoomOut');
							$("#datospro").addClass('zoomIn');
						}, 500);
}


function getDataProductD(id,color,material,size) {
	var dataString = 'id='+id+'&idcolor='+color+'&idmat='+material+'&idsiz='+size;
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetProdsc=getDataProc", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var htmlimg='';
            	
            	for (var i = 0; i < respu.length; i++) {
            		
					htmlimg+='<img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="height: 250px; width: 100%;">';
					$("#nameprode").html(respu[i].name_pro);
					$("#quantitydeta").html(respu[i].quantity);
					$("#pricedeta").html("$"+respu[i].price);  
					$("#discodeta").html(respu[i].discount);   
					$("#imgpro").html(htmlimg);
            	}
            }
        });
}