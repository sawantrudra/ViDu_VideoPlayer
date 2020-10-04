<div class="row" >
	<div class="col-lg-4 col-md-4" style="margin-left:100px">
		<div class="wrapper ">
			<div class="page-header">
				<img src="../assets/img/dots.png" class="dots">
				<img src="../assets/img/path4.png" class="path">
				<div class="container align-items-center">
					<div class="row">

						<div class="col-lg-4 col-md-6">
							<div class="card card-coin card-plain" style="width: 20rem;">
								<div class="card-header">
									<?php if ($this->session->userdata('google_user')) echo '<img src=' . $google_picture . ' class="img-center img-fluid rounded-circle">';
									else echo '<img src="' . base_url() . 'uploads/profile_images/' . $profile_file_name . '" class="img-center img-fluid rounded-circle">'; ?>
									<div id="profile_info">
										<h3 class="title"> <?php echo $first_name ?><?php echo '  ' . $last_name ?></h3>

										<h4 class="title">Username: <?php echo '  ' . $user_name ?></h4>
										<h4 class="title">Email: <?php echo '  ' . $user_email ?></h4>

										<button class="btn btn-primary btn-simple" onclick="editInfo()">Edit</button>
									</div>
									<div id="edit_form" style="display: none;">
										<h3 class="title"> <?php echo $first_name ?><?php echo '  ' . $last_name ?></h3>
										<form action="update_profile" method="post" name="profile_upload" id="profile_upload" enctype="multipart/form-data">

											<div class="form-group">
												<input type="text" name="firstname" class="form-control" value="<?php echo $first_name ?>" required autofocus>
											</div>
											<div class="form-group">
												<input type="text" name="lastname" class="form-control" value="<?php echo $last_name ?>" required autofocus>
											</div>
											<div class="fileinput fileinput-new " data-provides="fileinput">
												<!-- <div class="fileinput-new thumbnail img-circle img-raised">
	<img src="/assets/img/placeholder.jpg" alt="...">
    </div> -->
												<!-- <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div> -->

												<!-- <span class="btn btn-raised btn-primary btn-simple btn-file"> -->
												<!-- <span class="fileinput-new">Add Photo</span> -->
												<!-- <span class="fileinput-exists">Change</span> -->



												<input type="file" id="profile_image" name="profile_image" class="form-control" />

												<!-- </span> -->
												<!-- <br />
        <a href="javascript:;" class="btn btn-simple btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a> -->

											</div>
											<!-- <div class="form-group">
										<input type="file" id="profile_image" name="profile_image" class="form-control" >
									</div> -->
											<input id="save" onclick="saveDetails()" type="submit" name="submit" class="btn btn-primary" value="Submit">

										</form>
									</div>

									<script>
										function editInfo() {
											document.getElementById("profile_info").style.display = "none";
											document.getElementById("edit_form").style.display = "block";
										}

										function saveDetails() {
											document.getElementById("edit_form").style.display = "none";
											document.getElementById("profile_info").style.display = "block";
										}
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
