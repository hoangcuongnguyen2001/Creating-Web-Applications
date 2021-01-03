"use strict";

function myFunction() {
	var myV="";
	

var fruitType = "Oranges";
 
switch (fruitType) { 
	case "Oranges": 
		myV = "Oranges are $3.00 a kilo.\n"; 	
		break;
	case "Apples":
		myV = "Apples are $1.99 a kilo.\n"; 
		break;
	case "Mangoes": 
		myV = "Mangoes are $2.00 each.\n"; 
		break;
	case "Avocadoes": 
		myV = "Avocadoes are $2.00 each.\n"; 
		break; 
	default: 
		myV = "Sorry, we are out of " + fruitType; 
} 

	
	var myH1 = document.getElementById("welcome"); 
    myH1.textContent = myV;   
}


window.onload = myFunction;      
