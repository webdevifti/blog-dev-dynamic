<?php include 'inc/header.php'; ?>
<?php 


// GEt the Value and the query execution
if(isset($_GET['action']) && $_GET['action'] != '' && isset($_GET['id']) && $_GET['id'] != ''):

  if(secureValue($_GET['action'] == 'delete')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "DELETE FROM `categories` WHERE `id` = '$id'");
    if($res):
      $_SESSION['DELETE_CAT'] = 'Category has been deleted';
      //$result = array('success' => 'Post has been deleted successfully');
      redirect('category.php');
    else:
      $_SESSION['DELETE_CATERROR'] = 'Somthing happened wrong';
      //$result = array('error' => 'Something happened wrong');
      redirect('category.php');
    endif;
    
  endif;
  if(secureValue($_GET['action'] == 'deactive')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "UPDATE `categories` SET `status`= 0 WHERE `id` = '$id'");
    if($res):
      //$result = array('success' => 'Post has been pending successfully');
      $_SESSION['CATDEACTIVE'] = 'Category has been deactivated';
      redirect('category.php');
    else:
      //$result = array('error' => 'Something happened wrong');
      $_SESSION['CATDEACTIVEERROR'] = 'Something happened wrong';
      redirect('category.php');
    endif;
    
  endif;
  if(secureValue($_GET['action'] == 'active')):
    $id = secureValue(base64_decode($_GET['id']));
    $res = mysqli_query($con, "UPDATE `categories` SET `status`= 1 WHERE `id` = '$id'");
    if($res):
      $_SESSION['CATACTIVE'] = 'Category has been activated';
      //$result = array('success' => 'Post has beeb published successfully');
      redirect('category.php');
    else:
      $_SESSION['CATACTIVEERROR'] = 'Something happened wrong';
      //$result = array('error' => 'Something happened wrong');
      redirect('category.php');
    endif;
   
  endif;
endif;

// Bulk Options executed
if(isset($_POST['checkboxes'])):
  foreach($_POST['checkboxes'] as $id):
    $bulk_option = $_POST['bulkoptions'];
    
    if($bulk_option == 'active'):
      $publish_query = mysqli_query($con, "UPDATE `categories` SET `status` = 1 WHERE `id`= '$id'");
      if($publish_query):
        $result = array('success' => 'Category has been activated');
        // $_SESSION['publish'] = 'Published';
       
      else:
        $result = array('error' => 'Something happened wrong');
      endif;
     elseif($bulk_option == 'deactive'):
        $pending_query = mysqli_query($con, "UPDATE `categories` SET `status` = 0 WHERE `id`= '$id'");
        if($pending_query):
          $result = array('success' => 'Category has been deactivated');
        else:
          $result = array('error' => 'Something happened wrong');
        endif;
    elseif($bulk_option == 'delete'):
      $delete_query = mysqli_query($con, "DELETE FROM `categories` WHERE `id` = '$id'");
      if($delete_query):
        $result = array('success' => 'Category has been deleted');
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
          <a href="add-new.php?action=add&type=category" class="btn btn-primary float-right">Add A New Category</a>
         
        </div>
          <?php 
            $categories = getAllCategory();
            if(mysqli_num_rows($categories)):
          ?>
        <form method="POST">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <div class="form-group" style="margin: 20px 0px;">
                    <select name="bulkoptions" id="bulk" required>
                      <option value="0">Select option</option>
                      <option value="active">Active</option>
                      <option value="deactive">Deactive</option>
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
                      <th>Slug</th>
                      <th>status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    while($cat_row = mysqli_fetch_assoc($categories)) :
                    ?>
                    <tr>
                      <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $cat_row['id']; ?>"></td>
                      <td><?php echo $cat_row['category']; ?></td>
                      <td><?php echo $cat_row['slug']; ?></td>
                      
                      <td>
                      <?php if($cat_row['status'] == 1): ?>
                        <a href="?action=deactive&id=<?php echo  base64_encode($cat_row['id']); ?>" class="btn btn-outline-info btn-lg">Active</a>
                      <?php else: ?>
                        <a href="?action=active&id=<?php echo base64_encode($cat_row['id']); ?>" class="btn btn-outline-warning btn-lg">Deactive</a>
                        <?php endif; ?>
                      </td>
                      <td>
                        
                        <a href="update.php?action=update&type=category&id=<?php echo $cat_row['id']; ?>" class="btn btn-outline-primary btn-lg d-block mb-2">Edit</a>
                        <a href="?action=delete&id=<?php echo base64_encode($cat_row['id']); ?>" class="btn btn-outline-danger btn-lg d-block">Delete</a>
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