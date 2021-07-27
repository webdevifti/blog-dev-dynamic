
<?php include 'include/header.php'; ?>
	<main>
		<div class="container">
			<div class="row p-10">
			
				<section class="col-md-8" id="main-content-section">
					<?php 
						// Pagination Variables
						$per_page = 10;
						if(isset($_GET['page'])):
							$page = $_GET['page'];
						else:
							$page = 1;
						endif;
						$limit = ($page - 1) * $per_page;
						$get_allposts = getPost(); // Main Posts Data
						$get_posts = getHomapagePosts($limit, $per_page); // Limit for pagination data
						// End of Pagination Variables

						if(mysqli_num_rows($get_posts) > 0): ?>
							<div class="row">
							<?php 
							while($data = mysqli_fetch_assoc($get_posts)) :
								include 'include/article.php';
							endwhile;
								?>
							</div>
							<?php include 'include/pagination.php'; ?>
						
						<?php else: ?>
							<h4>No Post Found!</h4>
						<?php endif; 
					?>
				</section>
				<?php include 'include/sidebar.php'; ?>
			</div>
		</div>
	</main>
<?php include 'include/footer.php'; ?>