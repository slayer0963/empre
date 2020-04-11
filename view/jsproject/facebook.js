  logInWithFacebook = function() {
var userInfo="";
var ud
    FB.login(function(response) {
      if (response.authResponse) {
        FB.api(
          '/me',
          'GET',
          {"fields":"id,name,email,picture"},
          function(response) {         
            iniciarfb(response.id,response.name,response.email,response.picture.data.url);
          }
        );
      } else {
        alert('User cancelled login or did not fully authorize.');
      }
    });
    return false;
  };

  window.fbAsyncInit = function() {
    FB.init({
      appId: '759274627855540',
      cookie: true, // This is important, it's not enabled by default
      version: 'v2.2'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  function iniciarfb(id,nombre,email,foto) {
                 $.ajax({
                type: "POST",
                url: "controller/cuser.php?btnlogin=FB", 
                data:"id="+id+"&nombre="+nombre+"&correo="+email+"&foto="+foto,
                success: function(resp) 
                {
                  alert(resp);
                 if(resp > 0){
                   location.href="http://localhost/empre/view";
                 }
                }
              });
  }