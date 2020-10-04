<div><div class="form" style="margin:20%;">
<?php if($check){ echo form_open('welcome_page/reset_password'); ?>
<div class="row justify-content-center">
		<div class="col-md-6 col-md-offset-6 centered">
			<h1 class="text-center"><?php echo "Please enter a new password!"; ?></h1>
			
			<div class="form-group">
				<input type="password" id="password" name="password" class="form-control"  placeholder="New Password" required autofocus 
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
				title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" >
            </div>
            <div class="form-group">
				<input type="password" id="c_password" onchange="check_passwords(this.value)" name="confirm_password" class="form-control" placeholder="Confirm Password" required autofocus 
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be same as the above password!" >
			</div>
			<script>
				function check_passwords(str) {
										if (document.getElementById("password").value !== str) {
											document.getElementById("c_password").value = "";
											alert("Passwords do not match!");
										}
									}
			</script>
            <input type="hidden" id="user_name" name="user_name" value="<?php echo $user_name?>">
            <input type="hidden" id="user_email" name="user_email" value="<?php echo $user_email?>">
			<button type="submit" class="btn btn-primary btn-block">Log in</button>
		</div>
	</div>
</div>
<?php echo form_close(); }else{?>
	<h4>This link is not valid!</h4>
<?php }?>