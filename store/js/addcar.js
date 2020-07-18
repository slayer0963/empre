$(document).ready(function() {
	$("#addcar").click(function () {
        
        if(localStorage.getItem('nameper')==""){
            $("#modallogin").modal('show');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "../controller/cuserhome.php?btnsetshcar=setshcar", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
	            	if(resp==1){
	            		alertify.set('notifier','position', 'bottom-center');
 						alertify.success('Producto agregado');
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		alertify.set('notifier','position', 'bottom-center');
 						alertify.warning('El producto ya esta en el carrito');
	            	}
	            	else{
	            		alert("Problemas");
	            	}

	            }
	        });
	    }
     });
});