<?php
//file: index.php
$msg = $_GET['msg'];
if ($msg == 'pw') {
	$message = "Your email or password is incorrect.<br /> Please re-enter";
} elseif ($msg == 'cheat') {
	$message = "You already have an account";
} else {
	$message = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after*
	these tags -->
	<meta name="description" content="">
	<meta name="author" content="Duane">
	<title>Signin Page</title>

</head>
<body>
<div class="container">
	<form class="form-signin" action="process.php" method="post">
		<?php
		if ($message == '') {
			echo '<h2 class="form-signin-heading">Please sign in</h2><a href="register.php">Register</a>';
		} else {
			echo '<h2 class="form-signin-heading" style="color: red;">' . $message . '</h2><a href="register.php">Register</a>';
		}
		?>
		<input type="email" id="email" name="email" class="form-control" placeholder="Email address"
		       required autofocus>
		<input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>

		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit" id="login">Sign in</button>
	</form>
</div>
<!-- /container -->
</body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href="signin.css" rel="stylesheet">
</html>
