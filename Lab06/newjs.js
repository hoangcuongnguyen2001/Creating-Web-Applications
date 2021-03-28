/** 
*Author: Cuong Nguyen
*Target: clickme.html
*Purpose: This file is for modification of behavior on clickme.html
*Created: 8/9/2020
*Last updated : 
*Credits: 
*/

"use strict";

function promptName()
{
  var sName = prompt("Enter your name.\nThis prompt should show up when the\n"
                     + "Click Me button is clicked.", "Your name");

  alert("Hi there " + sName + ".Alert boxes are a quick way to check the state of\n your variables"
        + "when you are developing code.");
		
   rewriteparagraph(sName);
}

function writeNewMessage()
{
	var newmessage = document.getElementById("newmessage");
	newmessage.textContent = "You have now finished Task 1";
}

function rewriteparagraph(userName)
{
	var rewrite = document.getElementById("message");
	rewrite.innerHTML = "Hi " + userName + ". If you can see this you have successfully overwritten the contents of the paragraph. Congratulations!";
	
}

function init()
{
	var clickMe = document.getElementById("clickme");
	clickMe.onclick = promptName;
	
	
	var para = document.getElementById("newheading");
	para.onclick = writeNewMessage;
}

window.onload = init;