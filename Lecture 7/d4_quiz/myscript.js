"use strict";

function saveResult (studID, score){
	if(typeof(Storage)!=="undefined"){
		localStorage.setItem("studID", studID);
		localStorage.setItem("score", score);		
	}
}

function getResult(){
	if(typeof(Storage)!=="undefined"){
		if (localStorage.getItem("studID") !== null) {
			var studID= document.getElementById("studID");
			studID.textContent = localStorage.getItem("studID"); // span or label: use textContent
			
			var score= document.getElementById("score");
			score.value = localStorage.getItem("score");    // input: use value
			
		}	
	}
}

function validate() {
	var errMsg="";
	var result=true;
	var score=0;
	
	var studID=document.getElementById("studID").value;
	var q1=document.getElementById("q1").value.trim();
	var q2=document.getElementById("q2").value;
	
	//student id
	if (studID=="") {  //  student id format validation is omitted
		errMsg += "Please enter your student ID.<br>";
		result=false;
	}
	// question 1
	if (q1=="") {   
		errMsg += "Please enter your answer to Q1.<br>";
		result=false;
	}
	else if (q1.match(/algorithm/i) ){  // contains "algorithm", case insensitive
			score += 10;
	}
	// question 2
	if (q2=="speechRecog") {
		score += 10;
	}
		
	//  display error message and return
	if (errMsg!="") 
		document.getElementById("err").innerHTML=errMsg;
	else if (score==0) {
		document.getElementById("err").innerHTML="Score is zero";
		result=false;
	}
	else {    // no error, score not zero, save data to storage
		saveResult(studID, score);
	}
	return result;	
}



function init() {
	if (document.getElementById("quizPage")) {  // quiz page init
		document.getElementById("quizForm").onsubmit = validate;
	
	}
	else if (document.getElementById("resultPage")) { // result page init
		getResult();		
	}
}
window.onload = init;  
