<?php
require '../configurations/config.php';
session_start();
if(isset($_SESSION['ADMIN_ID'])){
  redirect('index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
  .LoginError{
    text-align: left;
    color: red;
  }
  </style>
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <h2 class="text-primary">BlogDev</h2>
              </div>
              <h4 class="font-weight-light">Login to continue.</h4>
              <div class="LoginError"></div>
              <form class="pt-3" method="POST" id="login_Form">
                <div class="form-group">
                  <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Username or Email address">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3">
                <button type="submit" id="LoginSubmit" class="btn btn-primary">Login</button>
                </div>
                <input type="hidden" name="type" value="login">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins:js -->
  <script src="assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script>
      $('#login_Form').on('submit', function(e){
        $('#LoginSubmit').attr('disabled', true);
        $.ajax({
        url: 'login_submit.php',
        type: 'POST',
        data: $('#login_Form').serialize(),
        success: function(result){
            $('#LoginSubmit').attr('disabled', false);
            var data = $.parseJSON(result);
            if(data.status == 'error'){
                $('.LoginError').html(data.msg);
            }
            if(data.status == 'success'){
                window.location.href = 'index.php';
            }
        }
    });
    e.preventDefault();
  });   
  </script>
</body>
</html>