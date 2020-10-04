<div class="col-lg-12 col-md-8 " style="margin-top:50px;">
    <!-- <section class="section"> -->
        <!-- <div class="container"> -->
            <div class="row justify-content-md-center">
            
                <div class="col-md-15">
                    <div class="card card-plain">
                        <div class="card-header">
                            <!-- <h1 class="profile-title text-left">Videos</h1> -->
                            <h9 class="text-on-back">Search Results</h9>
                        </div>

                    </div>
                </div>
            
            </div>
            <div class="row">

            </div>

<div style="margin-left:400px;">
                <!-- <h2>Uploaded Videos</h2> -->
                <?php
                if($videos_data){
                    //echo $videos_data;
                foreach ($videos_data as $video) {
                    //echo $video_data;
                    $position = strpos($video['filename'], ".");
                    $file_extension = substr($video['filename'], $position + 1);
                    $file_extension = strtolower($file_extension);
                    echo '
           
            <div class="row" style="margin:30px;">
            <div class="col"><img width="250" height ="170" src="' . base_url() . 'uploads/thumbnails/' . $video['thumbnail'] . '">
            </div>
            <div class="col"style="font-weight: bold;margin-left:-500px;"><p>Title :' . $video['title'] . '</p>
            <p>Description :' . $video['description'] . '</p>
            <a href="' . base_url() . 'video_player/' . $video['id'] . '">Watch</a></div></div>';
                }
            }else{
                echo "No results found!";
            }
                ?>
            </div>

        <!-- </div> -->

<!-- </section> -->
</div>
          
        