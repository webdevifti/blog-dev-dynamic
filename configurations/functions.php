<?php 
/*
    Helper functions


*/
function preArry($array){
    echo '<pre>';
    print_r($array);
}
function prxArray($array){
    echo '<pre>';
    print_r($array);
    die();
}

function secureValue($str){
    global $con;
    $str = mysqli_real_escape_string($con, $str);
    return $str;
}
function redirect($url){
    ?>
    <script>
        window.location.href = '<?php echo $url; ?>';
    </script>
    <?php
    die();
}
function refreshPage(){
    ?>
    <script>
        window.location.href = window.location.href;
    </script>
    <?php
}
function dateFormat($date){
    $str = strtotime($date);
    return date('Y-m-d, h:i A', $str);
}
function sendMail($email, $html,$subject){
    $mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->HOST = 'smtp.gmail.com';
	$mail->PORT = '587';
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = ''; //reciever email address
	$mail->Password = ''; // email password
	$mail->SetFrom();
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $html;
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => false
		));
	if($mail->send()):
		//echo "done";
	else:
		// Error_message
	endif;
}
function randomString(){
    $str = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    return $str = substr($str, 0, 25);
}


/*

 Core Function 
 All are related between database

*/

function getAllCategory(){
	global $con;
	$sql = "SELECT * FROM `categories` ORDER BY `id` DESC";
	$result = mysqli_query($con, $sql);
	return $result;
}

function getCategoryByStatus(){
	global $con;
	$sql = "SELECT * FROM `categories` WHERE `status` = 1 ORDER BY `id` DESC";
	$result = mysqli_query($con, $sql);
	return $result;
}
function getAllPost(){
	global $con;
	$sql = "SELECT `posts`.*,`categories`.`category` AS category FROM `posts`,`categories` WHERE `posts`.`category_id` = `categories`.`id` ORDER BY `posts`.`id` DESC";
	$result = mysqli_query($con, $sql);
	return $result;
}

function getPost(){
	global $con;
	$sql =  mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `posts`.`category_id`=`categories`.`id` AND `posts`.`status` = 1 ORDER BY `posted_on` DESC");
	return $sql;
}
// Pagination Helper
function getHomapagePosts($limit, $per_page){
	global $con;
	$sql =  mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `posts`.`category_id`=`categories`.`id` AND `posts`.`status` = 1 ORDER BY `posted_on` DESC LIMIT ".$limit. ', '. $per_page);
	return $sql;
}
function getPopularPost(){
	global $con;
	$sql =  mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `posts`.`category_id`=`categories`.`id` AND `posts`.`status` = 1 ORDER BY `posted_on` DESC LIMIT 4");
	return $sql;
}

function getPublishPost(){
	global $con;
	$sql = "SELECT * FROM `posts` WHERE `status` = 1";
	$result = mysqli_query($con, $sql);
	$result = mysqli_num_rows($result);
	return $result;
}

function addPost($data){
	global $con;

	$title = $data['post_title'];
	$slug = str_replace(' ','-', $title);
	$category = $data['post_category'];

	$post_url = 

	$image = $_FILES['image']['name'];
	$tmp_image = $_FILES['image']['tmp_name'];
	$image_size = $_FILES['image']['size'];
	$image_extension = explode('.',$image);
	$image_ext = $image_extension['1'];
	$image=rand(111111111,999999999).'_'.$image;

	$content = $data['post_content'];
	$author = 'webdevifti';

	if(empty($title)){
		return array('error' => 'Required Post Title');
	}
	if(empty($content)){
		return array('error' => 'Required Post Content');
	}
	if($image_ext == "png" || $image_ext == "jpg" || $image_ext == "jpeg" || $image_ext == "PNG" || $image_ext == "JPG" || $image_ext == "JPEG") :
		$image=rand(111111111,999999999).'_'.$image;

		$insert = mysqli_query($con, "INSERT INTO `posts`(`category_id`, `posted_by`, `post_title`, `post_slug`, `post_feature_image`, `post_article`) VALUES ('$category','$author','$title','$slug','$image','$content')");
		if($insert):
			move_uploaded_file($tmp_image,SERVER_POST_IMAGE.$image);
			
			return array('success' => 'Post Pulbished');
		else:
			return array('error' => 'Something Wrong');
		endif;
	else:
		return array('error' => 'Image must be png,jpg or jpeg format');
	endif;
}
