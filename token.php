<?php 
include 'root/process.php';
$phone = $_SESSION['phone'];
if (empty($phone)) {
    header("Location: ".SITE_URL.'/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KSS-Career Guidance App | Token </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/adminlte.min2167.css?v=3.2.0">
    <style type="text/css">
        /*# sourceMappingURL=login.css.map */
        /*personal css for the verication code...*/
        body.dark-mode .verification-input {
          border-color: #372648 !important;
          color: #fff !important;
          background: #161129 !important;
        }

        body.dark-mode .verification-input:focus {
          border-color: #6236FF !important;
        }
        .verification-input {
          font-size: 32px !important;
          letter-spacing: 10px;
          text-align: center;
          border-radius: 10px !important;
          border: 1px solid #DCDCE9 !important;
          width: 180px !important;
          padding: 0 10px !important;
          margin: auto;
          min-height: 70px !important;
          font-weight: 700;
          color: #27173E !important;
          box-shadow: none !important;
          background: #fff !important;
        }

        .verification-input:focus {
          border-color: #27173E !important;
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
               <center> <h3>Enter 5-digit verification code</h3> </center>
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
                <form action="" method="POST" action="">
                    <input type="hidden" value="<?=$phone; ?>" name="phone">
                    <div class="input mb-3">
                        <input type="text" name="otp" id="inputCode" class="form-control verification-input" id="smscode" placeholder="•••••" maxlength="5" required pattern="[0-9]*">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="verify_btn" class="btn btn-danger btn-block">Verify</button>
                        </div>
                    </div>
                </form>
                 <div class="d-flex justify-content-center align-items-center">
                    <div class="page-redirect text-center mt-30">
                        <form method="POST" action="">
                            <input type="hidden" value="<?=$phone; ?>" name="phone">
                             <p>You need another Token?  <button class="btn btn-link" type="submit" name="resent_token_btn">Resend</button></p>
                        </form>
                    </div>
                </div>
                 <a href="<?=SITE_URL;?>/login" class="text-danger"><i class="fa fa-backward"></i> Back 2 Login </a>
            </div>
        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/adminlte.min2167.js?v=3.2.0"></script>
    <script src="assets/js/js.js"></script>
</body>
</html>
