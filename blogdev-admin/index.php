<?php include 'inc/header.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-3">
              <div class="card bg-primary">
                <div class="card-body">
                <?php $number = getPublishPost(); ?>
                <h3 class="text-white">Post Published <span><?php echo $number; ?></span></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php include 'inc/footer.php'; ?>