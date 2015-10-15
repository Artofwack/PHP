<?php
//file: process.php
	session_start();
	require_once('../config.php');
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	/*
	echo "email:";
	echo $email;
	echo "<br />";
	echo "password:";
	echo $pass;
	echo "<br />";
	*/
	$result = check_db($email, $pass);
	function check_db($email, $pass) {
//check db
//need: host, user, password, database
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		if (!$link) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		/*
		//connect & show connection info
		echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
		echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
		*/
		$encrypted_password = sha1($pass . PW_SALT);
//run the actual query
		$sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $encrypted_password . "'";
		$result = $link->query($sql);
		/*
		echo "<br />";
		echo "OUTPUT:<br />";
		*/
		if (count($result) > 0) {//we found record(s)
			foreach ($result as $row) {//loop through records to assign to variables
				$_SESSION['uid'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $email;
			}
			header('Location: home.php');//send loggged in user to home
		} else {//we found nothing
			header('Location: index.php?msg=pw');
		}
		mysqli_close($link);
	}//end check_db function
?>