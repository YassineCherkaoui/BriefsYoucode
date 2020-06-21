<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Public/css/util.css">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
</head>

<body>


	<div class="container-login100" style="background-image: url('Public/img/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="POST" action="controller/backend_login.php">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20">
					<input class="input100" type="text" name="mail" placeholder=" email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="Login">
						Sign In
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="Public/img/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="views/register.php" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>


		</div>
	</div>




	<!--===============================================================================================-->
	<script src="../Public/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../Public/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>