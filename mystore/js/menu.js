
$(document).ready(function() {
	var obj =JSON.parse(localStorage.getItem('Store'));
	if(obj.name!=""){
		$("#namebusi").html(obj.name);
	}
});




function mybusii(id,name){

	var obj = new Object();

	obj.idbusi=id;
	obj.name=name;

	localStorage.setItem('Store',JSON.stringify(obj));
	location.href="./menu";
}