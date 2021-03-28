<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Creating Web Applications Week 10" />
	<meta name="keywords" content="PHP, MySQL" />
	<meta name="author" content="Cuong Nguyen" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Retrieving records to HTML</title>
</head>
<body>
<h1> Creating Web Applications - Lab 10</h1>
<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

$make = trim($_POST["carmake"]);
$model = trim($_POST["carmodel"]);
$price = trim($_POST["price"]);
$yom = trim($_POST["yom"]);

mysqli_escape_string($conn, $_POST["carmake"]);
mysqli_escape_string($conn, $_POST["carmodel"]);
mysqli_escape_string($conn, $_POST["price"]);
mysqli_escape_string($conn, $_POST["yom"]);

if(!$conn){
	echo "<p>Display database failure</p>";
} else {
   $sql_table = "cars";
   $query = "select * from cars where make like '$make%' ";
    $result = mysqli_query($conn, $query);
   if(!$result){
	   echo "<p class=\"wrong\">Something is wrong with ",    $query, "</p>";
   } else { 
		echo "<table border=\"1\">\n";
		echo "<tr>\n"
		."<th scope=\"col\">Make</th>\n "
		."<th scope=\"col\">Model</th>\n "
		."<th scope=\"col\">Price</th>\n "
		."</tr>\n ";
		
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>\n ";
			echo "<td>", $row["make"],  "</td>\n ";
			echo "<td>", $row["model"],  "</td>\n ";
			echo "<td>", $row["price"],  "</td>\n ";
			echo "</tr>\n " ;
		}
	
	echo "</table>\n ";
	mysqli_free_result($result);
}
	   
	   
	    mysqli_close($conn);
}
   
?>

</body>
</html>
   