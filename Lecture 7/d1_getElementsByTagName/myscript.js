/* 
	1) getElementById  /  getElementsByTagName    
	2) access html object attributes
	3) document.getElementsByTagName /  obj.getElementsByTagName
*/

"use strict";
function myFunction() {
	var inputElements=document.getElementsByTagName("input");

	var msg="";
	for (var i=0; i<inputElements.length; i++)
		msg += inputElements[i].value + " " + inputElements[i].checked +"<br/>";

	document.getElementById("demo").innerHTML=msg;
	}

function init() {
   var btn = document.getElementById("clickme");
    btn.onclick = myFunction;  
}
window.onload = init;  