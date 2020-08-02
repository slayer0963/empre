
function onSuccess(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id_token = googleUser.getAuthResponse().id_token;
        console.log(id_token);
        iniciar(profile.getId(),profile.getName(),profile.getEmail(),profile.getImageUrl());
}
function onFailure(error) {
      console.log(error);
    }
function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
function iniciar(id,nombre,email,foto) {

                 $.ajax({
                type: "POST",
                url: "controller/cuser.php?btnlogin=GG", 
                data:"id="+id+"&nombre="+nombre+"&correo="+email+"&foto="+foto,
                success: function(resp) 
                {
                 if(resp >= 1){
                   location.href="http://localhost/empre/";
                 }
                 else{
                  M.toast({html: 'Creemos que no tienes cuenta con nosotros, ve y registrate!', classes: 'rounded orange'});
                 }              
                }
              });

  }