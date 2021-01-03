/** 
 *Author: Cuong Nguyen
 *Target: quiz.html
 *Purpose: This file is for modification of behavior on the quiz webpage.
 *Created: 8/9/2020
 *Last updated: 27/9/2020
 *Credits: 
 */

"use strict";

function saveResult(studentid, given, family, score, numberOfAttempts) {
	if (typeof(Storage) != undefined) { // for saving result
		sessionStorage.studentid = studentid;
		sessionStorage.given = given;
		sessionStorage.family = family;
		sessionStorage.score = score;
		localStorage.setItem("numberOfAttempts", numberOfAttempts);
	}

}

function getResult() {
	if ((sessionStorage.studentid != undefined) && (typeof(Storage) != undefined)) { //if sessionStorage for given name is not empty
		//confirmation text
		document.getElementById("fullname").textContent = sessionStorage.given + " " + sessionStorage.family;
		document.getElementById("newid").textContent = sessionStorage.studentid;
		document.getElementById("score").textContent = sessionStorage.score;
		document.getElementById("numberOfAttempts").textContent = localStorage.getItem("numberOfAttempts");

		document.getElementById("given").value = sessionStorage.given;
		document.getElementById("family").value = sessionStorage.family;
		document.getElementById("studentid").value = sessionStorage.studentid;
		document.getElementById("score").value = sessionStorage.score;
		document.getElementById("numberOfAttempts").value = localStorage.getItem("numberOfAttempts");
	}
}




function countdown(minutes) { // credit: https://gist.github.com/adhithyan15/4350689
	var seconds = 60;
	var mins = minutes;

	function tick() {

		var errMsg = "";
		//This script expects an element with an ID = "counter".
		var counter = document.getElementById("counter");
		var current_minutes = mins - 1;
		seconds = seconds - 1;
		counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
		if (seconds > 0) {
			setTimeout(tick, 1000);
		} else {
			if (mins > 1) {
				countdown(mins - 1);
			}
		}
		if ((current_minutes == 0) && (seconds == 0)) {
			errMsg += "Your time is up!";
			alert(errMsg);
			window.location.replace("index.html");
		}
		return errMsg;
	}
	tick();
}

	
	
function validate() {
	var result = true;
	var score = 0;
	var errMsg = "";

	// Those are for student ID, given name and family name.
	var studentid = document.getElementById("studentid").value;
	var given = document.getElementById("given").value;
	var family = document.getElementById("family").value;
	var numberOfAttempts = 0; //Specify number of attempts that users try to do the quiz.

	var q1 = document.getElementById("1988"); // For the first question.
	var q2 = document.getElementById("rank").value; // For the second question.
	var q3 = document.getElementById("tradition").value; // For the third question.
	var q4_1 = document.getElementById("authentication");
	var q4_2 = document.getElementById("inspection"); // For the fourth question
	var q5 = document.getElementById("ngfw").value; //For the fifth question

	

	//help from my tutor Grace Tao.
	if (localStorage.getItem("numberOfAttempts") != null) {
		numberOfAttempts = localStorage.getItem("numberOfAttempts");
	} else {
		numberOfAttempts = 0;
	}

	//set number of attempts to an integer before put to localStorage.
	//help from my tutor Grace Tao.
	numberOfAttempts = Number(numberOfAttempts) + 1;
	if (numberOfAttempts > 3) {
		alert("You cannot answer the quiz more than 3 times!");
		result = false;
	}

	if (q1.checked) {
		score += 10;
	}

	if (q2 == "") //Because Please Select has no value.
	{
		errMsg += "Please select your answer for Question 2.<br>";
		result = false;
	} else if (q2 == "IDC") {
		score += 10;
	}

	if (q3.match("Enter your answer here...")) { // because this is a default sentence for the table.
		errMsg += "Please write your answer for Question 3.<br>";
		result = false;
	} else if (q3.match(/network-based/i, /application-based/i) || q3.match(/network-layer/i, /application-layer/i)) { // Real answer for Q3(could use based or layer).
		score += 10;
	}


	if ((q4_1.checked) && (q4_2.checked)) {
		score += 20;
	} else if ((q4_1.checked) || (q4_2.checked)) {
		score += 10;
	}


	if (q5.match(/static/i) && q5.match(/dynamic/i)) // Check that the answer is matched with this right answer for q5.
	{
		score += 10;
	}
	

	//This part is for modifying the color when error happened.
	// Credit for this part: https://www.w3schools.com/jsref/met_document_queryselector.asp
	var error = document.querySelector("#err");
	error.style.backgroundColor = "red";
	
	
	   //Also because there is only one checkbox in the page(for question 4),so using querySelector is better.
	   // Credit: https://flaviocopes.com/how-to-check-checkbox-checked/
	if (!document.querySelector('.checkbox').checked) { //Check that student has chosen answer.
		errMsg += "Please select your answer for Question 4.<br>";
		result = false;
	}

   

	// This part is for conditions of validation
	if (errMsg != ""){
		document.getElementById("err").innerHTML = errMsg;

	} else if (score == 0) {
		document.getElementById("err").innerHTML = "Score is zero";
		result = false;
	} else {
		saveResult(studentid, given, family, score, numberOfAttempts);
	}

	return result;
}




function init() {
	var debug = false;
	if ((document.getElementById("quizPage")) && (debug)) { // quiz page init
		countdown(10);
		document.getElementById("details").onsubmit = validate;
	
    } else if (document.getElementById("resultWebsite")) { // result page init
		getResult();
	}
	
}


window.onload = init;