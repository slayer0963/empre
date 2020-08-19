


$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Store'));
	if(obj.idbusi!=""){
		//alert(obj.idbusi);
		validateproduct(obj.idbusi);
		$("#namebusi").html(obj.name);
	}
});




function mybusii(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;
	localStorage.setItem('Store',JSON.stringify(obj));
	location.href="./products";
	
	
}

function validateproduct(id) {
	var dataString = 'id='+id;
	$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btnvalidatepro=getvaData", 
            data: dataString,
            success: function(resp) {
            	var res = eval(resp);
            
            		
            		

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
					     
					  
            	
            }
        });
}

function adddetailspro(id) {
	var obj = new Object();
	obj.idpro=id;
	localStorage.setItem('Product',JSON.stringify(obj));
	location.href="./combinations";
}