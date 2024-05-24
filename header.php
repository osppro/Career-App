<?php 
include 'root/process.php';

//check if no user lggedin successfully
if(empty($_SESSION['userid'])){
    header("Location: ".SITE_URL.'/login');
}else{
    //`userid`, `fullname`, `phone`, `email`, `password`, `account_status`, `education_status`, `role`, `date_registered`, `token`
    $userid = $_SESSION['userid'];
    $fullname = $_SESSION['fullname'];
    $phone = $_SESSION['phone'];
    $email = $_SESSION['email'];
    $account_status = $_SESSION['account_status'];
    $education_status = $_SESSION['education_status'];
    $date_registered = $_SESSION['date_registered'];
    $role = $_SESSION['role'];

     //delete users
     if (isset($_REQUEST['del-user'])) {
        $x = dbDelete ('users',$_REQUEST['del-user'],'userid');
        if ($x==1) {
            header("Location: ?users");
        }
 
     }elseif(isset($_REQUEST['del-career'])) {
        $x = dbDelete ('career',$_REQUEST['del-career'],'career_id');
        if ($x==1) {
            header("Location: ?career"); 
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career App</title>
    <link rel="icon" type="image/x-icon" href="assets/img/avatar.png">

    <!-- External CSS Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="assets/css/adminlte.min2167.css?v=3.2.0">
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Navbar Left Side -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=SITE_URL; ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
</nav>

<!-- end of token narv -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?=SITE_URL; ?>" class="brand-link">
        <img src="uploads/logo.jpg" alt="Career App" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Career App</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="uploads/logo.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?=SITE_URL; ?>" class="d-block"><?=$_SESSION['fullname']; ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="<?=SITE_URL; ?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
            <?php if ($role == 'admin') {?>
                <li class="nav-item">
                    <a href="counselor" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Counselor</p>
                    </a>
                </li> <li class="nav-item">
                    <a href="career-categories" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Career Categories</p>
                    </a>
                </li>
                </li> <li class="nav-item">
                    <a href="subject" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Combination</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="student" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="careers" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Careers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="career" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Chat</p>
                    </a>
                </li>
                <?php }elseif ($role == 'counselor') { ?>
                    
                <?php }else{ ?>

                <?php } ?>
                <li class="nav-item">
                    <a href="logout" class="nav-link" >
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- end of aside -->