<div class="col-lg-6 col-md-4 "style="margin-top:100px">
    <!-- <section class="section"> -->
    <!-- <div class="container"> -->


    
    <div class="card card-plain">
                        <div class="card-header">
    <!-- <h1 class="profile-title text-left">Videos</h1> -->
    <h9 class="text-on-back">Wishlist</h9>
                        </div>

                    </div>



    <div class="row">




        <!-- <h2>Uploaded Videos</h2> -->
        <?php
        foreach ($videos_data as $video_data) {
            $position = strpos($video_data['filename'], ".");
            $file_extension = substr($video_data['filename'], $position + 1);
            $file_extension = strtolower($file_extension);
            echo '
           
            <div class="col-md-auto">
            <img width="150" height ="100" src="' . base_url() . 'uploads/thumbnails/' . $video_data['thumbnail'] . '">
            <p style="font-weight: bold; width: 150px;margin-top:5px;">' . $video_data['title'] . '</p>
            <p style="width:150px;margin-botton:10px;">' . $video_data['description'] . '</p>
            <a href="' . base_url() . 'video_player/' . $video_data['id'] . '">Watch</a>
             <a href="" onclick="delete_wishlist('. $video_data['id'] . ')">Delete</a></div>';        }
        ?>
    </div>
	<script>
        function delete_wishlist(video_id){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                    location.reload(); 
                }

            }
        }
        xmlhttp.open("GET", "<?php echo base_url() ?>video_player/remove_wishlist/"+video_id, true);
        xmlhttp.send();
            }
        </script>
    <!-- </div> -->

    <!-- </section> -->
</div>
</div>