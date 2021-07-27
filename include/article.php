<div class="col-md-6" id="single-article-div">
    <article class="single-article">
        <?php if($data['post_feature_image']): ?>
        <div class="feature-image">
            <a href="<?php echo SITE_PATH.'single/'.$data['id'].'/'.$data['post_slug']; ?>">
                <img src="<?php echo SITE_POST_IMAGE_PATH.$data['post_feature_image'] ?>" class="img-fluid" width="100%">
            </a>
           
        </div>
        <?php else: ?>
        <?php endif; ?>
            <div class="article-tags">
                <a href="<?php echo SITE_PATH.'category/'.$data['category_id'].'/'; ?><?php echo $data['slug'] ?>"><?php echo $data['category']; ?></a>
                
            </div>
            <a href="<?php echo SITE_PATH.'single/'.$data['id'].'/'.$data['post_slug']; ?>" class="article-title" >
                <h4><?php echo $data['post_title']; ?></h4>
            </a>
        <div class="article-metadata">
            <span><?php echo date('d-M-Y, h:i a', strtotime($data['posted_on'])) ?> &nbsp;</span>
            <span>By <?php echo $data['posted_by']; ?> &nbsp;</span>
            <span><a href="<?php echo SITE_PATH.'single/'.$data['id'].'/'.$data['post_slug']; ?>#commentsall">Leave a comment</a></span>
        </div>
        <p class="article-content">
           <?php echo substr($data['post_article'], 0, 100); ?>
        </p>
        <a href="<?php echo SITE_PATH.'single/'.$data['id'].'/'.$data['post_slug']; ?>" class="btn btn-readmore btn-sm">Read more</a>
    </article>
</div>