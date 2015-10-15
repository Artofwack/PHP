<?php
	/**
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 9/30/2015
	 * Time: 12:38 PM
	 */
	function sayHello() {
		print("hello world!!");
	}

	function sayGoodBye() {
		print("Good Bye!!");
	}

	function getName() {
		print($_POST["name"] . " is here!");
	}

	if (isset($_POST['name']))
		getName();

?>

<html>
<body>
<div align="center" id="signIn">
	<form action="" method="post">
		<input type="text" name="name" value="Enter name" required autofocus>
		<br>
		<input type="email" name="email" value="Enter email" required>
		<br>
		<input type="submit" name="submit" value="Sign In">
	</form>
</div>
</body>
</html>