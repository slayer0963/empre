

$(document).ready(function($) {




	$("#login").submit(function(event) {
		//alert("email="+$("#email").val()+"&password="+$("#password").val(),);
		$.ajax({
                type: "POST",
                url: "../controller/cuser.php?btnlogin=LC",
                data: "email="+$("#email").val()+"&password="+$("#password").val(),
                success: function(resp)
                {

                  var datos = eval(resp);

                 if(datos[0].tipo == 1){
                   location.href="./view";
                  }
                  else if(datos[0].tipo == 2){
										location.href="./mystore";
                  }
                  else if(datos[0].tipo == 4){
                    localStorage.setItem('client',datos[0].id);
                    localStorage.setItem('nameper',datos[0].nombre);
                    location.reload();
                  }
                  else if(datos[0].tipo == 3){
                     var obj = new Object();
                     obj.id = datos[0].id;
                     obj.name  = datos[0].nombre;
                     obj.img  = datos[0].imagen;
                     var jsonString= JSON.stringify(obj);
                    localStorage.setItem('motoper',jsonString);
										location.href="./deliveries";
                  }
                 else{

                  M.toast({html: '¡Verifique su usuario o contraseña!', classes: 'rounded red'});
                 }

                }
              });
		return false;
	});
});

function salir() {
  $.ajax({
                type: "POST",
                url: "../cn/sessiondestroy.php",
                success: function(resp)
                {

                  localStorage.removeItem('client');
                  localStorage.removeItem('nameper');
                  localStorage.removeItem('activemod');
                  location.reload();

                }
        });
}
