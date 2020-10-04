<div class="col-lg-4 col-md-6">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:-40%;margin-left:40%;width: 40rem;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
    <div class="carousel-inner" >
<?php if($videos_data[0]){
    $video1 = $videos_data[0];?>
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url()."uploads/thumbnails/".$video1['thumbnail'];?>" alt="First slide">
    </div>
<?php }if($videos_data[1]){
    $video2 = $videos_data[1];?>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url()."uploads/thumbnails/".$video2['thumbnail'];?>" alt="Second slide">
    </div>
<?php }if($videos_data[2]){
    $video3 = $videos_data[2];?>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url()."uploads/thumbnails/".$video3['thumbnail'];?>" alt="Third slide">
    </div>
<?php }?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
		</div>
	</div>