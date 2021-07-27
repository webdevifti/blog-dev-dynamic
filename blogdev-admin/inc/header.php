<?php include 'inc/header-helper.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Blog Dev Admin</title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css"> 
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller"> 
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>         
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          Admin Panel
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php if(isset($_SESSION['USER_NAME'])): echo $_SESSION['USER_NAME']; endif; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
   
    <div class="container-fluid page-body-wrapper">
    
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
		    <li class="nav-item">
                <a class="nav-link" href="posts.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Posts</span>
                </a>
            </li>
		    <li class="nav-item">
                <a class="nav-link" href="category.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Category</span>
                </a>
            </li>
		    <li class="nav-item">
                <a class="nav-link" href="comments.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Comments</span>
                </a>
            </li>
          
        </ul>
      </nav>