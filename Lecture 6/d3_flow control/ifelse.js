"use strict";

function myFunction() {
	var myV="";
	
	
	// ****** Exercise: fill in the condition *******
	var t = prompt ("Please enter the time:");
	if (  (t<0) || (t>23)  ) {
		myV = "wrong time";
	}
	else  {
		if (      )
			myV = "good morning!";
		else if (      )
			myV = "good afternoon";
		else 
			myV = "good evening";
	}


	
	var myH1 = document.getElementById("welcome"); 
    myH1.innerHTML = myV;      // textContent
	
	
}

function init() {
	document.getElementById("button").onclick=myFunction;
}
window.onload = init;      


