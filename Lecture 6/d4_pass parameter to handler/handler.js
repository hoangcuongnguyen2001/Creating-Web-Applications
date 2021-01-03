// pass parameters to event handler
"use strict";

function displayMsg(str) {
	alert ("You selected " + str + ".");
}

function init() {
	var buttons=document.getElementsByTagName("button");
	for (var i=0; i<buttons.length; i++)
		buttons[i].onclick =function () {
						displayMsg (this.textContent);
		}				
		/* another method
		buttons[i].addEventListener("click", 
									function(){
										displayMsg (this.textContent);
										}
									);	*/
		
}
window.onload = init;      
