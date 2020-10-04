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
</head>

<body class="register-page">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="https://demos.creative-tim.com/blk-design-system/index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
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
								Vid•U Video Sharing Platform
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
					<li class="nav-item p-0">
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
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Back to Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://github.com/creativetimofficial/blk-design-system/issues">Have an issue?</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
	<div class="wrapper">
		<div class="page-header">
			<div class="page-header-image"></div>
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 offset-lg-0 offset-md-3">
							<div id="square7" class="square square-7"></div>
							<div id="square8" class="square square-8"></div>
							<div class="card card-register">
								<div class="card-header">
									<img class="card-img" src="../assets/img/square1.png" alt="Card image">
									<h4 class="card-title">Register</h4>
								</div>
								<div class="card-body">
									<form class="form" action="register" method="post" style="margin: 5%;margin-top:0%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-single-02"></i>
												</div>
											</div>
											<input type="text" class="form-control" id="username" placeholder="User Name" name="username" onchange="check_username(this.value)" required>
										</div>
										<div class="input-group" id="email_div" data-toggle="tooltip" data-placement="right" title="Enter valid email address">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-email-85"></i>
												</div>
											</div>
											<input type="text" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email example@domain.com" title="Must be a valid email address" onchange="check_email(this.value)" required class="form-control" name="useremail">
										</div>
										<div class="input-group" data-toggle="tooltip" data-placement="right" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-lock-circle"></i>
												</div>
											</div>
											<input type="text" class="form-control" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="password">
										</div>
										<div class="input-group" data-toggle="tooltip" data-placement="right" title="Re-Enter the Password">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-lock-circle"></i>
												</div>
											</div>
											<input type="password" class="form-control" id="c_pass" onchange="check_passwords(this.value)" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="confirm_password" required>
										</div>
										<div class="form-group" data-toggle="tooltip" data-placement="right" title="Select one of the Questions.">
											<label for="exampleFormControlSelect1">Security Question 1:</label>
											<select class="form-control" id="question_1" name="question_1">
												<option value="What is the name of your first pet?">What is the name of your first pet?</option>
												<option value="What is your favourite hobby?">What is your favourite hobby</option>
												<option value="Which is you favourite car">Which is you favourite car</option>
												<option value="Which is your favourite toy as a kid?">Which is your favourite toy as a kid?</option>

											</select>
										</div>
										<div class="input-group" data-toggle="tooltip" data-placement="right" title="Select an answer for the above question.">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-bulb-63"></i>
												</div>
											</div>
											<input type="text" name="answer_1" class="form-control" placeholder="Answer to Question 1" required autofocus>
										</div>
										<div class="form-group" data-toggle="tooltip" data-placement="right" title="Select one of the Questions.">
											<label for="exampleFormControlSelect2">Security Question 2:</label>
											<select class="form-control" id="question_2" name="question_2">
												<option value="What is the name of your first pet?">What is the name of your first pet?</option>
												<option value="What is your favourite hobby?">What is your favourite hobby</option>
												<option value="Which is you favourite car">Which is you favourite car</option>
												<option value="Which is your favourite toy as a kid?">Which is your favourite toy as a kid?</option>
											</select>
										</div>
										<div class="input-group" data-toggle="tooltip" data-placement="right" title="Select an answer for the above question.">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="tim-icons icon-bulb-63"></i>
												</div>
											</div>
											<input type="text" name="answer_2" class="form-control" placeholder="Answer to Question 1" required autofocus>
										</div>
										<div class="form-check text-left">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" required>
												<span class="form-check-sign"></span>
												I agree to the
												<a href="javascript:void(0)">terms and conditions</a>.
											</label>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-round btn-lg">Register Me !</button>
										</div>
									</form>
								</div>
								<script>
									function check_passwords(str) {
										if (document.getElementById("pass").value !== str) {
											alert("Passwords do not match!");
										}
									}

									function check_username(str) {
										if (window.XMLHttpRequest) {
											// code for IE7+, Firefox, Chrome, Opera, Safari
											xmlhttp = new XMLHttpRequest();
										} else { // code for IE6, IE5
											xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
										}
										xmlhttp.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
												if (this.responseText == 0) {
													document.getElementById("username").value = "";
													alert("Username name already exists! Please chose a different username.")
												}
											}
										}
										xmlhttp.open("GET", "<?php echo base_url(); ?>Welcome_page/check_username?str=" + str, true);
										xmlhttp.send();
									}

									function check_email(str) {
										if (window.XMLHttpRequest) {
											// code for IE7+, Firefox, Chrome, Opera, Safari
											xmlhttp = new XMLHttpRequest();
										} else { // code for IE6, IE5
											xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
										}
										xmlhttp.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
												if (this.responseText == 0) {
													document.getElementById("email").value = "";
													alert("Email already registered! Please chose a different email or proceed to Login!.")
												}
											}
										}
										xmlhttp.open("GET", "<?php echo base_url(); ?>Welcome_page/check_email?str=" + str, true);
										xmlhttp.send();
									}
								</script>

								<!-- <div class="card-footer">
                  <a href="javascript:void(0)" class="btn btn-info btn-round btn-lg">Get Started</a>
                </div> -->
							</div>
						</div>
					</div>
					<div class="register-bg"></div>
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
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
	<script src="../assets/js/plugins/bootstrap-switch.js"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
	<!-- Chart JS -->
	<script src="../assets/js/plugins/chartjs.min.js"></script>
	<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
	<script src="../assets/js/plugins/moment.min.js"></script>
	<script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<!-- Black Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/demo/demo.js"></script>
	<!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
</body>

</html>