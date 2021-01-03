<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Third enhancements of my own webpages" />
	<meta name="keywords" content="Enhancements, webpages" />
	<meta name="author" content="Cuong Nguyen" />
	<title>Enhancements that I have done with my website in Assignment 3</title>
	<link rel ="stylesheet" href="styles/style.css" />
</head>
<body>
<?php
include_once("menu.inc");
include_once("header.inc");
?>
<br />
<hr />
<p> In assignment 3, I have implemented a technique that go beyond basic requirements of this assignment:</p>
 
     <p>This technique is a register page for teacher to look at students' score. Using a variety of pages for register,server and login, 
         and also using checking inputs, I am able to force users to register or log in before see my management page.
	 You could find it and see in  <a href="login.php"> this page </a>and <a href="register.php">this page.</a> </p>
     <p> I have learned this feature from this website: <a href="https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database"> 
     https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database</a></p>
	 <p> Also, here is code parts that I have used for this feature:</p>
	 <figure>
     <img src="images/loginpage.png" alt="Login page" width="632" height="622">
     <img src="images/registerpage.png" alt="Register page" width="722" height="529">
     <img src="images/serverpage.png" alt="Server page" width="704" height="623">
     <img src="images/serverpage2.png" alt="Server page 2" width="709" height="601">
     <img src="images/serverpage3.png" alt="Server page 3" width="729" height="349">
     <img src="images/errors.png" alt="Error processing" width="558" height="186">
     <img src="images/login_logout.png" alt="Login and logout" width="372" height="388">
      </figure>

<p> I hope that you find out this new feature on my webpage enjoyable and interesting.</p>
<?php
include_once("footer.inc");
?>
 
</body>
</html>