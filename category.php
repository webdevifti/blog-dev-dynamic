<?php

include 'include/header.php';

if(isset($_GET['category']) && $_GET['category'] != ''){
    $category = secureValue($_GET['category']);

    $get_categroy_post = mysqli_query($con, "SELECT `posts`.*,`categories`.`category`,`categories`.`slug` AS slug FROM `posts`,`categories` WHERE `posts`.`category_id`=`categories`.`id` AND `categories`.`slug`= '$category'  AND `posts`.`status` = 1 ORDER BY `posts`.`posted_on` DESC");
}

?>
	<main>
		<div class="container">
			<div class="row p-10">
				<section class="col-md-8" id="main-content-section">
					<div class="row">
                    <?php if(mysqli_num_rows($get_categroy_post) > 0):
						while($data = mysqli_fetch_assoc($get_categroy_post)):
							include 'include/category-article.php';
						endwhile;
                    else: ?>
                        <h3>No Category Post found.</h3>
                    <?php endif; ?>
					</div>
					<?php //include 'include/pagination.php'; ?>
				</section>
				<?php include 'include/sidebar.php'; ?>
			</div>
		</div>
	</main>
<?php include 'include/footer.php'; ?>