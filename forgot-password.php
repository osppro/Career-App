<?php 
include 'root/process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KSS-Career Guidance App | Forgot </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/adminlte.min2167.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="<?=SITE_URL; ?>">
                    <img src="uploads/logo.jpg" style="width: 100px;">
                </a>
            </div>
            <div class="card-body">
                <h4 class="text-danger"><center><b>KSS-Career Guidance App</b></center></h4>
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                <?php 
                //account login status
                if (isset($_SESSION['status'])) {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                } 
                //loader spinner / loader
                if (isset($_SESSION['loader'])) {
                    echo $_SESSION['loader'];
                    unset($_SESSION['loader']);
                } 
                ?>
                <form method="POST" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" maxlength="10" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="forgot_password_btn" class="btn btn-danger btn-block">Request new password</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    Already with Account?. <a href="<?=SITE_URL;?>/login" class="text-danger"><i class="fa fa-backward"></i> Login</a>
                </p>
            </div>
        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/adminlte.min2167.js?v=3.2.0"></script>
    <script src="assets/js/js.js"></script>
</body>
</html>
