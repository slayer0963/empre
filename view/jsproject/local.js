

$(document).ready(function($) {

  if(localStorage.getItem('type')!=0){
    $(".loginoff").addClass('hidden');
    $(".loginon").removeClass('hidden');
  }
  else{
    $(".loginon").addClass('hidden');
    $(".loginoff").removeClass('hidden');
  }






	$("#login").submit(function(event) {
		//alert("email="+$("#email").val()+"&password="+$("#password").val(),);
		$.ajax({
                type: "POST",
                url: "controller/cuser.php?btnlogin=LC", 
                data: "email="+$("#email").val()+"&password="+$("#password").val(),
                success: function(resp) 
                {

                  var datos = eval(resp);
                  
                 if(datos[0].tipo == 1){
                   location.href="http://localhost/empre/view";
                  }
                  else if(datos[0].tipo == 2){
                   location.href="http://localhost/empre/mystorev2/";
                  }
                  else if(datos[0].tipo == 3){
                    $(".loginoff").addClass('hidden');
                    $(".loginon").removeClass('hidden');
                    localStorage.setItem('type', datos[0].tipo);
                    //alert("sdasdasddsa");
                  }
                 else{
                 	alert("Verifique su usuario o contraseña");

                 }

                }
              });
		return false; 
	});
});