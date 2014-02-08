  window.fbAsyncInit = function(){
    FB.init({
      appId      : '596872700396629',
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    console.log("test");
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        console.log("connected");
      } else if (response.status === 'not_authorized') {
        console.log("not auth");
        window.location.replace('/index.html');
      } else {
        console.log("not logged in");
        window.location.replace('/index.html');
      }
    });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "http://connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));