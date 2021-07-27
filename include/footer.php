<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>About</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <?php 
                $recent_posts = mysqli_query($con, "SELECT * FROM `posts` WHERE `status` = 1 ORDER BY `posted_on` DESC LIMIT 5");
                if(mysqli_num_rows($recent_posts)):
            ?>
            <div class="col-md-4">
                <h3>Recent Posts</h3>
                <?php while($post = mysqli_fetch_assoc($recent_posts)): ?>
                <a href="<?php echo SITE_PATH.'single/'.$post['id'].'/'.$post['post_slug']; ?>">
                   <?php echo $post['post_title']; ?>
                </a>
                <?php endwhile; ?>
            </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="col-md-4">
                <h3>Helpful links</h3>
                <a href="#">Bangladesh Army</a>
                <a href="#">Bangladesh Navy</a>
                <a href="#">Bangladesh Police</a>
            </div>
        </div>
        <div class="row copyright-section">
        <div class="col-md-12 text-center">
            copyright &copy; 2021 | webdevifti
        </div>
    </div>
    </div>
</footer>
</div>
	<script type="text/javascript" src="<?php echo SITE_PATH; ?>vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo SITE_PATH; ?>vendors/js/bootstrap.min.js"></script>
    <script>
        var SITE_PATH = '<?php echo SITE_PATH; ?>';
        var pid = '<?php echo $id;?>';
        
    </script>
   
	<script type="text/javascript" src="<?php echo SITE_PATH; ?>vendors/js/custom.js"></script>
    
</body>
</html>