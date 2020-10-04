
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
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Vid•U Video Sharing Platform
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />
    <link
  href="https://unpkg.com/video.js@7/dist/video-js.min.css"
  rel="stylesheet"
/>

<!-- City -->
<link
  href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css"
  rel="stylesheet"
/>

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <style>

.dropdown-content {
  /* display: none; */
  position: absolute;
  top:50px;
  background-color: #f9f9f9;
  /* min-width: auto; */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

</style>
    <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").className="dropdown-content";
    }
  }
  xmlhttp.open("GET","<?php echo base_url();?>Home_page/livesearch?q="+str,true);
  xmlhttp.send();
}
</script>
</head>

<body class="profile-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="" rel="tooltip" title="Created by Creative Rudra Sawant" data-placement="bottom" target="_blank">
                    <span>Vid•U</span> Video Sharing Platform
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a>
                Vid•U
              </a>
                        </div>
                        <div class="col-6 collapse-close text-right">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav">
                <li class="nav-item">
                <!-- <h6 class="display-4" >Welcome <?php echo $this->session->userdata('username'); ?>  </h6> -->
                    </li>
                    <!-- <li class="nav-item p-0">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fab fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item p-0">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item p-0">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fab fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>welcome_page/login">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>profile_page/"> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>video_upload/"> Upload Video </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>profile_page/"> Profile</a>
                    </li> -->
                </ul><form class="form-inline ml-auto">
                <div class="form-group no-border ">
                   
                  <input type="text" class="form-control" onkeyup="showResult(this.value)" placeholder="Search">
                  <div id="livesearch"></div>
                    
                </div>
            </form>
                    <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <button  class="btn btn-primary  btn-sm" href="<?php echo base_url(); ?>Welcome_page"> Login </button>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
            <a  class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Welcome_page/logout"> Logout </a>
           </li>
           <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

  