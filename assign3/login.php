<?php
// Credits: https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database

include('server.php')

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Logging in management system" />
    <meta name="keywords" content="Logging in, management" />
    <meta name="author" content="Cuong Nguyen" />
    <title>Logging in the management system</title>
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <?php
    include_once("menu.inc");
    include_once("header.inc");
    ?>
    <h2> Login Page for supervisor</h2>

    <form method="post" action="login.php">
        <fieldset>
            <legend> Login</legend>
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </fieldset>
    </form>


    <?php
    include_once("footer.inc");
    ?>

</body>

</html>