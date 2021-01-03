<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Managing student's score" />
	<meta name="keywords" content="Management, score" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Management result</title>
	<link rel="stylesheet" href="styles/style.css" />
</head>

<body>
	<?php
	include_once("menu.inc");
	?>

	<?php
	include_once("header.inc");
	?>
	<hr />
	<h2> Management Page for supervisor</h2>

	<?php

	include_once("settings.php");

	//Sanitise data 
	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Preventing users from entering directly to this page.



	if (isset($_POST["studentid"])) {
		$studentid = $_POST["studentid"];
	}


	if (isset($_POST["given"])) {
		$firstname = $_POST["given"];
	}

	if (isset($_POST["attempt_number"])) {
		$attempt_number = $_POST["attempt_number"];
	}

	if (isset($_POST["score"])) {
		$score = $_POST["score"];
	}

	if (!$conn) {
		echo "<p>Display database failure</p>";
	} 

	//Handle searching attempts for student, givent studentid or name.
	if ($_REQUEST['attempt_student'] == "Search all attempts for student") {
		$studentid = sanitise_input($studentid);
		$firstname = sanitise_input($firstname);

		$sql_table = "attempts";
		if (isset($_POST["studentid"]) && trim($_POST["studentid"]) != "") {
			$studentid = trim($_POST["studentid"]);
			$query1 = "select * FROM $sql_table WHERE studentid = $studentid ";
			$result1 = mysqli_query($conn, $query1);
			if (!$result1) {
				echo "<p> Something is wrong with ", $query1, "</p>";
			} else {
				echo "<table>\n";
				echo "<tr>\n"
					. "<th scope=\"col\">Attempt ID</th>\n "
					. "<th scope=\"col\">Attempt date</th>\n "
					. "<th scope=\"col\">Attempt time</th>\n "
					. "<th scope=\"col\">First name</th>\n "
					. "<th scope=\"col\">Last name</th>\n "
					. "<th scope=\"col\">Student ID</th>\n "
					. "<th scope=\"col\">Attempt number</th>\n "
					. "<th scope=\"col\">Score</th>\n "
					. "</tr>\n ";

				while ($row = mysqli_fetch_assoc($result1)) {
					echo "<tr>\n ";
					echo "<td>", $row["attempt_id"],  "</td>\n ";
					echo "<td>", $row["attempt_date"],  "</td>\n ";
					echo "<td>", $row["attempt_time"],  "</td>\n ";
					echo "<td>", $row["first_name"],  "</td>\n ";
					echo "<td>", $row["last_name"],  "</td>\n ";
					echo "<td>", $row["studentid"],  "</td>\n ";
					echo "<td>", $row["attempt_number"],  "</td>\n ";
					echo "<td>", $row["score"],  "</td>\n ";
					echo "</tr>\n ";
				}

				echo "</table>\n ";
				mysqli_free_result($result1);
			}
			
		} else if (isset($_POST["given"]) && trim($_POST["given"]) != "") {
			$firstname =  trim($_POST["given"]);
			$query0 = "select * FROM $sql_table WHERE first_name LIKE '%$firstname%'";
			$result0 = mysqli_query($conn, $query0);
			if (!$result0) {
				echo "<p> Something is wrong with ", $query0, "</p>";
			} else {
				echo "<table>\n";
				echo "<tr>\n"
					. "<th scope=\"col\">Attempt ID</th>\n "
					. "<th scope=\"col\">Attempt date</th>\n "
					. "<th scope=\"col\">Attempt time</th>\n "
					. "<th scope=\"col\">First name</th>\n "
					. "<th scope=\"col\">Last name</th>\n "
					. "<th scope=\"col\">Student ID</th>\n "
					. "<th scope=\"col\">Attempt number</th>\n "
					. "<th scope=\"col\">Score</th>\n "
					. "</tr>\n ";

				while ($row = mysqli_fetch_assoc($result0)) {
					echo "<tr>\n ";
					echo "<td>", $row["attempt_id"],  "</td>\n ";
					echo "<td>", $row["attempt_date"],  "</td>\n ";
					echo "<td>", $row["attempt_time"],  "</td>\n ";
					echo "<td>", $row["first_name"],  "</td>\n ";
					echo "<td>", $row["last_name"],  "</td>\n ";
					echo "<td>", $row["studentid"],  "</td>\n ";
					echo "<td>", $row["attempt_number"],  "</td>\n ";
					echo "<td>", $row["score"],  "</td>\n ";
					echo "</tr>\n ";
				}

				echo "</table>\n ";
				mysqli_free_result($result0);
			}
		} else {
			$query = "select * FROM $sql_table";
			$result = mysqli_query($conn, $query);

			if (!$result) {
				echo "<p> Something is wrong with ", $query, "</p>";
			} else {
				echo "<table>\n";
				echo "<tr>\n"
					. "<th scope=\"col\">Attempt ID</th>\n "
					. "<th scope=\"col\">Attempt date</th>\n "
					. "<th scope=\"col\">Attempt time</th>\n "
					. "<th scope=\"col\">First name</th>\n "
					. "<th scope=\"col\">Last name</th>\n "
					. "<th scope=\"col\">Student ID</th>\n "
					. "<th scope=\"col\">Attempt number</th>\n "
					. "<th scope=\"col\">Score</th>\n "
					. "</tr>\n ";

				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n ";
					echo "<td>", $row["attempt_id"],  "</td>\n ";
					echo "<td>", $row["attempt_date"],  "</td>\n ";
					echo "<td>", $row["attempt_time"],  "</td>\n ";
					echo "<td>", $row["first_name"],  "</td>\n ";
					echo "<td>", $row["last_name"],  "</td>\n ";
					echo "<td>", $row["studentid"],  "</td>\n ";
					echo "<td>", $row["attempt_number"],  "</td>\n ";
					echo "<td>", $row["score"],  "</td>\n ";
					echo "</tr>\n ";
				}

				echo "</table>\n ";
				mysqli_free_result($result);
			}
			mysqli_close($conn);
		}
	}


	//Handle deleting attempt for a student, given studentid.
	if ($_REQUEST['attempt_student'] == "Delete all attempts for student") {
		$studentid = sanitise_input($studentid);

		$sql_table = "attempts";
		$query2 = "delete FROM $sql_table WHERE studentid = $studentid ";
		$result2 = mysqli_query($conn, $query2);
		if (!$result2) {
			echo "<p> Something is wrong with ", $query2, "</p>";
		} else {
			echo "<p> This student's data has been successfully deleted. Please return to <a href=\"managementpage.php\">the Management page </a>to check out.</p>";
		}
		mysqli_close($conn);
	}


	//Change score for a student, given the student id and attempt number.
	if ($_REQUEST['attempt_student'] == "Change student score") {
		$attempt_number = sanitise_input($attempt_number);
		$score = sanitise_input($score);
		$studentid = sanitise_input($studentid);

		$sql_table = "attempts";
		$query3 = "update $sql_table SET score = $score WHERE studentid = $studentid AND attempt_number = $attempt_number";
		$result3 = mysqli_query($conn, $query3);
		if (!$result3) {
			echo "<p> Something is wrong with ", $query3, "</p>";
		} else {
			$query4 = "select * FROM $sql_table WHERE studentid = $studentid AND attempt_number = $attempt_number";
			$result4 = mysqli_query($conn, $query4);
			if (!$result4) {
				echo "<p> Something is wrong with ", $query4, "</p>";
			} else {
				echo "<table>\n";
				echo "<tr>\n"
					. "<th scope=\"col\">Attempt ID</th>\n "
					. "<th scope=\"col\">Attempt date</th>\n "
					. "<th scope=\"col\">Attempt time</th>\n "
					. "<th scope=\"col\">First name</th>\n "
					. "<th scope=\"col\">Last name</th>\n "
					. "<th scope=\"col\">Student ID</th>\n "
					. "<th scope=\"col\">Attempt number</th>\n "
					. "<th scope=\"col\">Score</th>\n "
					. "</tr>\n ";

				while ($row = mysqli_fetch_assoc($result4)) {
					echo "<tr>\n ";
					echo "<td>", $row["attempt_id"],  "</td>\n ";
					echo "<td>", $row["attempt_date"],  "</td>\n ";
					echo "<td>", $row["attempt_time"],  "</td>\n ";
					echo "<td>", $row["first_name"],  "</td>\n ";
					echo "<td>", $row["last_name"],  "</td>\n ";
					echo "<td>", $row["studentid"],  "</td>\n ";
					echo "<td>", $row["attempt_number"],  "</td>\n ";
					echo "<td>", $row["score"],  "</td>\n ";
					echo "</tr>\n ";
				}

				echo "</table>\n ";
				mysqli_free_result($result4);
			}
		}
		mysqli_close($conn);
	}



	?>
	<?php
	include_once("footer.inc");
	?>
</body>

</html>