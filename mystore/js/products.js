
$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Store'));
	if(obj.name!=""){
		$("#namebusi").html(obj.name);
		mybusii(obj.idbusi);
		$("#idbusinp").val(obj.idbusi);
	}

	$("#cat").select2({
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


$("#tp").select2({
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

	$('#formproduct').submit(function() {

		  if(Validatep(1)==idinputp.length){ 
			$.ajax({
		            type: "POST",
		            url: "../controller/cuserhome.php?btnsetDataproduct=setDataproduct", 
		            data: $("#formproduct").serialize(),
		            success: function(resp) {
		                   if(resp==1){

		                    //getData();
		                     M.toast({html: "¡Se ha agregado el producto exitosamente!", classes: 'rounded  green'});
		                   		$('.modal').modal('close');
		                    cleanformp();
		                    cleanboxp();
		                   
		                   }
		                   else{
		                    M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
		                    
		                   }
		                     
		            }		
		                
		        });
		}
			return false;
		});


var idinputp = ['namep','descrip','pcompra','pventa','cat','tp'];
var idinputerrorp= ['txtnamep','txtdescrip','txtpcompra','txtpventa','txtcat','txttp'];
// var idinpute = ['namee','descripe','cate','tpe'];
// var idinputerrore= ['txtnamee','txtdescripe','txtcate','txttpe'];

var cleanformp = () => {
    idinputp.forEach(names => {
        $("#"+names).val(""); 
    });

}

var cleanboxp=()=>{
idinputerrorp.forEach(names => {
  $("#"+names).removeClass('successinputs');
   $("#"+names).html('');         
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
});




function mybusiis(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;
	localStorage.setItem('Store',JSON.stringify(obj));
	$("#namebusi").html(name);
	mybusii(id);
	
}

function details(id) {
	var obj = new Object();
	obj.idpro=id;
	localStorage.setItem('Product',JSON.stringify(obj));
	location.href="./details";
	      	
}

function mybusii(id) {
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
            		html+='<div class="col s12 m4 l3 animated fadeInUp" >';
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
            	if(respu.length==0){
            		$('.tap-target').tapTarget('open');
            	}
            	//alert(html);
            	$("#contentpro").html(html);
            	//$("#idbusinp").val(id);
            	
            	
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
					      //swal("Pikachu fainted! You gained 500 XP!");
					      break;
					 
					    case "catch":
					    	location.href="./productsnc";
					      break;
					 
					   
					  }
					});
            	}
            }
        });
}