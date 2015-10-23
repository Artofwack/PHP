<?php
//file: process.php
session_start();
require_once('../config.php');
include_once('../scrypt.php');
$email = $_POST['email'];
$pass = $_POST['pass'];
$username = $_POST['username'];

check_db($email, $pass);

function check_db($email, $pass)
{
//check db
//need: host, user, password, database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$sql = "SELECT * FROM users WHERE email='" . $email . "'";
	$result = mysqli_fetch_assoc(mysqli_query($link, $sql));

	if (Password::check($pass, $result['passwd'])) {
		$_SESSION['uid'] = $result['id'];
		$_SESSION['username'] = $result['username'];
		$_SESSION['email'] = $email;
		header('Location: home.php');//send loggged in user to home
	} else
		header('Location: index.php?msg=pw');
	mysqli_close($link);
}//end check_db function
?>