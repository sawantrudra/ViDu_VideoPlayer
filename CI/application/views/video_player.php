<div style="margin-top:80px;">
<div class="container align-items-center">
  
<div class="col-12 col-md-8">
  <video
    id="my-video"
    class="video-js vjs-theme-fantasy"
    controls
    preload="auto"
    width="960"
    height="540"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
  >
    <source src="<?php echo base_url();?>uploads/uploaded_videos/<?php echo $filename?>" type="video/<?php echo $extension?>" />
    
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

  <script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
  

