<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Marking quiz score" />
	<meta name="keywords" content="Marking, quiz" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Marks of the quiz</title>
	<link rel="stylesheet" href="styles/style.css" />
</head>

<body>

	<?php
	include_once("header.inc");
	?>
	<hr />
	<?php

	include_once("settings.php");

	// Sanitise data
	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	// Setting student ID, given name, family name.
	if (isset($_POST["studentid"])) {
		$studentid = $_POST["studentid"];
	} else {
		header("location: quiz.php");
	}


	if (isset($_POST["given"])) {
		$firstname = $_POST["given"];
	} else {
		header("location: quiz.php");
	}

	if (isset($_POST["family"])) {
		$lastname = $_POST["family"];
	} else {
		header("location: quiz.php");
	}

	// sanitise input for student ID, first name and last name.
	$studentid = sanitise_input($studentid);
	$firstname = sanitise_input($firstname);
	$lastname = sanitise_input($lastname);
	$date = date("Y-m-d");
	$time = date("H:i:s");

	// Setting up number of attempts and score.
	$attempt_number = 0;

	$score = 0;

	$errMsg = "";


	// Checking if a value is checked, credits: https://html.form.guide/php-form/php-form-checkbox/
	function IsChecked($chkname, $value)
	{
		if (!empty($_POST[$chkname])) {
			foreach ($_POST[$chkname] as $chkval) {
				if ($chkval == $value) {
					return true;
				}
			}
		}
		return false;
	}


	if (isset($_POST["unit"])) {  // For question 1.
		$allowedAnswers = array("1986", "1987", "1988", "1989");
		$q1Answer = $_POST["unit"];
		if (in_array($q1Answer, $allowedAnswers)) {
			if (strcasecmp($q1Answer, "1988") == 0) {
				$score += 10;
			}
		}
	} else {
		$errMsg .= "<p>Please enter your result for Question 1.</p>";
	}


	if (isset($_POST["rank"])) { // For question 2.
		$q2Answer = $_POST["rank"];
		if ($q2Answer == "IDC") {
			$score += 10;
		}
	} else {
		$errMsg .= "<p>Please answer Question 2.</p>";
	}

	if (isset($_POST["writtenanswer"])) { // For question 3.
		$q3Answer = $_POST["writtenanswer"];
		sanitise_input($q3Answer);
		if (preg_match("/network-based/i", $q3Answer) && preg_match("/application-based/i", $q3Answer))
		// The answer is for both network-based and application-based.
		{
			$score += 10;
		} else if (preg_match("/Enter your answer here.../i", $q3Answer)) { //Because Enter your answer here... is the original part in Q3.
			echo "<p>Please enter your own answer for Question 3.</p>";
		}
	} else {
		echo "<p>Please answer Question 3.</p>";
	}


	if (isset($_POST["issue"])) { // For question 4.
		$q4Answer = $_POST["issue"];
		if (IsChecked("issue", "authentication") && (IsChecked("issue", "inspection"))) {
			$score += 20;
		} else if (IsChecked("issue", "inspection") || (IsChecked("issue", "authentication"))) {
			$score += 10;
		}
	} else {
		echo "<p>Please answer Question 4.</p>";
	}


	if (isset($_POST["ngfw"])) { // For question 5;
		$q5Answer = $_POST["ngfw"];
		sanitise_input($q5Answer);
		if ((preg_match("/static/i", $q5Answer)) && (preg_match("/dynamic/i", $q5Answer))) {
			$score += 10;
		}
	} else {
		echo "<p>Please answer Question 5.</p>";
	}




	// Setting score in the case of zero.
	if ($score == 0) {
		$errMsg .= "Score is zero";
	}


	if ($studentid == "") {
		$errMsg .= "<p>You must enter your student ID.</p>";
	} else if (!preg_match("/^[0-9]{7}|[0-9]{10}$/", $studentid)) {
		$errMsg .= "<p>Your student ID needs to be 7 or 10 digits!</p>";
	}

	if ($firstname == "") {
		$errMsg .= "<p>You must enter your first name</p>";
	} else if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
		$errMsg .= "<p>Your firstname must have only alpha letters and must not exceed 20 characters!</p>";
	}

	if ($lastname == "") {
		$errMsg .= "<p>You must enter your last name!</p>";
	} else if (!preg_match("/^[a-zA-Z-]{1,20}$/", $lastname)) {
		$errMsg .= "<p>Your lastname must have only alpha letters or a hyphen and must not exceed 20 characters!</p>";
	}


	if (!$conn) {
		$errMsg .= "<p>Display database failure</p>";
	} else if ($errMsg != "") {
		echo "<p>$errMsg</p>";
	} else {
		$query0 = "CREATE TABLE IF NOT EXISTS attempts (
		attempt_id INT(6) AUTO_INCREMENT NOT NULL PRIMARY KEY,
		attempt_date DATE NOT NULL,
		attempt_time TIME NOT NULL,
		first_name VARCHAR(20) NOT NULL,
		last_name VARCHAR(20) NOT NULL,
		studentid CHAR(10) NOT NULL,
		attempt_number TINYINT NOT NULL,
		score INT(3) NOT NULL);
	 ";
		$result0 = mysqli_query($conn, $query0);
		if (!$result0) {
			echo "<p>Insert not successful $query0 </p>";
		} else {
			$query = "select MAX(attempt_number) AS attempt_number FROM attempts WHERE first_name like '$firstname%' AND last_name like '$lastname%' ";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				$errMsg .= "<p>Something is wrong with the query.Please check again.</p>";
			} else { //This part from here is done with help from my tutor Grace Tao.
				$row = mysqli_fetch_assoc($result);
				if ($row["attempt_number"] != null) {
					$attempt_number = $row["attempt_number"];
				} else {
					$attempt_number = 0;
				}

				$attempt_number = (int) $attempt_number;
				$attempt_number += 1;

				if ($attempt_number >= 3) {
					$errMsg .= "<p> You can not do the quiz more than three times!</p>";
				}


				$query2 = "insert into attempts (attempt_date, attempt_time, first_name, last_name ,studentid, attempt_number , score) values ('$date', '$time', '$firstname', '$lastname','$studentid', '$attempt_number', '$score')"; //&&&&&& student_id->studentid
				$result2 = mysqli_query($conn, $query2);
				if ($result2) {


					echo "<p>Congratulations! Now you have done all questions about Firewall Technology, here is the result for you:</p> <br />
        Name: $firstname $lastname<br />
        Student ID: $studentid <br />
        Score : $score <br />
        Number of attempts: $attempt_number <br /> 
		<p>If you would like to redo questions, please <a href=\"quiz.php\"> click here </a> to return to the quiz page.<p>
        <p><em>Please remember that each student only has three attempts for the quiz!</em></p>";
				} else {

					echo "<p>Insert not successful $query2 </p>";
				}

				mysqli_close($conn);
			}
		}
	}

	?>

	<?php
	include_once("footer.inc");
	?>
</body>

</html>