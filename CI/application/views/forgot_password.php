<!-- <?php echo form_open('forgot_password'); ?> -->
<div><div class="form" style="margin:12%;">
<form action="forgot_password" method="post">
<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-6 centered">
			<h1 class="text-center"><?php echo "Enter your Email"; ?></h1>
			<div class="form-group">
				<input type="text" name="user_email" class="form-control" placeholder="example@domain.com" required autofocus>
			</div>
			
			<button type="submit" class="btn btn-primary btn-block" name="email_submit">Proceed</button>
		</div>
	</div>
</div>
</form>
<!-- <?php echo form_close(); ?> -->