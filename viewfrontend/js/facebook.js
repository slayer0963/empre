  logInWithFacebook = function() {

    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Wellcome');
       	 FB.api('/me','GET',{"fields":"id,name,email,"},
        function(response) {
	       console.log('Good to see you, ' + response.name + '.'+response.email);
	     });
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