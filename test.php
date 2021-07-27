<div id="commentsall">
        <?php 
        // $get_comments  = mysqli_query($con, "SELECT * FROM `comments` WHERE `status` = 1 AND `post_id` = '$id' ORDER BY `commented_on` DESC");
        // $comnt_count = mysqli_num_rows($get_comments); ?>
        <h4><?php //if($comnt_count < 0){ echo '';} ?></h4>
        <h4><?php  //if($comnt_count > 1){ echo $comnt_count." People's commented"; } ?></h4>
        <h4><?php // if($comnt_count == 1){ echo $comnt_count. " People commented"; } ?> </h4><hr>
        <?php 
        //if(mysqli_num_rows($get_comments)):
            //while($row = mysqli_fetch_assoc($get_comments)):
        ?>
        
        <div class="comments">
            <div class="comment-intro">
                <div class="user-meta">

                    <img src="<?php //echo SITE_PATH ?>vendors/images/user.png">
                    <p><?php //echo $row['comment_by']; ?></p>
                </div>
                <div class="comment-meta">
                    <span><?php //echo date('d-M-Y, h:i a', strtotime($row['commented_on'])); ?></span>
                </div>
            </div>
            <div class="comment-content">
                <p><?php// echo $row['content']; ?></p>
                <a href="javascript:void(0)" class="btn btn-info btn-sm replybtn" id="<?php// echo $row['id']; ?>">Reply</a>
            </div>
            
        </div>
            <div class="comment-reply-content" style="margin-left: 30px;margin-top: 20px;margin-bottom: 20px;">
            
            </div>
        
        <hr>
        <?php //endwhile; else: ?>
            <h3>No comments.</h3>
        <?php// endif; ?>
    </div>