<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Managing student's score" />
	<meta name="keywords" content="Management, score" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Management result</title>
	<link rel ="stylesheet" href="styles/style.css" />
</head>
<body>
<?php
include_once("menu.inc");
include_once("header.inc");
?>
<hr />
<h2> Management Page for supervisor</h2>

<?php

include_once("settings.php");

// Preventing users from entering directly to this page.
if(!isset($_POST["Attempt"])){
	header ("location: managementpage.php");
	exit();
}


//Sanitise data 
function sanitise_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset ($_POST["attempt_number_1"])) {
	$attempt_number = $_POST["attempt_number_1"];
} 

if (isset ($_POST["score_equal"])) {
	$score_equal = $_POST["score_equal"];
} 



$attempt_number = sanitise_input($attempt_number);

if ((isset ($_POST["attempt_number_1"])) && (isset ($_POST["score_equal"]))){
	
$score_equal = sanitise_input($score_equal);
$sql_table = "attempts";
$query = "SELECT studentid, first_name, last_name FROM $sql_table WHERE attempt_number = $attempt_number AND score = $score_equal";
$result = mysqli_query($conn, $query);

if (!$result) {
		echo "<p> Something is wrong with ", $query, "</p>";
	} else {
		echo "<table>\n";
		echo "<tr>\n"
		."<th scope=\"col\">First name</th>\n "
		."<th scope=\"col\">Last name</th>\n "
		."<th scope=\"col\">Student ID</th>\n "
		."</tr>\n ";
		
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>\n ";
			echo "<td>", $row["first_name"],  "</td>\n ";
			echo "<td>", $row["last_name"],  "</td>\n ";
			echo "<td>", $row["studentid"],  "</td>\n ";
			echo "</tr>\n " ;
		}
	
	echo "</table>\n ";
	mysqli_free_result($result);
	
}
	mysqli_close($conn);
}

?>
<?php
include_once("footer.inc");
?>
</body>
</html>
