<aside class="col-md-4 animated fadeIn" id="side-content-section">
    <form action="<?php echo SITE_PATH ?>search.php" method="GET" class="site-search-box">
        <input type="search" name="query" placeholder="Search..." class="search-field" required="required" autocomplete="off">
        <input type="submit" name="getSearch" value="Search" class="btn btn-search">
    </form>
    <div class="widgets">
        <h4>Follow Me</h4>
        <div class="social-follow-links">
            <a href="https://facebook.com/beifti"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/webdevifti"><i class="fa fa-twitter"></i></a>
            <a href="https://instagram.com/itsyourifti"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="https://github.com/webdevifti"><i class="fa fa-github"></i></a>
        </div>
    </div>
    <div class="widgets">
        <ul class="nav nav-tabs">
            <li class="nav-item "><a class="nav-link active"  data-toggle="tab" href="#popular">Popular</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#comments">Comments</a></li>
    
        </ul>
        <div class="tab-content">
        <?php
         $getpopular_post = getPopularPost();
         if(mysqli_num_rows($getpopular_post) > 0):
        ?>
            <div id="popular" class="tab-pane fade active show">
            <?php while($pp = mysqli_fetch_assoc($getpopular_post)): ?>
                <a href="<?php echo SITE_PATH.'single/'.$pp['id'].'/'.$pp['post_slug']; ?>" class="popular-article">
                <?php if($pp['post_feature_image']) : ?>
                    <img src="<?php echo SITE_POST_IMAGE_PATH.$pp['post_feature_image'] ?>" class="feature-image-short">
                    <?php else: ?>
                    <?php endif; ?>
                    <h5><?php echo $pp['post_title']; ?></h5>
                </a>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
            

            <?php 
                $get_comnt = mysqli_query($con, "SELECT `posts`.*, `comments`.`content` FROM `posts`,`comments` WHERE `comments`.`post_id`= `posts`.`id` AND `comments`.`status` = 1 ORDER BY `comments`.`commented_on` DESC LIMIT 5");
                if(mysqli_num_rows($get_comnt)):
            ?>
            <div id="comments" class="tab-pane fade">
                <?php while($cmtn = mysqli_fetch_assoc($get_comnt)): ?>
                <a href="<?php echo SITE_PATH.'single/'.$cmtn['id'].'/'.$cmtn['post_slug']; ?>#commentsall" class="article-comments">
                    <h5><?php echo $cmtn['content']; ?></h5>
                </a>
               <?php endwhile; ?>
            </div>
            <?php else: ?>
                <h4>No Comments</h4>
            <?php endif; ?>
        </div>
    </div>
    <?php 
        $getcate = getCategoryByStatus();
            if(mysqli_num_rows($getcate) > 0):
        ?>
        <div class="widgets">
            <h4>Category</h4>
            <div class="category-links">
                <?php while($row = mysqli_fetch_assoc($getcate)) : ?>
                    <a href="<?php echo SITE_PATH.'category/'.$row['id'].'/'; ?><?php echo $row['slug'] ?>"><?php echo ucfirst($row['category']); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
        <?php else: ?>
            <h3>No Category</h3>
        <?php endif; ?>
</aside>