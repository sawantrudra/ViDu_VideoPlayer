
                  <div class="page-header" style="margin-top:40px;" >
      
      <div class="content">

          <div class="col">
                <?php
            if (isset($success) && strlen($success)) {
                echo "<h3>$success</h3>";
                //traditional video play - less than HTML5
                // echo '<object width="338" height="300">
                //   <param name="src" value="' . $video_path . '/' . $video_name . '">
                //   <param name="autoplay" value="false">
                //   <param name="controller" value="true">
                //   <param name="bgcolor" value="#333333">
                //   <embed type="' . $video_type . '" src="' . $video_path . '/' . $video_name . '" autostart="false" loop="false" width="338" height="300" controller="true" bgcolor="#333333"></embed>
                //   </object>';

                //HTML5 video play
                echo '<video  controls>
                          <source src="' . base_url() . $video_path . $video_name . '" type="' . $video_type . '"
                           autostart="true" loop="false" width="338" height="300" controller="true" bgcolor="#333333" >
						  Video :
						  </video>';
            }
            if (isset($errors) && strlen($errors)) {
                echo '<div class="error">';
                echo '<p>' . $errors . '</p>';
                echo '</div>';
            }?>
          </div>
