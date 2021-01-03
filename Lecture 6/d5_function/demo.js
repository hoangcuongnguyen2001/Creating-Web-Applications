/*  
   Purpose : demonstrate javascript basics  
   Author: A Lecturer
*/
/* ********************************************************
Exercise: Write a function named calcPuppyAge that:
	takes 1 argument: your puppy's age.
	calculates your dog's age based on the conversion rate of 1 human year to 7 dog years.
	outputs the result to the screen like: "Your doggie is N years old in dog years!"
************************************************************/

"use strict";

function sum ( x,y) {
	var s=x+y;
	return s;
}
function display() {
	var x = sum (10, 20); // change to sum("hello", "world")

	var hd1 = document.getElementById("hd1");
	hd1.textContent = x;
}

function init () {	
	var clickme = document.getElementById("clickme");
	clickme.onclick = display;      // register the button onclick handler	
}

window.onload = init;



























