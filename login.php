<?php include('root/process.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career App | Log in</title>

    <!-- External CSS Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/adminlte.min2167.css?v=3.2.0">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index" class="h1"><b>Career</b>App</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login to start your session</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='phone' placeholder="Phone Number" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name='password' placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div> -->
                        </div>
                        <div class="col-4">
                            <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
                <!-- <p class="mb-1">
                    <a href="forgot-password">I forgot my password</a>
                </p> -->
                <!-- <p class="mb-0">
                    <a href="register" class="text-center">Register a new membership</a>
                </p> -->
            </div>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/adminlte.min2167.js?v=3.2.0"></script>
</body>
</html>