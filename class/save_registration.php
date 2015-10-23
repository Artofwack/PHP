<?php
require_once('../config.php');
include_once('../scrypt.php');

$username = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1 == $pass2) {
//need: host, user, password, database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	$encrypted_password = Password::hash($pass1);

	$sql = "SELECT * FROM users WHERE email='" . $email . "' OR username='" . $username . "'";
	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) != 0) {//we found record(s)
		header('Location: index.php?msg=cheat');
	} else {//no records found - register
		$sql = "INSERT INTO users (username, passwd, email, created, FK_gid) VALUES
('" . $username . "', '" . $encrypted_password . "', '" . $email . "', now(), '1')";
		$result = mysqli_query($link, $sql);
		header('Location: index.php');
	}
}
