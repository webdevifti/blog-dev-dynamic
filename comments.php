
<div class="comment-section p-10">
    <h3>Leave a reply</h3>
    <hr>
    <form class="comment-form" id="cmntForm" method="POST">
        <div class="form-group">
            <label for="cmnt">Write Comment<i class="required-sign">*</i></label>
            <textarea id="comment_content" name="comment_content" class="form-control" cols="20" rows="2" placeholder="Do comments" required="required"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Your Name<i class="required-sign">*</i></label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="email">Your Eame<i class="required-sign">*</i></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email address" required="required" autocomplete="off">
        </div>
        <!-- <input type="hidden" name="type" value="comments"> -->
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="comment_id" id="comment_id" value="0">
        <div class="form-group">
            <button type="submit" class="btn btn-search" name="submit" id="submit">Comment</button>
        </div>
        <div id="comment_msg"> </div>
    </form>
    <div id="commentsall">
        <?php 
            $get_comments = mysqli_query($con, "SELECT * FROM `comments` WHERE `status` = 1 AND `post_id` = '$id' AND `comment_parent_id` = 0 ORDER BY `commented_on` DESC");
            if(mysqli_num_rows($get_comments) > 0){
                while($row = mysqli_fetch_assoc($get_comments)){
                    $comment_id = $row['id'];
        ?>
        <div class="comments">
            <div class="comment-intro">
                <div class="user-meta">
                    <img src="<?php echo SITE_PATH; ?>vendors/images/user.png">
                    <p><?php echo $row['comment_by']; ?></p>
                </div>
                <div class="comment-meta">
                    <span><?php echo date('d-M-Y, h:i a', strtotime($row['commented_on'])); ?></span>
                </div>
            </div>
            <div class="comment-content">
                <p><?php echo $row['content']; ?></p>
                <a href="javascript:void(0)" class="btn btn-info btn-sm replybtn" id="<?php echo $row['id'] ?>">Reply</a>
            </div>
        </div>
        <?php 
        
        
        
$get_reply = mysqli_query($con, "SELECT * FROM `comments` WHERE `status` = 1 AND `comment_parent_id` = '$comment_id' ORDER BY `commented_on` DESC");
                if(mysqli_num_rows($get_reply) > 0){
                   foreach($get_reply as $reply){
        ?>
                <div class="comment-reply-content" style="margin-left: 30px;margin-top: 20px;margin-bottom: 20px;">
                    <div class="comments">
                        <div class="comment-intro">
                            <div class="user-meta">
                                <img src="<?php echo SITE_PATH; ?>vendors/images/user.png">
                                <p><?php echo $reply['comment_by']; ?></p>&nbsp;&nbsp;<span style="color: #aaa">replied</span>
                            </div>
                            <div class="comment-meta">
                                <span><?php echo date('d-M-Y, h:i a', strtotime($reply['commented_on'])); ?></span>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p><?php echo $reply['content']; ?></p>
                            <a href="javascript:void(0)" class="btn btn-info btn-sm replybtn" id="<?php echo $reply['id'] ?>">Reply</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <hr>
        <?php }  ?>
        
        <?php } ?>
        <?php } ?>
    </div>
</div>

