<?php
ob_start(); // Starts output buffering
include_once("user.class.php");
error_reporting(0);


// Checking if username and password are not null and not empty
if ($_POST['username'] != null && $_POST['password'] != null && !empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Calling a static method login() from the user class
	$result = user::login($username, $password);

	// If login successful, redirect to a specific page
	if ($result) {
		// Redirect to main page
		header("Location: http://localhost/bns.html/index-main.html");
		exit; // Stop further script execution
	} else {
		// If login fails, display error message
?>
		<script>
			alert("Your Username & Password Incorrect")
			window.location.replace("http://localhost/bns.html/signin1.php");
		</script>

	<?php
	}
} else {
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>UTT - Login Page</title>
		<link rel="stylesheet" href="loginstyle.css">
		<link rel="index-main" href="index-main.html">
		<link rel="signup" href="signup.php">

	</head>

	<body>
		<!-- partial:index.partial.html -->
		<html lang="en">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Login Page</title>
			<link rel="stylesheet" href="css/style.css">
			<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		</head>

		<body>

			<div id="wrapper">
				<div id="table">
					<a class="active">Login</a>
					<a href="http://localhost/bns.html/signup.php" class="">Sign Up</a>
				</div>
				<div id="signin">
					<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="username" name="username" autofocus>
						</div>
						<div class="form-group">
							<label for="pass">Password</label>
							<input type="password" id="pass" name="password">
							<span id="showpwd" class="fa fa-eye-slash"></span>
						</div>
						<div class="form-group">
							<label id="checkbox">
								<input type="checkbox" checked><span class="text">Keep me signed in </span>
							</label>
						</div>
						<div class="form-group">
							<input type="submit" value="Login">
						</div>
					</form>
					<div class="hr"></div>
				<?php } ?>

				</div>

			</div>
			<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#showpwd").on("click", function() {
						$(this).toggleClass("fa-eye fa-eye-slash");
						$($(this).siblings()[1]).attr("type", function(index, attr) {
							return attr == "password" ? "text" : "password"
						});
					});
				})
			</script>
		</body>

		</html>
		<!-- partial -->

	</body>

	</html>