	
	$(document).ready(function() {


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


		var idinput = ['img','name'];
		var idinputerror= ['txtimg','txtname'];


var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });
}


var cleanbox=()=>{
idinputerror.forEach(names => {
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
  // else{
  //  idinpute.forEach(names => {
  //      if($("#"+names).val()!=0){
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



function details(id) {
	var dataString = 'id='+id;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetproid=getData", 
            data: dataString,
            success: function(resp) {

            	alert(resp);
            	var respu = eval(resp);
            	var html='';
            	
            	for (var i = 0; i < respu.length; i++) {
            		
					html+='<img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="height: 250px; width: 100%;">';
						     

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



function mybusii(id) {
		var dataString = 'id='+id;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetpro=getData", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var html='';
            	
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
            		html+='<a onclick="mybusii('+respu[i].id_bus+');" class="col s12 m6 l4 center-align animated slideInDown ">';
				html+='<div class="cardss ">';
				html+='<div class=" transparent">';
				html+='<img class="activator responsive-img" src="../view/imgbusiness/'+respu[i].pic_logo_bus+'" style="height: 150px; width: 100%;">';
				html+='</div>';
				html+='<h6 id="namesbusi" class="card-title activator white-text text-darken-4">'+respu[i].name_bus+'</h6>';
				html+='</div>';
				html+='</a>';
            	}
            	html+='<div class="col s12 m6 l4 center-align animated slideInDown ">';
				html+='<a class="btn-floating  btn-large waves-effect waves-light black modal-trigger" href="#addbusi" style="margin-top: 3rem;"><i class="material-icons green">add</i></a>';
				html+='</div>';

            	$("#containerbusi").html(html);
            }
        });
}
