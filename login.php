<?php

if(isset($_POST["submitButton"])){
	echo "form submitted successfully!";
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
				<h3>Sign In</h3>
				<span>to continue to Yaishix..</span>

			</div>
			<form method = "post">

				
				<input type="text" name="username" placeholder = "user name" required>
				
				<input type="password" name="password" placeholder = "password" required>

				<input type="submit" name="submitButton" value = "SUBMIT">
			</form>

			<a href="register.php" class="logInMessage">Need an account? Sign up here!</a>
		</div>



	</div>
</body>
</html>