
    <div class="page-header" style="margin-top:-280px;" >
      
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
              <div id="square7" class="square square-7"></div>
              <div id="square8" class="square square-8"></div>
              <div class="card card-register">
                <div class="card-header">
                  <img class="card-img" src="../assets/img/square1.png" alt="Card image">
                  <h4 class="card-title">Upload</h4>
                </div>
                <div class="card-body">
                <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<p>' . $success . '</p>';
                echo '</div>';

                //traditional video play - less than HTML5
                // echo '<object width="338" height="300">
                //   <param name="src" value="' . $video_path . '/' . $video_name . '">
                //   <param name="autoplay" value="false">
                //   <param name="controller" value="true">
                //   <param name="bgcolor" value="#333333">
                //   <embed type="' . $video_type . '" src="' . $video_path . '/' . $video_name . '" autostart="false" loop="false" width="338" height="300" controller="true" bgcolor="#333333"></embed>
                //   </object>';

                //HTML5 video play
                echo '<video width="320" height="240" controls>
                          <source src="' . base_url() . $video_path . $video_name . '" type="' . $video_type . '"
                           autostart="true" loop="false" width="338" height="300" controller="true" bgcolor="#333333" >
						  Video :
						  </video>';
            }
            if (isset($errors) && strlen($errors)) {
                echo '<div class="error">';
                echo '<p>' . $errors . '</p>';
                echo '</div>';
            }
            if (validation_errors()) {
                echo validation_errors('<div class="error">', '</div>');
            }
            ?>
                  <?php
            $attributes = array('name' => 'upload', 'class' => 'form', 'id' => 'upload');
            echo form_open_multipart($this->uri->uri_string().'/', $attributes);
            ?>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="video_title" id="video_title" placeholder="Choose a title">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="video_description" id="video_description" placeholder="Add description">
                    </div>
                    <div class="input-group" data-toggle="tooltip" data-placement="right" title="Select an image for video thumbnail.">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-camera-18"></i>
                        </div>
                      </div>
                      <input type="file" name="thumbnail" id="thumbnail" placeholder="Choose video thumbnail" class="form-control">
                    </div>
                    <div class="input-group"  data-toggle="tooltip" data-placement="right" title="Select the video file.">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-video-66"></i>
                        </div>
                      </div>
                      <input name="video_name" id="video_name" readonly="readonly" type="file" placeholder="Browse the video file" class="form-control">
                    </div>
                    <div class="form-check text-left">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-sign"></span>
                        I agree to the
                        <a href="javascript:void(0)">terms and conditions</a>.
                      </label>
                    </div>
                    <div class="card-footer">
											<button name="upload_video" value="Upload Video" id="upload_video"  type="submit" class="btn btn-primary btn-round btn-lg">Upload !</button>
										</div>
                                        <?php
            echo form_close();
            ?>
                </div>
                
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