<?php 
include 'inc/header.php';

if(isset($_GET['action']) && isset($_GET['action']) != '' && isset($_GET['type']) && isset($_GET['type']) != '' && isset($_GET['id']) && isset($_GET['id']) != ''){
    if($_GET['action'] == 'update' && $_GET['type'] == 'post'){
        $post_id = secureValue($_GET['id']);

        $query = mysqli_query($con, "SELECT * FROM `posts` WHERE `id` = '$post_id'");

        while($row = mysqli_fetch_assoc($query)){
            $title = $row['post_title'];
            $content = $row['post_article'];
            $category_id = $row['category_id'];
            $content = $row['post_article'];
        }
    }elseif($_GET['action'] == 'update' && $_GET['type'] == 'category'){
        $cat_id = secureValue($_GET['id']);

        $query = mysqli_query($con, "SELECT * FROM `categories` WHERE `id` = '$cat_id'");

        while($row = mysqli_fetch_assoc($query)){
            $cat = $row['category'];
            
        }
    }else{
        die();
    }
}else{
    redirect('index.php');
}

if(isset($_GET['action']) && isset($_GET['action']) != '' && isset($_GET['type']) && isset($_GET['type']) != '' && isset($_GET['id']) && isset($_GET['id']) != ''){

    if($_GET['action'] == 'update' && $_GET['type'] == 'post'){

        if(isset($_POST['postUpdateSubmit'])){
            $title = secureValue($_POST['post_title']);
            $slug = str_replace(' ','-', $title);
            $post_category = secureValue($_POST['post_category']);
            $post_content = secureValue($_POST['post_content']);

            $up = mysqli_query($con, "UPDATE `posts` SET `category_id` = '$post_category', `post_title` = '$title', `post_slug` = '$slug', `post_article` = '$post_content' WHERE `id` = '$post_id'");

            if($up){
                $_SESSION['UPDATE_POST'] = 'Post has been updated successfully';
                redirect('posts.php');
                
            }else{
                $_SESSION['UPERROR'] = 'Somwthing happened wrong';
                redirect('posts.php');
            }
        }
        ?>

        <div class="main-panel">        
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInput1">Post Title</label>
                                    <input type="text" name="post_title" class="form-control" id="exampleInput1" placeholder="Post Title" value="<?php echo $title; ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput2">Category</label>
                                        <select name="post_category" class="form-control" id="exampleInput2" required>
                                            <?php 
                                                $category = getCategoryByStatus();
                                                if(mysqli_num_rows($category)):
                                                while($category_row = mysqli_fetch_assoc($category)): 
                                                    
                                                    if($category_id == $category_row['id']):

                                                ?>

                                                        <option selected value="<?php echo $category_row['id'] ?>"><?php echo $category_row['category']; ?></option>
                                                <?php
                                                else: ?>
                                                    <option value="<?php echo $category_row['id'] ?>"><?php echo $category_row['category']; ?></option>
                                                <?php  
                                                endif;
                                                endwhile;
                                                else:
                                                endif;
                                            
                                            ?>
                                    
                                        </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleTextarea1">Write Content</label>
                                    <textarea name="post_content" class="form-control" id="exampleTextarea1" rows="4" required><?php echo $content; ?></textarea>
                                </div>
                                <button type="submit" name="postUpdateSubmit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }elseif($_GET['action'] == 'update' && $_GET['type'] == 'category'){
        
        if(isset($_POST['catUpdateSubmit'])){
            $category = secureValue($_POST['category']);
            $cat_slug = str_replace(' ','-', $category);
            $cat_slug = strtolower($cat_slug); 

            $inert_cat = mysqli_query($con, "UPDATE `categories` SET `category` = '$category', `slug` = '$cat_slug' WHERE `id` = '$cat_id'");

            if($inert_cat){
                $_SESSION['UPDATE_CATE'] = 'Category has been updated successfully';
                redirect('category.php');
            }else{
                $_SESSION['UPCATERROR'] = 'Somwthing happened wrong';
                redirect('category.php');
            }
        }
            ?>

            <div class="main-panel">        
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                        
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInput1">Category</label>
                                            <input type="text" name="category" class="form-control" id="exampleInput1" placeholder="Post Title" value="<?php echo $cat; ?>" autocomplete="off" required>
                                        </div>
                                    
                                        <button type="submit" name="catUpdateSubmit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

    }else{
        die();
    }
}else{
    redirect('index.php');
}
include 'inc/footer.php';


?>

