"use strict";

function myFunction() {
	var myV;

	// milliseconds from 01 January 1970 00:00:00 UTC
	myV=new Date(100000000000);    // try negative number
	
	//7 numbers: year, month, day, hour, minute, second, and millisecond, in  order
	//myV = new Date(2019, 3, 8, 14, 30, 20, 2); // month starts from 0, can omit any of the last 4 parameters
	
	//getDay  getMonth getFullYear
	/*var d = new Date();
	myV = "Week of day: " + d.getDay () +"<br>"   // day of the week, sunday is 0
		+ "Full year: " + d.getFullYear() + "<br>"
		+ "Month: " + d.getMonth() + "<br>"
		+ "Date: " + d.getDate();   
	*/

	var myH1 = document.getElementById("welcome"); 
    myH1.innerHTML = myV;   
	
}

function init() {
	document.getElementById("button").onclick=myFunction;
}
window.onload = init;      


