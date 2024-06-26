<?php 
//  ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// if( empty(session_id()) && !headers_sent()){
//     session_start();
// }
session_start();
include "../connect.php";
if(!isset($_SESSION['admin_userid'])){
    header("refresh:1;url=login.php");
    // echo '<script>window.location.href="login.php"</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mammypages Admin</title>
  <link rel="icon" href="../assets/images/favicon.ico" type="image/icon type">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome ->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="fapro/css/all.css">
  <script src="plugins/jquery/jquery.min.js"></script>

</head>
<style>
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
	color: #5f46c6;
}
.btn-mammy{
	background-color:#0AD69E;
	border-color:#0AD69E;
	color:#fff
}
.btn-mammy:hover{
color:#fff;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!--div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div-->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-primary elevation-4" style="background-color:white">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/images/logo1.png" alt="Mummypages Logo" class="brand-image" style="max-height:40px">
      <span class="brand-text font-weight-light"><br></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div-->

      <!-- SidebarSearch Form >
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--i class="right fas fa-angle-left"></i-->
              </p>
            </a>
            <!--ul class="nav nav-treeview">
             </ul-->
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-clipboard"></i>
              <p>
                Posts
                <!--span class="right badge badge-danger">New</span-->
				<i class="right fas fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="createpost" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fal fa-clipboard-list nav-icon"></i>
                  <p>Create Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewposts" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fal fa-clipboard-list nav-icon"></i>
                  <p>View Posts</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clipboard-user nav-icon"></i>
                  <p>Users Post</p>
                </a>
              </li>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clipboard-user nav-icon"></i>
                  <p>View Users Posts</p>
                </a>
              </li>
			</ul>
          </li>
		  <li class="nav-item">
            <a href="users" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
		  <!--li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li-->
		  <li class="nav-item">
            <a href="pages/users" class="nav-link">
              <i class="nav-icon fa fa-bullhorn"></i>
              <p>
                Advertise
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Magazines
                <!--span class="right badge badge-danger">New</span-->
				<i class="right fas fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="magazinelist" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fal fa-clipboard-list nav-icon"></i>
                  <p>View list</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="addmagazine" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-copy nav-icon"></i>
                  <p>Add Magazine</p>
                </a>
              </li>
			</ul>
          </li>
            
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Products
                <!--span class="right badge badge-danger">New</span-->
				<i class="right fas fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="productlist" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fal fa-clipboard-list nav-icon"></i>
                  <p>View list</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="addproduct" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-copy nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
			</ul>
          </li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-share-alt"></i>
              <p>
                MP Directory
                <!--span class="right badge badge-danger">New</span-->
				<i class="right fa fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="viewhospital" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-hospital nav-icon"></i>
                  <p>Hospitals</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="viewdoctors" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-user-md nav-icon"></i>
                  <p>Doctors</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clinic-medical nav-icon"></i>
                  <p>Midwife Clinics</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-clinic-medical nav-icon"></i>
                  <p>Medical Clinics</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-notes-medical nav-icon"></i>
                  <p>Pharmacies</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-female nav-icon"></i>
                  <p>Beauty Salons</p>
                </a>
              </li>
			</ul>
          </li>
		  <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
    </div>
    <!-- /.sidebar -->
  </aside>
