<?php include 'include/header.php'; ?>
<?php 

if(isset($_GET['id']) && $_GET['name']){
	$id = secureValue($_GET['id']);
	$name = secureValue($_GET['name']); 

    $get_single_post = mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `posts`.`id`= '$id' AND `posts`.category_id = `categories`.`id` AND `posts`.`status` = 1 ORDER BY `posts`.`posted_on` DESC");
	while($data = mysqli_fetch_assoc($get_single_post)){
		$title = $data['post_title'];
		$slug = $data['post_slug'];
		$cat_slug = $data['slug'];
		$postid = $data['id'];
		$image = $data['post_feature_image'];
		$content = $data['post_article'];
		$author = $data['posted_by'];
		$post_time = $data['posted_on'];
		$category = $data['category'];
		$category_id = $data['category_id'];
	}
}
?>

	<main>
		<div class="container">
			<div class="row p-10">
				<section class="col-md-8" id="main-content-section" style="padding: 0">
					<div id="single-article-div">
						<article class="single-view-article">
							<div class="feature-image">
								<?php if($image): ?>
								<img src="<?php echo SITE_POST_IMAGE_PATH.$image; ?>" class="img-fluid" width="100%">
								<?php else: ?>
								<?php endif; ?>
								
							</div>
								<div class="article-tags">
									<?php $category; ?>
								</div>
								
								<h4><?php echo $title; ?></h4>
								
							<div class="article-metadata">
								<span><?php echo date('d-M-Y, h:i a', strtotime($post_time)); ?> &nbsp;</span>
								<span>By <?php echo $author; ?> &nbsp;</span>
								<span><a href="#commentsall">Leave a comment</a></span>
							</div>
							<p>
								<?php echo $content; ?>
							</p>
						</article>
						<h4>Share The Post</h4><hr>
						<div class="social-share-links">
							<a href="#"><i class="fa fa-facebook">&nbsp;&nbsp;Facebook</i></a>
							<a href="#"><i class="fa fa-twitter">&nbsp;&nbsp;Twitter</i></a>
							<a href="#"><i class="fa fa-instagram">&nbsp;&nbsp;Instagram</i></a>
						</div>
					</div>

					<div class="related-post p-10">
						<h3>Related Posts</h3><hr>
						<?php 
						
						$same_post = mysqli_query($con, "SELECT * FROM `posts` WHERE `category_id` = '$category_id' AND `id` != '$id' ORDER BY `posted_on` DESC LIMIT 4");
						if(mysqli_num_rows($same_post)): 
						?>
						<div class="row">
						<?php 
						while($info = mysqli_fetch_assoc($same_post)):			
					
						?>
							<div class="col-md-4">
								<article class="single-view-article">
									<div class="feature-image">
										<a href="<?php echo SITE_PATH.'single/'.$info['id'].'/'.$info['post_slug']; ?>">
											<img src="<?php echo SITE_POST_IMAGE_PATH.$info['post_feature_image'] ?>" class="img-fluid" width="100%">
										</a>
									</div>
										<div class="article-tags">
											<a href="<?php echo SITE_PATH.'category/'.$info['category_id'].'/'; ?><?php echo $cat_slug; ?>"><?php echo $category; ?></a>
											
										</div>
										<a href="<?php echo SITE_PATH.'single/'.$info['id'].'/'.$info['post_slug']; ?>" class="article-title" >
											<h4><?php echo $info['post_title']; ?></h4>
										</a>
									<div class="article-metadata">
										<span><?php echo date('d-M-Y, h:i a', strtotime($post_time)); ?> &nbsp;</span>
										
										
									</div>
								</article>
							</div>
							<?php endwhile; ?>
						</div>
						<?php else: ?>
							<h4>NO Related Post Found</h4>
							<?php endif; ?>
					</div>
					<?php include 'comments.php'; ?>
				</section>
				<?php include 'include/sidebar.php'; ?>
			</div>
		</div>
	</main>
	
<?php include 'include/footer.php'; ?>