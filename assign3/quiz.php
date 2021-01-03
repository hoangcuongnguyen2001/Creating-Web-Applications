<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Quiz about Firewall Technology" />
	<meta name="keywords" content="Quiz, firewall" />
	<meta name="author" content="Cuong Nguyen" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quiz about Firewall Technology</title>
	<link rel ="stylesheet" href="styles/style.css" />
	<script src="scripts/quiz.js"></script>
</head>



<body id="quizPage">

<?php
include_once("menu.inc");
?>



<?php
include_once("header.inc");
?>
<hr />

<p> Now, after learning about Firewall Technology, it's the time to do the quiz and check your understanding! </p>
<p> Before doing that, please enter your name and student ID.</p>

<p> Please remember that each student only have 10 minutes for the quiz!</p>
<p id="counter"></p>
 <br />
<form id="details" method="post" action="markquiz.php" novalidate="novalidate" >
<fieldset>
<legend><em>Student details</em></legend>
<p><label for="studentid"> Student ID</label>
<input type="text" name="studentid" id="studentid" required="required" class="info" pattern="[0-9]{7}|[0-9]{10}" /></p>
<p><label for="given"> Given Name</label>
<input type="text" name="given" id="given" maxlength="25" size="15" class="info" required="required" pattern="^[A-Za-z-]+$" />
<label for="family"> Family Name</label>
<input type="text" name="family" id="family" maxlength="25" size="15" class="info" required="required" pattern="^[A-Za-z-]+$"/></p>
</fieldset>
<fieldset>
<legend><em>Questions</em></legend>
<p>The first type of firewall was invented in what year? </p>
<label><input type ="radio" name="unit" value="1986"  id="1986" checked="checked" required="required"  />1986</label>
<label><input type ="radio" name="unit" value="1987"  id="1987"/>1987</label>
<label><input type ="radio" name="unit" value="1988"  id="1988"/>1988</label>
<label><input type ="radio" name="unit" value="1989"  id="1989"/>1989</label>
<p><label for="rank">What company developed United Threat Management(UTM)?</label>
<select name="rank" id ="rank" >
<option value="" selected="selected">Please Select</option>
<option value="Cisco" >Cisco</option>
<option value="DEO">Digital Equipment Organisation</option>
<option value="AT&T">AT&T</option>
<option value="IDC">International Data Corporation</option>
</select>
</p>

<p><label>What types of firewall could be classified as traditional firewalls?<br />
<textarea name="writtenanswer" rows="5" cols="50" id="tradition" required="required"> Enter your answer here...
</textarea></label></p>
<p> What characteristics could be considered as advantages of network-based application-layer firewalls?</p>
<p><label><input type="checkbox" class="checkbox" name="issue[]" value="inspection" id="inspection" />
Better inspecting the contents of traffic and blocking specific contents</label></p>
<p><label><input type="checkbox" class="checkbox" name="issue[]" value="authentication"  id="authentication"/>
Could consolidate authentication, and offload encryption from outside servers</label></p>
<p><label><input type="checkbox" class="checkbox" name="issue[]" value="versatile" id="versatile"/>
Being more versatile and having dynamic roles</label></p>
<p> <label for="ngfw">  Which types of packet filtering are similar in both traditional and Next-Generation Firewall?
<input type="text" name="ngfw" id="ngfw" maxlength="40" size="20" required="required" /></label>
</fieldset>

<p>
<input type="submit" name="submit" id="submit" value="Submit your response"/>
<input type="reset" id="reset"  value="Reset form" />
</p>
</form>
<p id="err"></p>
<p> Thank you for your participation! Hopefully you could have more understanding about history and mechanism of firewall!</p>


<?php
include_once("footer.inc");
?>
</body>
</html>