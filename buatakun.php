<!DOCTYPE html>
<html lang="en">

<head>
	<title>Masuk - Laundry</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Laundry Nabils24
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="cekbuatakun.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
						<span class="label-input100">Nama</span>
						<input class="input100" type="text" name="nama" placeholder="Enter name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Alamat is required">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" name="alamat" placeholder="Enter Addres">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
						<span class="label-input100">Phone</span>
						<input class="input100" type="number" name="telp" placeholder="Enter Phone Number">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Kelamin is required">
						<span class="label-input100">Kelamin</span>
						<input style="float: left;" class="input" type="radio" name="kelamin" value="L">
						<label style="float: left;" for="L">Laki-Laki</label>
						<input style="float: left;" class="input" type="radio" name="kelamin" value="P">
						<label style="float: left;" for="P">Perempuan</label>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
						<span class="label-input100">No KTP/NIK</span>
						<input class="input100" type="number" name="ktp" placeholder="Enter KTP/NIK">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<?php if (isset($_GET['msg'])) : ?>
						<small class="text-danger"><?= $_GET['msg'];  ?></small>
					<?php endif ?>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Masuk
						</button>
						<a href="index.php" class="login100-form-btn mx-3">Sudah Punya Akun?</a>
					</div>
					<div class="container-login100-form-btn mt-3">
						<small>Dibuat Oleh Nabil Sahsada Suratno | XIRPL 7 | </small>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/bootstrap/js/popper.js"></script>  -->
	<!-- <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/select2/select2.min.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>  -->
	<!-- <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>  -->
	<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>

</html>