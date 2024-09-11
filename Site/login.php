<?php

session_start();
//session_destroy();
include 'includes/config.php';
//include 'dbcon.php';
error_reporting(0);

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = mysqli_query($con, "SELECT * FROM user WHERE (email='$email' OR phone='$email')AND password='$password'");
	$num = mysqli_fetch_array($sql);
	if ($num > 0) {


		if ($num['u_active'] == 1) {
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['phone'] = $num['phone'];
			$_SESSION['name'] = $num['name'];
			$_SESSION['userid'] = $num['u_id'];

			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		} else {
			echo "<script>alert('Your Account deactivated');</script>";

		}
	} else {
		echo "<script>alert('Username and password not match');</script>";
	}
}


if (isset($_POST['register'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	$sql = mysqli_query($con, "SELECT * FROM user WHERE email='$email' OR phone='$phone'");
	$num = mysqli_fetch_array($sql);
	if ($num == 0) {

		$sql = "INSERT INTO user(name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
		if (mysqli_query($con, $sql)) {
			$last_id = $con->insert_id;

			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			$_SESSION['name'] = $name;
			$_SESSION['userid'] = $last_id;
			echo "<script>alert('Account Created');</script>";


			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";


		} else {
			echo "<script>alert('Something wrong');</script>";
		}



	} else {
		echo "<script>alert('Email or Phone number already exists');</script>";
	}

}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<?php include 'includes/head.php'; ?>

</head>

<body>

	<div class="main-wrapper">
		<?php include 'includes/navigation.php'; ?>
		<!-- CONTENT START-->

		<?php include 'layout/login-banner.php'; ?>





		<!-- Page Section Start -->
		<div class="page-section section section-padding">
			<div class="container">
				<div class="row mbn-40">

					<div class="col-lg-4 col-12 mb-40">
						<div class="login-register-form-wrap">
							<h3>Login</h3>
							<form class="mb-3" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12 mb-15"><input type="text" placeholder="Username or Email"
											name="email" required></div>
									<div class="col-12 mb-15"><input type="password" placeholder="Password"
											name="password" required> </div>
									<div class="col-12"><button name="login" class="btn btn-dark"
											type="submit">Login</button></div>

								</div>
							</form>

						</div>
					</div>

					<div class="col-lg-2 col-12 mb-40 text-center">
						<span class="login-register-separator"></span>
					</div>

					<div class="col-lg-6 col-12 mb-40 ml-auto">
						<div class="login-register-form-wrap">
							<h3>Register</h3>
							<form class="mb-3" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6 col-12 mb-15"><input type="text" placeholder="Your Name"
											name="name" required></div>
									<div class="col-md-6 col-12 mb-15"><input type="text" placeholder="phone"
											name="phone" required></div>
									<div class="col-md-6 col-12 mb-15"><input type="email" placeholder="Email"
											name="email" required></div>
									<div class="col-md-6 col-12 mb-15"><input type="password" placeholder="Password"
											name="password" required></div>
									<div class="col-md-6 col-12 mb-15"></div>
									<div class="col-md-6 col-12"><button name="register" class="btn btn-dark ml-10"
											type="submit">Register</button></div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div><!-- Page Section End -->
		<?php include 'layout/home-promise.php'; ?>

		<!-- CONTENT END-->
		<?php include 'includes/footer.php'; ?>
		<?php include 'includes/toast.php'; ?>

	</div>
	<?php include 'includes/script.php'; ?>
</body>

</html>