<?php 
include 'root/process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KSS-Career Guidance App | Log in</title>
    <!-- External CSS Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/adminlte.min2167.css?v=3.2.0">
    <style type="text/css">
    .password-container {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 42px;
        top: 57%;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
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
                <p class="login-box-msg">Login to start your session</p>
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
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='phone' placeholder="Phone Number" maxlength="10" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name='password' id="password" placeholder="Password" required>
                         <i class="toggle-password fa fa-eye"></i>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="loginbtn" class="btn btn-danger btn-block">Login</button>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="<?=SITE_URL;?>/forgot-password" class="text-danger">I forgot my password</a>
                </p>
                <!-- <p class="mb-0">
                   Not yet with account?. <a href="<?=SITE_URL;?>/register" class="text-center text-danger">Register</a>
                </p> -->
            </div>
        </div>
    </div>
    <!-- External JavaScript -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/adminlte.min2167.js?v=3.2.0"></script>
    <script src="assets/js/js.js"></script>
    <script type="text/javascript">
    document.querySelectorAll('.toggle-password').forEach(function(icon) {
        icon.addEventListener('click', function() {
            var passwordInput = this.previousElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
</script>
</body>
</html>