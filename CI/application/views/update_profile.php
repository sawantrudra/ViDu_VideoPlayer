
<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-6 centered">
		<?php
					$attributes = array('name' => 'profile_upload', 'id' => 'profile_upload');
					echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>
			
			<h1 class="text-center"><?php echo "Update your Profile!!"; ?></h1>
			<div class="form-group">
				<input type="text" name="firstname" class="form-control" placeholder="Enter first Name" required autofocus>
            </div>
            <div class="form-group">
				<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required autofocus>
            </div>
            
            <div class="form-group">
			<input type="file" id="profile_image" name="profile_image">
            </div>
			<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
			
			<?php
					echo form_close();
                ?>
		</div>
	</div>
