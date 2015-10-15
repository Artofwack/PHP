<?php
	require_once('../config.php');

	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];

	if ($pass1 == $pass2) {
//need: host, user, password, database
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		if (!$link) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo " Debugging error: " . mysqli_connect_errno() . PHP_EOL;
			echo " Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}

		//$encrypted_password = sha1($pass1 . PW_SALT);
		$sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $pass1 . "'";
		$result = $link->query($sql);
		if (count($result) > 0) {//we found record(s)
			header('Location: index.php?msg=cheat');
		} else {//no records found - register
			$sql = "INSERT INTO users (username, password, email, created, FK_gid) VALUES
('" . $username . "', '" . $pass1 . "', '" . $email . "', now(), '1')";
			$result = $link->query($sql);
			header('Location: index.php');
		}
	}
?>