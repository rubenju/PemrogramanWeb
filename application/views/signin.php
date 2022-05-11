<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>/assets/regform/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/regform/css/main.css">
	<!--===============================================================================================-->

</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url(); ?>/assets/regform/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?= base_url(); ?>SignIn/signin" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Sign In
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#"></a>
						<div>
							<a class="txt1" href="<?= base_url(); ?>SignUp/index">Buat akun</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>/assets/regform/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>/assets/regform/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/assets/regform/js/main.js"></script>
	<!-- Sweet Alerts -->
	<script src="<?= base_url(); ?>/node_modules/sweetalert/dist/sweetalert.min.js"></script>

	<?php if ($this->session->flashdata('success')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Berhasil Melakukan Registrasi!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Gagal Sign In!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_password')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Password salah!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_access')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Anda belum memiliki akses!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('success_signout')) { ?>
		<script>
			swal({
				title: "Succes",
				text: "Berhasil Sign Out!",
				icon: "success"
			});
		</script>
	<?php } ?>
</body>

</html>
