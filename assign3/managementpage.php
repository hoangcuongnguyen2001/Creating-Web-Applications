<?php




// login and logout

session_start();

if (!isset($_SESSION['username'])) {
	echo "<p>You must login first!</p>";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Management page" />
	<meta name="keywords" content="Management, page" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Management page</title>
	<link rel="stylesheet" href="styles/style.css" />
</head>

<body>
	<?php
	include_once("menu.inc");
	include_once("header.inc");

	?>

	<hr />
	<?php if (isset($_SESSION['success'])) : ?>
		<h2> Management Page</h2>
		<form method="post" action="manage.php">
			<fieldset>
				<legend>Student Details</legend>
				<p class="row"> <label for="studentid">Student ID: </label>
					<input type="text" name="studentid" id="studentid" /></p>
				<p class="row"> <label for="given">Given name: </label>
					<input type="text" name="given" id="given" /></p>
				<p class="row"> <label for="attempt_number">Attempt number:</label>
					<input type="text" name="attempt_number" id="attempt_number" /> </p>
				<p class="row"> <label for="score">Score changes to(optional):</label>
					<input type="text" name="score" id="score" /> </p>
				<p> <input type="submit" name="attempt_student" value="Search all attempts for student" />
					<input type="submit" name="attempt_student" value="Delete all attempts for student" />
					<input type="submit" name="attempt_student" value="Change student score" /></p>
			</fieldset>
		</form>



		<form method="post" action="firstmanagement.php">
			<fieldset>
				<legend>Searching students(score equal)</legend>
				<p>What type of students do you need to find out?</p>
				<p class="row"><label for="attempt_number">Attempt number: </label>
					<input type="text" name="attempt_number_1" id="attempt_number_1" /></p>
				<p class="row"> <label for="score_equal">Score(equal to): </label>
					<input type="text" name="score_equal" id="score_equal" /></p>


				<p><input type="submit" name="Attempt" value="Search students" /></p>
			</fieldset>
		</form>

		<form method="post" action="secondmanagement.php">
			<fieldset>
				<legend>Searching students(score less)</legend>
				<p>What type of students do you need to find out?</p>
				<p class="row"><label for="attempt_number">Attempt number: </label>
					<input type="text" name="attempt_number_2" id="attempt_number_2" /></p>
				<p class="row"> <label for="score_less">Score(less than): </label>
					<input type="text" name="score_less" id="score_less" /></p>


				<p><input type="submit" name="first_attempt" value="Search students" /></p>
			</fieldset>
		</form>

			<p> <a href="managementpage.php?logout='1'">Logout</a> </p>
		<hr />

		<?php
		include_once("footer.inc");
		?>
	<?php endif ?>
</body>

</html>