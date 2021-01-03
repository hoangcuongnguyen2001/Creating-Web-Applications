"use strict";

function myFunction() {
	var myV="";
	


	for (var i=0; i<10; i++)
		myV = myV  + i + "  ";    

	
/*  Exercise: display day of the week
	var days=["Mon", "Tue","Wed","Thu", "Fri","Sat","Sun"];

*/

/*	
	// for in
	var days=["Mon", "Tue","Wed","Thu", "Fri","Sat","Sun"];
	for (var property in days) {
        myV += days[property] + " ";
	}	
*/	
 
/* 
	//for In 
	
	var person = {fname:"Amy", lname:"Smith", age:20}; 
    
	var property;
	for (property in person) {
        myV += person[property] + " ";
	}  
*/
	
	var myH1 = document.getElementById("welcome"); 
    myH1.innerHTML = myV;      // textContent
	
	
}

function init() {
	document.getElementById("button").onclick=myFunction;
}
window.onload = init;      


