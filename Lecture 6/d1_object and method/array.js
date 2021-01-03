"use strict";

function myFunction() {
	var myV;
	
	//   auto expand
	var favSubjects=[];
	favSubjects[5]="CWA";
	myV=favSubjects.length; 
	
	// dom
	//myV = document.links[0].textContent + "  " + document.links[1].textContent;
	
	//join
	//var fruits=["Apple", "Banana", "Cherry"];
	//myV=fruits.join("***");
	
	//reverse
	//var fruits=["Apple", "Banana", "Cherry"];
	//myV = fruits.reverse();
	
	/* **************************************************
	//Exercise: use prompt to get date of birth in dd/mm/yyyy format, eg. 25/05/1999
	//          display "You were born in yyyy" 
	//			(hint: string method split("/").  )
	************************************************** */
	
	var myH1 = document.getElementById("welcome"); 
    myH1.textContent = myV;   
	
}

function init() {
	document.getElementById("button").onclick=myFunction;
}
window.onload = init;      













































/*
	var dob=prompt ("Please enter your date of birth in dd/mm/yyyy format");
	dob = dob.split("/");
	myV="You were born in " +dob[2];
*/
