/*  
   Purpose : demonstrate javascript basics  
   Author: A Lecturer
*/
/* ******************************************************
Exercise: prompt input state such as vic, nsw, act, etc, and input age
		If vic (must older than 20) or nsw (any age), display message "You can join the club."
		else, display message "Sorry you cannot join the club"
*********************************************************/

"use strict";
function display() {
	var x;
	
	var age=prompt("Please enter your age: ");
 
	if (age>=18 && age<=28)  // between 18 and 28
		x = "You can join the climbing club.";
	else 
		x= "Sorry, you cannot attend the climbing club.";
	
	
	var hd1 = document.getElementById("hd1");
	hd1.textContent = x;
}

function init () {	
	var clickme = document.getElementById("clickme");
	clickme.onclick = display;      // register the button onclick handler	
}

window.onload = init;



























