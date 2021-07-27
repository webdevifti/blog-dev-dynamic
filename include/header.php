<?php require 'configurations/config.php'; ?>
<?php

$url = $_SERVER['PHP_SELF'];
$url_explode = explode('/',$url);
$current_page = end($url_explode);
$page_title = '';
if($current_page == 'index.php'){
	$page_title = 'Welcome to '.SITE_NAME;
}elseif($current_page == 'category.php'){
	$page_title = 'Category';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title; ?> | Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>vendors/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>vendors/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>vendors/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>style.css">
</head>
<body>
<div class="container" id="main-wrapper">
	<header id="header" class="header">
		<div class="container">
			<div class="row p-10">
				<div class="header-top">
					<a href="<?php echo SITE_PATH; ?>" class="site-logo">
						<h1><?php echo SITE_NAME; ?></h1>
					</a>
				</div>
			</div>
			<div class="row">
				<nav class="site-navigation">
					<ul class="menu">
						<li class="menu-item ">
							<a href="<?php echo SITE_PATH; ?>" class="menu-link <?php if($current_page == 'index.php'){ echo 'active'; } ?>">HOME</a>
						</li>
						<?php 
							$categories = getCategoryByStatus();
							if(mysqli_num_rows($categories) > 0):
								while($cat_list = mysqli_fetch_assoc($categories)):
						
						?>
						<li class="menu-item">
							<a href="<?php echo SITE_PATH.'category/'.$cat_list['id'].'/'; ?><?php echo $cat_list['slug'] ?>" class="menu-link"><?php echo $cat_list['category']; ?></a>
						</li>
						<?php endwhile; endif; ?>
						<li class="menu-item">
							<a href="<?php echo SITE_PATH ?>about" class="menu-link">ABOUT</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo SITE_PATH ?>contact" class="menu-link">CONTACT</a>
						</li>
						<li class="menu-item">
							<a href="<?php echo SITE_PATH ?>hire-me" class="menu-link">HIRE ME</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>