<?php
include 'inc/header.php';

if(secureValue(isset($_GET['action'])) && secureValue($_GET['action']) != '') :
    if(secureValue($_GET['action']) == 'add' && $_GET['type'] == 'post') :
            
        if(isset($_POST['postSubmit'])) :
            $result = addPost($_POST);
        endif;
        ?>
        <div class="main-panel">        
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                    <?php
                        if(isset($result['success'])){ ?>
                            <h6 class="card p-2 alert-succes-msg">
                                <?php echo $result['success']; ?>
                                <a href="posts.php">Go to posts page</a>
                                <a href="javascript:void(0)" class="alert-close">&times;</a>
                            </h6>
                        <?php
                        }else if(isset($result['error'])){ ?>
                            <h6 class="card p-2 alert-error-msg">
                                    <?php echo $result['error']; ?>
                                    <a href="javascript:void(0)" class="alert-close">&times;</a>
                            </h6>
                    <?php } ?>
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data" class="forms-sample">
                                    <div class="form-group">
                                        <label for="exampleInput1">Post Title</label>
                                        <input type="text" name="post_title" class="form-control" id="exampleInput1" placeholder="Post Title" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput2">Category</label>
                                            <select name="post_category" class="form-control" id="exampleInput2" required>
                                                <?php 
                                                  $category = getCategoryByStatus();
                                                  if(mysqli_num_rows($category)):
                                                    while($category_row = mysqli_fetch_assoc($category)): ?>
                                                         <option value="<?php echo $category_row['id'] ?>"><?php echo $category_row['category']; ?></option>
                                                    <?php 
                                                    endwhile;
                                                  else:
                                                  endif;
                                                
                                                ?>
                                        
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Post Thumbnail upload</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Write Content</label>
                                        <textarea name="post_content" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" name="postSubmit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       <?php
   
    elseif($_GET['action'] == 'add' && $_GET['type'] == 'category'): 
        if(isset($_POST['categorySubmit'])){
            $category = secureValue($_POST['category']);
            $cat_slug = str_replace(' ','-', $category);
            $cat_slug = strtolower($cat_slug);
            $cat_check = mysqli_query($con, "SELECT * FROM `categories` WHERE `category` = '$category'");
            if(mysqli_num_rows($cat_check) > 0){
                $_SESSION['EXIST_CAT'] = "Category already exist";
            }else{
                $insert = mysqli_query($con, "INSERT INTO `categories` (`category`,`slug`) VALUES('$category','$cat_slug')");
                if($insert){
                    $_SESSION['ADD_CAT'] = "Category has been added successfully";
                }else{
                    $_SESSION['CATERROR'] = "Something happened wrong";
                }
            }
        }
    
        ?>
        <div class="main-panel">        
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                    <?php include 'inc/notification-helper.php'; ?>
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" class="forms-sample">
                                    <div class="form-group">
                                        <label for="exampleInput1">Category</label>
                                        <input type="text" name="category" class="form-control" id="exampleInput1" placeholder="Category" autocomplete="off" required>
                                    </div>
                                    <button type="submit" name="categorySubmit" class="btn btn-primary mr-2">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
    else:
        redirect('index.php');
    endif;
else:
    redirect('index.php');
endif;

include 'inc/footer.php';

?>