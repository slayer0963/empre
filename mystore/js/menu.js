
$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Store'));
	if(obj.name!=""){
		$("#namebusi").html(obj.name);
	}
	getdata($("#us").val(),obj.idbusi);
});




function mybusii(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;

	localStorage.setItem('Store',JSON.stringify(obj));
	location.href="./menu";
}

function getdata(id,bus) {
	//alert(id);
	var dataString = 'id='+id+'&bus='+bus;
		
	      		$.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetbusines=getDatabb", 
            data: dataString,
            success: function(resp) {
            	//alert(resp);
            	var html='';

            	var respu = eval(resp);

            	for (var i = 0; i < respu.length; i++) {
  

				$("#val").html(respu[i].pedidosactivos);
							}
            	
            }
        });
}