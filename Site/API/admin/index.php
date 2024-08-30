<?php

session_start();
include 'includes/config.php';
if (isset($_POST['login'])) {
	
	
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($con, "SELECT * FROM admin WHERE (username='$uname' || admin_email='$uname')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $hashpassword = $num['password'];

        if (password_verify($password, $hashpassword)) {
		
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['adminname'] = $num['admin_name'];
            $_SESSION['adminemail'] = $num['admin_email'];
            $_SESSION['userid'] = $num['id'];
            $_SESSION['login'] = $num['id'];
            $_SESSION['profile'] = $num['admin_image'];
            $_SESSION['power'] = $num['power'];
			
            $query = mysqli_query($con, "insert into adminlog(name,action) values('$uname','login')");
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } else {
            echo "<script>alert('Wrong Password');</script>";

        }
    }
//if username or email not found in database
    else {
		echo "<script type='text/javascript'> document.location = 'login-fail.php'; </script>";
    }

}
?>



<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Apr 2020 02:49:47 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Log In | Royal Meat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box" class=" text-center">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="index.html" class="logo-dark">
                                <span><img src="assets/images/logo-dark.png" alt="" height="40"></span>
                            </a>
                            <a href="index.html" class="logo-light">
                                <span><img src="assets/images/logo.png" alt="" height="40"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Admin Login</h4>

                        <!-- form -->
						<form method="post">
                            <div class="form-group">
                                <label for="emailaddress">Email ID</label>
                                <input class="form-control" type="text" id="emailaddress" required="" name="username" placeholder="Enter your email" value="ayyappan@gm.com">
                            </div>
                            <div class="form-group">
                                
                                <label for="password">Password</label>
                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password" value="ayyappan">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" name="login"  type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                            <!-- social-->
                     
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">All Rights Reserved <a href="www.mechuter.com" class="text-muted ml-1"><b>Mechuter Tech</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Royal Meat</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Only Raw . <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - Admin Panel
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>


<!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Apr 2020 02:49:47 GMT -->
</html>