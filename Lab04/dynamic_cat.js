/* Filename: dynmaic_cat.js
   Purpose : demonstrate javascript basics  
   Target html: stylish_cat.html
   Author: A Lecturer
   Date written: 
   Revisions:  
*/
"use strict";

//append HTML node and content
function addCuteThing(){
    var cuteThing = prompt("Add another cute thing","");
	var cute_list = document.getElementById("cute_list");
	var item = document.createElement("LI");
	var itemText = document.createTextNode(cuteThing);
	item.appendChild(itemText);
	cute_list.appendChild(item);
}
	
function changeTextColor(){
   var body = document.getElementById("main");
	var p = document.getElementById("color_set");
	//var oldColor = getComputedStyle(body).getPropertyValue("color");
	body.style.color = "green";
	//p.textContent = "The text colour was " + oldColor + ". It is now " + body.style.color;
}

function changeAnyTextColor(){
   var body = document.getElementById("main");
	body.style.color = document.getElementById("color_picker").value;
}
	
function getCatName(){
	var catname = prompt("What is the name of your cat?", "");
	return catname;
}	
	
function init(){
	//alert( "The web page has loaded");
	//var catname = "Moggy";
	var catname = getCatName();
	//alert( "The name of your cat is " + catname); 
	
	//replace exiting text content - method 1
	var title_name = document.getElementById("catname");
	title_name.textContent= catname;
	
	//replace exiting HTML content - method 1
	var replaceStr = "<h2>All About <em>" + catname +"</em></h2>";
	document.getElementById("replaceThisHTML").innerHTML = replaceStr;
	
	//append HTML node and content
	document.getElementById("add_cute").onclick = addCuteThing;

		//change text to any green
	document.getElementById("color_set").onclick = changeTextColor;
	//document.getElementById("color_set").addEventListener("click", changeTextColor);
	
	//change text to any color
	document.getElementById("color_picker").onchange = changeAnyTextColor;
	var cat_picture = document.getElementById("cat_picture");
	
	//change backgrounfd color style
	cat_picture.onclick = changePicColor;
}

window.onload = init;


function changePicColor(){
   var e2 = document.getElementById("cat_picture");
	if(e2.style.backgroundColor == "lightblue")
		e2.style.backgroundColor = "white";
	else
		e2.style.backgroundColor = "lightblue";
}