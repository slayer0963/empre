	

function details(id) {
	$("#products").addClass('zoomOut');
    setTimeout(function(){ 
		$("#products").addClass('hide');
		$("#details").removeClass('hide');
		$("#details").addClass('slideInUp');
	}, 1000);
}



function mybusii(id) {
		var dataString = 'id='+id;
	      		$.ajax({
            type: "POST",
            url: "../controller/cproduct.php?btngetpro=getData", 
            data: dataString,
            success: function(resp) {
            	//alert(resp);
            	$("#business").addClass('zoomOut');

            	setTimeout(function(){ 
			        $("#business").addClass('hide');
			        $("#products").removeClass('hide');
			        $("#products").addClass('zoomIn');
			      }, 1000);
            	
            }
            });
}