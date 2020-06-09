function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;
  console.log(id_token);
  iniciar(profile.getId(),profile.getName(),profile.getEmail(),profile.getImageUrl());
}

function iniciar(id,nombre,email,foto) {

                 $.ajax({
                type: "POST",
                url: "controller/cuser.php?btnlogin=GG", 
                data:"id="+id+"&nombre="+nombre+"&correo="+email+"&foto="+foto,
                success: function(resp) 
                {
                 if(resp >= 1){
                   location.href="http://localhost/empre/view";
                 }              
                }
              });

  }