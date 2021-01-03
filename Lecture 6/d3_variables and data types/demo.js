/*  
   Purpose : demonstrate javascript basics  
   Author: A Lecturer
*/

"use strict";
function display() {
	var x;
	/* *******************************************
		Instruction: For each group, remove the comments and look at the result. 
		Exercise: How many hours in a year? Calculate this and assign the value to x.
		          Display "There are ____ hours in a year." in heading 1
	********************************************** */	
	
	//*** mix type
	x = "hello";
	x = x + 4;
	
	//*** number
	//x = 10%3;
	
	//*** boolean
	//x = 5>10;
	
	//*** x is undefined because we only declared x, haven't assigned value to x yet
	//alert(x);
	
	//*** x is null because there is no element with id="intro"
	//x = document.getElementById("intro");
	//alert(x);
	
	var hd1 = document.getElementById("hd1");
	hd1.textContent = x;
}

function init () {	
	var btn = document.getElementById("clickme");  //clickme is the html button id, 
												// btn is your variable name
	btn.onclick = display;      // register the button onclick handler	
}

window.onload = init;



























