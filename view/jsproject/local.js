

$(document).ready(function($) {
	$("#login").submit(function(event) {
		//alert("email="+$("#email").val()+"&password="+$("#password").val(),);
		$.ajax({
                type: "POST",
                url: "controller/cuser.php?btnlogin=LC", 
                data: "email="+$("#email").val()+"&password="+$("#password").val(),
                success: function(resp) 
                {
                 if(resp >= 1){
                   location.href="http://localhost/empre/view";
               }
                 else{
                 	alert("Verifique su usuario o contraseña");

                 }

                }
              });
		return false; 
	});
});