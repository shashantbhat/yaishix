<?php
require_once("includes/config.php");
require_once("includes/classes/formsanitizer.php");
if(isset($_POST["submitButton"])){

	$firstName = formsanitizer::sanitizeStr($_POST["firstName"]);
	$lastName = formsanitizer::sanitizeStr($_POST["lastName"]);
	$username = formsanitizer::sanitizeUserName($_POST["username"]);
	$password = formsanitizer::sanitizePassword($_POST["password"]);
	$email = formsanitizer::sanitizeEmail($_POST["email"]);
	$password2 = formsanitizer::sanitizePassword($_POST["password2"]);
	$email2 = formsanitizer::sanitizeEmail($_POST["email2"]);

	echo $firstName."<br>";
	echo $lastName."<br>";
	echo $username."<br>";
	echo $password."<br>";
	echo $password2."<br>";
	echo $email."<br>";
	echo $email2."<br>";

}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>welcome to yaishix</title>
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
	<div class = "signInContainer">

		<div class = "column">

			<div class = "header">
				<img src="assets/images/yaishix_logo.png" title="yaishix logo" alt = "site logo">
				<h3>Sign Up</h3>
				<span>to continue to Yaishix..</span>

			</div>
			<form method = "post">

				<input type="text" name="firstName" placeholder = "first name" required>
				<input type="text" name="lastName" placeholder = "last name" required>
				<input type="text" name="username" placeholder = "user name" required>
				<input type="email" name="email" placeholder = "email" required>
				<input type="email" name="email2" placeholder = "confirm email" required>
				<input type="password" name="password" placeholder = "password" required>
				<input type="password" name="password2" placeholder = "confirm password" required>
				<input type="submit" name="submitButton" value = "SUBMIT">
			</form>

			<a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
		</div>



	</div>
</body>
</html>