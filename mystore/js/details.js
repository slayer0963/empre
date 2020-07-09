
$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Product'));
	if(obj.idpro!=""){
		details(obj.idpro);
	}
});




function mybusiis(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;
	localStorage.setItem('Store',JSON.stringify(obj));
	location.href="./products";
	
	
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
            		
					html+='<img src="../view/imgdetails/'+respu[i].img+'" class="responsive-img" style="height: 250px; width: 100%;">';
						    $("#nameprode").html(respu[i].name_pro); 
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




