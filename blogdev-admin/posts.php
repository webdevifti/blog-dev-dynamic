<?php include 'inc/header.php'; ?>
<?php 


// GEt the Value and the query execution
if(isset($_GET['action']) && $_GET['action'] != '' && isset($_GET['id']) && $_GET['id'] != ''):

  if(secureValue($_GET['action'] == 'delete')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "DELETE FROM `posts` WHERE `id` = '$id'");
    if($res):
      $_SESSION['DELETE_POST'] = 'Post has been deleted successfully';
      //$result = array('success' => 'Post has been deleted successfully');
      redirect('posts.php');
    else:
      $_SESSION['DELETE_POSTERROR'] = 'Somthing happened wrong';
      //$result = array('error' => 'Something happened wrong');
      redirect('posts.php');
    endif;
    
  endif;
  if(secureValue($_GET['action'] == 'pending')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "UPDATE `posts` SET `status`= 0 WHERE `id` = '$id'");
    if($res):
      //$result = array('success' => 'Post has been pending successfully');
      $_SESSION['PENDING'] = 'Post has been pending now';
      redirect('posts.php');
    else:
      //$result = array('error' => 'Something happened wrong');
      $_SESSION['PENDINGERROR'] = 'Something happened wrong';
      redirect('posts.php');
    endif;
    
  endif;
  if(secureValue($_GET['action'] == 'publish')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "UPDATE `posts` SET `status`= 1 WHERE `id` = '$id'");
    if($res):
      $_SESSION['PUBLISH_POST'] = 'Post has been published';
      //$result = array('success' => 'Post has beeb published successfully');
      redirect('posts.php');
    else:
      $_SESSION['PUBLISH_POSTERROR'] = 'Something happened wrong';
      //$result = array('error' => 'Something happened wrong');
      redirect('posts.php');
    endif;
   
  endif;
endif;

// Bulk Options executed
if(isset($_POST['checkboxes'])):
  foreach($_POST['checkboxes'] as $id):
    $bulk_option = $_POST['bulkoptions'];
    
    if($bulk_option == 'publish'):
      $publish_query = mysqli_query($con, "UPDATE `posts` SET `status` = 1 WHERE `id`= '$id'");
      if($publish_query):
        $result = array('success' => 'Post has been published');
        // $_SESSION['publish'] = 'Published';
       
      else:
        $result = array('error' => 'Something happened wrong');
      endif;
     elseif($bulk_option == 'pending'):
        $pending_query = mysqli_query($con, "UPDATE `posts` SET `status` = 0 WHERE `id`= '$id'");
        if($pending_query):
          $result = array('success' => 'Post has been Pending Now');
        else:
          $result = array('error' => 'Something happened wrong');
        endif;
    elseif($bulk_option == 'delete'):
      $delete_query = mysqli_query($con, "DELETE FROM `posts` WHERE `id` = '$id'");
      if($delete_query):
        $result = array('success' => 'Post has been deleted successfully');
      else:
        $result = array('error' => 'Something happened wrong');
      endif;
    endif;
  endforeach;
endif;

?>


<div class="main-panel">
  <div class="content-wrapper">
      <?php include 'inc/notification-helper.php'; ?>
    <div class="card"> 
      <div class="card-body">
        <h1 class="text-primary">All Post</h1>
        <div class="add-button " style="overflow:hidden;">
          <a href="add-new.php?action=add&type=post" class="btn btn-primary float-right">Add A New Post</a>
         
        </div>
          <?php 
            $posts = getAllPost();
            if(mysqli_num_rows($posts)):
          ?>
        <form method="POST">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <div class="form-group" style="margin: 20px 0px;">
                    <select name="bulkoptions" id="bulk" required>
                      <option value="0">Select option</option>
                      <option value="publish">Publish</option>
                      <option value="pending">Pending</option>
                      <option value="delete">Delete</option>
                    </select>
                    <input type="submit" class="btn btn-outline-primary" value="Apply">

                  </div>
                  <thead>
                    <tr>
                      <th>
                      <label for="all">Select All</label><br>
                      <input type="checkbox" id="selectall"></th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Feature Image</th>
                      <th>Author</th>
                      <th>status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    while($post_row = mysqli_fetch_assoc($posts)) :
                    ?>
                    <tr>
                      <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $post_row['id']; ?>"></td>
                      <td><?php echo $post_row['category']; ?></td>
                      <td><?php echo $post_row['post_title']; ?></td>
                      <td><img src="<?php echo SITE_POST_IMAGE_PATH.$post_row['post_feature_image']; ?>" alt=""></td>
                      <td><?php echo $post_row['posted_by']; ?></td>
                      <td>
                      <?php if($post_row['status'] == 1): ?>
                        <a href="?action=pending&id=<?php echo  base64_encode($post_row['id']); ?>" class="btn btn-outline-info btn-lg">Published</a>
                      <?php else: ?>
                        <a href="?action=publish&id=<?php echo base64_encode($post_row['id']); ?>" class="btn btn-outline-warning btn-lg">Pending</a>
                        <?php endif; ?>
                      </td>
                      <td>
                        
                        <a href="update.php?action=update&type=post&id=<?php echo $post_row['id']; ?>" class="btn btn-outline-primary btn-lg d-block mb-2">Edit</a>
                        <a href="?action=delete&id=<?php echo base64_encode($post_row['id']); ?>" class="btn btn-outline-danger btn-lg d-block">Delete</a>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>  
                </table>
              </div>
            </div>
            <?php 
              else:
                echo "<h3 style='padding: 10px;text-align:center' class='text-danger'>No Posts Created Yet</h3>";
              endif; ?>
          </div>
        </form>   
      </div>
    </div>
        <!-- content-wrapper ends -->
<?php include 'inc/footer.php'; ?>