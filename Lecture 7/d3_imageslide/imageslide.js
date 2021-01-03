"use strict";
var running;
var currentImg = 0;  // set start position as global
var theImages = new Array("img0.jpg","img1.jpg","img2.jpg");
var theTexts  = new Array("text0","text1","text2");

function cycleImage() {
   var figImg = document.getElementById("picImage");
   var figCap = document.getElementById("picText");
   if(document.images) {
	currentImg++;	
	currentImg = currentImg%3;
	figImg.src = theImages[currentImg];
	figCap.textContent = theTexts[currentImg];
   }
}
function startSlideShow(){
	running = setInterval("cycleImage()", 2000);  //2 secs
}	
function stopSlideShow(){
	window.clearInterval(running);
}	
function init() {
   document.getElementById("start").onclick = startSlideShow;
   document.getElementById("stop").onclick  = stopSlideShow; 
}
window.onload = init;