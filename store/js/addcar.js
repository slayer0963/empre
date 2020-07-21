$(document).ready(function() {
	$("#addcar").click(function () {
        
        if(localStorage.getItem('nameper')==""){
            
            $('#loginm').modal('open');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "../controller/cuserhome.php?btnsetshcar=setshcar", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
	            	if(resp==1){
	            		M.toast({html: 'Producto agregado', classes: 'rounded green'});
 						
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: 'El producto ya esta en el carrito !', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		alert("Problemas");
	            	}

	            }
	        });
	    }
     });
});