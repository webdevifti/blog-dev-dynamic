<?php
require 'configurations/config.php';
$postid = getlastpostid();

$output = '';
// global $postid;
$query = mysqli_query($con, "SELECT * FROM `comments` WHERE `status` = 1 AND `post_id` = '$postid' ORDER BY `id` DESC");

//$result = mysqli_fetch_assoc($query);


foreach($query as $row){
    $output .= '
        <div class="comments">
            <div class="comment-intro">
                <div class="user-meta">
                    <img src="'.SITE_PATH.'vendors/images/user.png">
                    <p>'.$row['comment_by'].'</p>
                </div>
                <div class="comment-meta">
                    <span>'.date('d-M-Y, h:i a', strtotime($row['commented_on'])).'</span>
                </div>
            </div>
            <div class="comment-content">
                <p>'.$row['content'].'</p>
                <a href="javascript:void(0)" class="btn btn-info btn-sm replybtn" id="'.$row['id'].'">Reply</a>
            </div>
        </div><hr>
    ';
    $output .= getReply($con, $row['id']);
}
echo $output;

function getReply($con, $parent_id){
    $query = mysqli_query($con, "SELECT * FROM `comments` WHERE `comment_parent_id` = '$parent_id'");
    $output = '';
    $rowcount = mysqli_num_rows($query);

    if($rowcount > 0){
        foreach($query as $row){
            $output .= '
            <div class="comment-reply-content" style="margin-left: 30px;margin-top: 20px;margin-bottom: 20px;">
                <div class="comments">
                    <div class="comment-intro">
                        <div class="user-meta">
                            <img src="'.SITE_PATH.'vendors/images/user.png">
                            <p>'.$row['comment_by'].'</p>&nbsp;&nbsp;<span style="color: #aaa">replied</span>
                        </div>
                        <div class="comment-meta">
                            <span>'.date('d-M-Y, h:i a', strtotime($row['commented_on'])).'</span>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>'.$row['content'].'</p>
                        <a href="javascript:void(0)" class="btn btn-info btn-sm replybtn" id="'.$row['id'].'">Reply</a>
                    </div>
                </div><hr>
            </div>';
            $output .= getReply($con, $row['id']);
        }
    }
    return $output;
}
?>