/*  
   Purpose : demonstrate javascript basics  
   Author: A Lecturer
*/

"use strict";
function changeBg() {
	var hd1 = document.getElementById("hd1");
	hd1.style.backgroundColor = "yellow";
}

function changeText() {
	var para2 = document.getElementById("para2");
	para2.textContent = "We are learning Javascripts";
}

function init () {
	var para1 = document.getElementById("para1");
	para1.onclick = changeText;      // register para 1 onclick handler
	
	var para2 = document.getElementById("para2");
	para2.onclick = changeBg;		// register para 2 onclick handler

	// Exercise: when para 3 is clicked, 
	//          - change the h1 text to "Javascript Introduction"
	//          - chang the h1 text color to red (hint: use .style.color  )
	
}

window.onload = init;



























