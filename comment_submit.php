<?php
require 'configurations/config.php';

$post_id = secureValue($_POST['id']);
$comment_content = secureValue($_POST['comment_content']);
$name = secureValue($_POST['name']);
$email = secureValue($_POST['email']);
$parent_id = secureValue($_POST['comment_id']);


$query = mysqli_query($con, "INSERT INTO `comments`(`comment_parent_id`, `post_id`, `content`, `comment_by`, `user_email`) VALUES ('$parent_id','$post_id','$comment_content','$name','$email')");

if($query){
    $data = array(
        'status' => 'success',
        'msg' => 'Comment added'
    );
}else{
    $data = array(
        'status' => 'error',
        'msg' => 'Somthing happened wrong'
    );
}
echo json_encode($data);









// $type = secureValue($_POST['type']);

// if($type == 'comments'){
//     $comment = secureValue($_POST['comment']);
//     $username = secureValue($_POST['user-name']);
//     $useremail = secureValue($_POST['user-email']);
//     $id = secureValue($_POST['id']);
//     $cmnt = mysqli_query($con, "INSERT INTO `comments`(`post_id`, `content`, `comment_by`, `user_email`) VALUES ('$id','$comment','$username','$useremail')");
//     if($cmnt){
       
//         $arr = array(
//             'status' => 'success',
//             'msg' => 'Comment posted'
//         );
//     }else{
//         $arr = array(
//             'status' => 'error',
//             'msg' => 'Error occure while comment posting'
//         );
//     }
//     echo json_encode($arr);
// }



?>