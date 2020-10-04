<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="col" style="padding:20px;">
    <div class="row" style="margin-top:10px;">
        <div class="col-1.5">
            <button class="btn btn-simple btn-round btn-neutral" onclick="like_dislike_video_fn()" id="like_btn" data-toggle="tooltip" data-placement="bottom" title="Like/Dislike the Video">
                <i class="tim-icons icon-heart-2" id="like_icon" style="<?php if ($liked) {
                                                                            echo 'color: #FF0000;';
                                                                        } ?>font-size:20px ;"></i></button>
            <div class="w-1"></div>
        </div>
        <div class="col-1.5" style="margin-left:5px">
            <button class="btn btn-simple btn-round btn-neutral" onclick="comment()" data-toggle="tooltip" data-placement="bottom" title="Add a Comment">
                <i class="tim-icons icon-chat-33" style="font-size:20px ;"></i></button>
        </div>
        <div class="col-1.5" style="margin-left:5px">
            <button class="btn btn-simple btn-round btn-neutral" onclick="display_url()"  data-toggle="tooltip" data-placement="bottom" title="Get Sharable Link">
                <i class="tim-icons icon-link-72" style="font-size:20px ;"></i></button>
        </div>

        <div class="col-1.5" style="margin-left:5px">
            <button class="btn btn-simple btn-round btn-neutral" onclick="add_remove_from_wishlist()" id="wishlist_btn" data-toggle="tooltip" data-placement="bottom" title="Add/Remove Wishlist">
                <i class="tim-icons icon-book-bookmark" id="wishlist_icon" style="<?php if ($wishlisted) {
                                                                                        echo 'color: #00FFFF;';
                                                                                    } ?>font-size:20px ;"></i></button>
            <div class="w-1"></div>
        </div>

	<div class="col-1.5" style="margin-left:5px">
            <button class="btn btn-simple btn-round btn-neutral" data-toggle="tooltip" onclick="share_facebook()" data-placement="bottom"  data-target=".bd-example-modal-sm" title="Share on Facebook">
                <i class="fa fa-facebook" style="font-size:20px ;"></i></button>
        </div>
	<div class="col-1.5" style="margin-left:5px">
            <button class="btn btn-simple btn-round btn-neutral " data-toggle="tooltip" onclick="share_twitter()" data-placement="bottom"  data-target=".bd-example-modal-sm" title="Share on Twitter">
                <i class="fa fa-twitter" style="font-size:20px ;"></i></button>
        </div>
       
    </div>
    <div class="row">
        <div class="col" style="margin-top:30px;">
            <h2>Title : <?php echo $title ?> </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-3" style="display:inline;">
            <button type="button" class="btn btn-simple btn-neutral">
                Views <span class="badge badge-pill badge-default" style="display:inline;">4</span>
            </button>
        </div>
        <div class="col-3" style="display:inline;">
            <button type="button" class="btn btn-simple btn-neutral">
                Likes <span class="badge badge-pill badge-default" style="display:inline;"><?php echo $likes ?></span>
            </button>
        </div>
        <div class="col-3" style="display:inline;">
            <button type="button" class="btn btn-simple btn-neutral">
                Comments<span class="badge badge-pill badge-default" style="display:inline;"><?php if($comments_data==null){echo count($comments_data);}else{echo 0;}; ?></span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-top:20px;">
            <h4>Description:</h4> </br>
            <p><?php echo $description ?></br></p>
        </div>
    </div>
    <div class="row">

        <input type="textarea" style="margin-top:20px;display:none; background-color: #FFFFFF; height:80px; width:100%; " name="comment" placeholder="Write a comment..." id="comment">
    </div>
    <div class="row">
        <button type="button" onclick="post_comment()" style="display:none;" class="btn btn-simple btn-neutral" id="post_button">Post</button>
        <div id="hidden_form_container" style="display:none;"></div>
    </div>
    <div class="row">
        <div class="col" style="margin-top:20px;">
            <h4>Comments: </br></h4>
        </div>
    </div>
    <?php
if($comments_data ==null){
    foreach ($comments_data as $comment_data) {
    ?>
        <div class="row">
            <div class="col" style="margin-top:10px;margin-left:40px;">
                <p>User: <?php echo $comment_data['user_name']; ?> </br></p>
                <p>Comment: <?php echo $comment_data['comment']; ?></p>
            </div>
        </div>
    <?php
    }}
    ?>
</div>
</div>
</div>

<script>
    var liked = <?php echo $liked; ?>;

    function like_dislike_video_fn() {
        if (liked) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        document.getElementById("like_icon").style.color = "#FFFFFF";
                        liked = 0;
                    }

                }
            }
            xmlhttp.open("GET", "<?php echo base_url() ?>video_player/dislike_video/<?php echo $id ?>", true);
            xmlhttp.send();
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp1 = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        document.getElementById("like_icon").style.color = "#FF0000";
                        liked = 1;
                    }

                }
            }
            xmlhttp1.open("GET", "<?php echo base_url() ?>video_player/like_video/<?php echo $id ?>", true);
            xmlhttp1.send();
        }
    }

    var wishlisted = <?php echo $wishlisted; ?>;

    function add_remove_from_wishlist() {
        if (wishlisted) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        document.getElementById("wishlist_icon").style.color = "#FFFFFF";
                        wishlisted = 0;
                    }

                }
            }
            xmlhttp.open("GET", "<?php echo base_url() ?>video_player/remove_wishlist/<?php echo $id ?>", true);
            xmlhttp.send();
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp1 = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        document.getElementById("wishlist_icon").style.color = "#00FFFF";
                        liked = 1;
                    }

                }
            }
            xmlhttp1.open("GET", "<?php echo base_url() ?>video_player/add_wishlist/<?php echo $id ?>", true);
            xmlhttp1.send();
        }
    }

    function comment() {
        document.getElementById("comment").style.display = "block";
        document.getElementById("post_button").style.display = "block";
    }

    function post_comment() {
        var comment = document.getElementById("comment").value;
        var theForm, newInput1, newInput2;
        theForm = document.createElement('form');
        theForm.action = '<?php echo base_url(); ?>Video_player/post_comment';
        theForm.method = 'post';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'comment';
        newInput1.value = comment;
        newInput2 = document.createElement('input');
        newInput2.type = 'hidden';
        newInput2.name = 'video_id';
        newInput2.value = <?php echo $id; ?>;
        theForm.appendChild(newInput1);
        theForm.appendChild(newInput2);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();

    }
	
	function display_url(){
        var tempItem = document.createElement('input');

    tempItem.setAttribute('type','text');
    tempItem.setAttribute('display','none');
    
    var content = "<?php echo base_url() ?>video_player/like_video/<?php echo $id ?>";
    
    
    tempItem.setAttribute('value',content);
    document.body.appendChild(tempItem);
    
    tempItem.select();
    document.execCommand('Copy');

    tempItem.parentElement.removeChild(tempItem);
        alert("Video URL copied to clipboard!");
    }

 function share_facebook(){
        window.open("https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>video_player/like_video/<?php echo $id ?>"); 
    }

 function share_twitter(){
        window.open("https://twitter.com/intent/tweet?url=<?php echo base_url() ?>video_player/like_video/<?php echo $id ?>%2F&text=Video+from+Vidu+Video+Sharing+Platform.&hashtags=css,html"); 
    }
</script>