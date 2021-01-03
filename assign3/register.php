<?php 
// Credits: https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
include('server.php') 

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
   <meta name="description" content="Register management system" />
	<meta name="keywords" content="Register, management" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Registration system for the Management page</title>
	<link rel="stylesheet" href="styles/style.css" />
</head>

<body>
	<?php
	include_once("menu.inc");
	include_once("header.inc");

	?>

<h2>Register for each supervisor</h2>
	<form method="post" action="register.php">
		<fieldset>
			<legend>
				Register
			</legend>
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</fieldset>
	</form>

	<?php
	include_once("footer.inc");
	?>

</body>

</html>