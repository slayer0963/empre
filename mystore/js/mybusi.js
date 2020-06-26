	
	$(document).ready(function() {
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


