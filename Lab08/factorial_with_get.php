<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Factorial for lab week 8" />
	<meta name="keywords" content="factorial, lab" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Factorial for lab week 8</title>
</head>
<body>
<?php
include ("mathfunctions.php");
?>

<h1>Creating Web Applications - Lab 8</h1>
<?php

if(isset($_GET["number"])){
	$num = $_GET["number"];
   if(isPositiveInteger($num)){
     echo "<p>", $num, "! is ", factorial($num), ".</p>";
   }else {
    echo "<p>Please enter a positive integer.</p>";
   }
   
   echo "<p><a href="factorial.html">Return to the Entry Page</a></p>";
}



?>
</body>
</html>