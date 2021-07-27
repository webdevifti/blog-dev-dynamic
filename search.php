
<?php include 'include/header.php'; ?>

<?php 

if(isset($_GET['getSearch'])){
	$query = secureValue($_GET['query']);

	$get_search_posts = mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `post_title` LIKE '%post%' AND `categories`.`id`=`posts`.`category_id` AND `posts`.`status` = 1 ORDER BY `posts`.`posted_on` DESC");

	
}

?>

	<main>
		<div class="container">
			<div class="row p-10">
			
				<section class="col-md-8" id="main-content-section">
				<?php 
					
					if(mysqli_num_rows($get_search_posts) > 0):
				?>
					<div class="row">
					<?php 
					while($data = mysqli_fetch_assoc($get_search_posts)) :
						
						include 'include/search-article.php';
					endwhile;
						?>
					</div>
					<?php //include 'include/pagination.php'; ?>
                    <?php else: ?>
					<h4>No Post Found!</h4>
				<?php endif; ?>
				</section>
				
				<?php include 'include/sidebar.php'; ?>
			</div>
		</div>
	</main>
<?php include 'include/footer.php'; ?>