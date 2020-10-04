<!--
=========================================================
* BLK Design System- v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/blk-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="398224959760-fl1jao45bnjeatr0g25h13lvnhv2r8tl.apps.googleusercontent.com">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <title>
    Vid•U Video Sharing Platform
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?php echo base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script src="https://apis.google.com/js/api:client.js"></script>
  <script>
    window.onLoadCallback = function(){
      gapi.load('auth2', function () {

  gapi.auth2.init({
      client_id: '398224959760-fl1jao45bnjeatr0g25h13lvnhv2r8tl.apps.googleusercontent.com'
    });
      });
    if(<?php if($this->session->flashdata('user_loggedout')!= null){echo 1;}else {echo 0;}?>){
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        auth2.disconnect();
        console.log('User signed out.');
      });
    }
}
    
        
      </script>
  <!-- <script>
  window.onLoadCallback = function(){
                gapi.load('auth2', function() {
                    gapi.auth2.init().then(function(){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            document.location.href = 'login.php';
                        });
                    });
                });
            };
          </script> -->
</head>

<body class="landing-page">

  <div class="wrapper">
    <div class="page-header">
      <div class="page-header-image"></div>
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
              <div id="square7" class="square square-7"></div>
              <div id="square8" class="square square-8"></div>
              <div class="card card-register">
                <div class="card-header">
                  <img class="card-img" src="<?php echo base_url(); ?>assets/img/square1.png" alt="Card image">
                  <h4 class="card-title">Hello</h4>
                </div>
                <div class="card-body">
                  <form class="form" action="Welcome_page/login" method="post">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-lock-circle"></i>
                        </div>
                      </div>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-check text-left">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember_me">
                        <span class="form-check-sign"></span>
                        Remember Me
                      </label>
                    </div>
                    <div class="form-check text-left">
                      <a href="Welcome_page/forgot_password"> Forgot password?</a>
                    </div>
                    <div class="g-recaptcha" style="margin-left:50px;margin-top:20px;" data-sitekey="6Ldjbv4UAAAAAF56tQWsTnrPWRaxBteJCwWSG7DY" data-callback="correctCaptcha"></div>
			<script>
                      var correctCaptcha = function(response) {
                      document.getElementById("recaptha").value = response;
                      };
                    </script>
			<input type="text" id="recaptha" name="recaptha" value='0' hidden>
                     <div class="card-footer">
                      <button style="margin-left:30px;margin-top:-10px" type="submit" name="submit" class="btn btn-primary btn-round btn-lg">LOGIN</button>
                      <a style="margin-left:20px;margin-top:-10px" href="<?php echo base_url(); ?>welcome_page/register" class="btn btn-success btn-round btn-lg">Register</a>
                    </div>
                  </form>
                  <div id="hidden_form_container" style="display:none;"></div>
                  <button class="btn btn-info btn-round " style="margin-left:100px;margin-top:-10px" id="google_sign_in_btn" onclick="startApp()">SignIn with Google</button>
                  </div>
                 </div>
            </div>
             <div class="col-md-6">
              <div class="px-md-5">
                <hr class="line-success">
                <h3>Awesome Video Sharing!</h3>
                <p>Vid.U is the best video sharing and viewing platform. It has all the amazing features you need.</p>
                <ul class="list-unstyled mt-5">
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-success mb-2">
                        <i class="tim-icons icon-vector"></i>
                      </div>
                      <div class="ml-3">
                        <h6>Personalised video recommendations</h6>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-success mb-2">
                        <i class="tim-icons icon-tap-02"></i>
                      </div>
                      <div class="ml-3">
                        <h6>Amazing viewing experience</h6>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-success mb-2">
                        <i class="tim-icons icon-single-02"></i>
                      </div>
                      <div class="ml-3">
                        <h6>Super friendly interface</h6>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>


          <div class="register-bg">

          </div>
          <div id="square1" class="square square-1"></div>
          <div id="square2" class="square square-2"></div>
          <div id="square3" class="square square-3"></div>
          <div id="square4" class="square square-4"></div>
          <div id="square5" class="square square-5"></div>
          <div id="square6" class="square square-6"></div>
        </div>

      </div>
    </div>

  </div>
  <script>
    <?php if ($this->session->flashdata('user_loggedin')) {
    ?> alert("<?php echo $this->session->flashdata('user_loggedin'); ?>");
    <?php
    } ?>

var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '398224959760-fl1jao45bnjeatr0g25h13lvnhv2r8tl.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('google_sign_in_btn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
          document.getElementById('google_sign_in_btn').innerText = "Signed in: " +
              googleUser.getBasicProfile().getName();
              onSignIn(googleUser);
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }

function google_sign_in() {
  gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 40,
        'height': 20,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
      
  }


    function onSignIn(googleUser) {

      var profile = googleUser.getBasicProfile();
      var theForm, newInput1, newInput2, newInput3, newInput4, newInput5;
      theForm = document.createElement('form');
      theForm.action = '<?php echo base_url(); ?>Welcome_page/google_login';
      theForm.method = 'post';
      newInput1 = document.createElement('input');
      newInput1.type = 'hidden';
      newInput1.name = 'user_name';
      newInput1.value = profile.getName();
      newInput2 = document.createElement('input');
      newInput2.type = 'hidden';
      newInput2.name = 'user_email';
      newInput2.value = profile.getEmail();
      newInput3 = document.createElement('input');
      newInput3.type = 'hidden';
      newInput3.name = 'user_firstname';
      newInput3.value = profile.getGivenName();
      newInput4 = document.createElement('input');
      newInput4.type = 'hidden';
      newInput4.name = 'user_lastname';
      newInput4.value = profile.getFamilyName();
      newInput5 = document.createElement('input');
      newInput5.type = 'hidden';
      newInput5.name = 'user_picture';
      newInput5.value = profile.getImageUrl();
      theForm.appendChild(newInput1);
      theForm.appendChild(newInput2);
      theForm.appendChild(newInput3);
      theForm.appendChild(newInput4);
      theForm.appendChild(newInput5);
      document.getElementById('hidden_form_container').appendChild(theForm);
      theForm.submit();
    }
      function onFailure(error) {
        console.log(error);
      }
      window.onload = startApp();
  </script>

  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>

</body>

</html>