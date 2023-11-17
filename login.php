<?php
require_once("includes/config.php");
require_once("includes/classes/formsanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

if(isset($_POST["submitButton"])){
	
	$username = formsanitizer::sanitizeUserName($_POST["username"]);
	$password = formsanitizer::sanitizePassword($_POST["password"]);
	

	$success = $account->login($username, $password);
	

	if($success){
		//here store sessin info
		$_SESSION["userLoggedIn"] = $username;
		header("Location: index.php");
	}
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

				<?php echo $account->getErr(Constants::$loginFailed); ?>
				<input type="text" name="username" placeholder = "user name" value = "<?php $account->get_input_data("username"); ?>" required>
				
				<input type="password" name="password" placeholder = "password" required>

				<input type="submit" name="submitButton" value = "SUBMIT">
			</form>

			<a href="register.php" class="logInMessage">Need an account? Sign up here!</a>
		</div>



	</div>
</body>
</html>