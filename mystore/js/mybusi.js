	

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
            url: "../controller/cuserhome.php?btngetpro=getData", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var html="";
            	for (var i = 0; i < respu.length; i++) {
            		html+='<div class="col s12 m4 l3 ">';
						      html+='<div class="card ">';
						        html+='<div class="card-image">';
						          html+='<img src="../view/imgproduct/'+respu[i].img+'">';
						          html+='<a class="btn-floating halfway-fab waves-effect waves-light red" onclick="details(1);"><i class="material-icons">edit</i></a>';
						        html+='</div>';
						        html+='<div class="card-content">';
						          html+='<p>'+respu[i].name_pro+'</p>';
						        html+='</div>';
						      html+='</div>';
						    html+='</div>';
            	}
            	
            	
            	$("#contentpro").html(html);
            	$("#business").addClass('zoomOut');

            	setTimeout(function(){ 
			        $("#business").addClass('hide');
			        $("#products").removeClass('hide');
			        $("#products").addClass('zoomIn');
			      }, 1000);
            	
            }
            });
}