<div><div class="form" style="margin:12%;">
<?php echo form_open('welcome_page/answer_security_questions'); ?>
<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-6 centered">
			<h1 class="text-center"><?php echo "Answer the following questions: "; ?></h1>
			<div class="form-group">
                <p><?php echo $question_1;?></p>
				<input type="text" name="answer_1" class="form-control" placeholder="Answer" required autofocus>
			</div>
			<div class="form-group">
                <p><?php echo $question_2;?></p>
				<input type="text" name="answer_2" class="form-control" placeholder="Answer" required autofocus>
            </div>
            <input type="hidden" id="user_email" name="user_email" value="<?php echo $user_email?>">
			<button type="submit" class="btn btn-primary btn-block" name="answers_submit" data-toggle="modal" data-target="#exampleModal">Submit!</button>
			<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vid.U Administrator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>An email with a password reset link has been sent to your registerd email addreess. Please check your inbox and proceed with the password reset process.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>