"use strict";

function myFunction() {
	var myV;
	
    var str1="hello";
	var str2=new String("Welcome to CWA!");
	
	myV=typeof(str1) + " ~~~  " + typeof(str2);

	//myV=str2.replace(/cwa/,"Creating Web Applications");

	//Exercise: use string method toUpperCase() to convert str2 to upper case;   //toLowerCase
		
	var myH1 = document.getElementById("welcome"); 
    myH1.textContent = myV;   
}

function init() {
	document.getElementById("button").onclick=myFunction;
}
window.onload = init;      


