// demonstrate how to change style
"use strict";
function myFunction() {
	var para = document.getElementById("demo");
	para.style.width="400px";
	para.style.backgroundColor="lightblue";  //camel case
	para.style.border="dashed 5px red";
	para.style.fontSize="40px";   // camel case
	para.className="orange";  //class-->className

	}

function init() {
   var btn = document.getElementById("clickme");
    btn.onclick = myFunction;  
}
window.onload = init;  




























	//var inputElements=document.getElementById("colors").getElementsByTagName("input");
//		msg += inputElements[i].value + " " + inputElements[i].checked +"<br/>";
