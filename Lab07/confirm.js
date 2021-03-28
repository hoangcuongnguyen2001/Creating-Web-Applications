/**
* Author: Grima Wormtongue
* Target: confirm.html
* Purpose: Load data from session storage and submit to server
* Credits: J.R. Tolkein
*/
"use strict";
/*get variables from form and check rules*/
function validate(){
	
	var errMsg = "";								/* stores the error message */
	var result = true;								/* assumes no errors */


	return result;    //if false the information will not be sent to the server
}

//This should be really be calculated securely on the server! 
function calcCost(trips, partySize){
	var cost = 0;
	if (trips.search("1day") != -1) cost = 200;
	if (trips.search("4day")!= -1) cost += 1500;
	if (trips.search("10day")!= -1) cost += 3000;
	return cost * partySize;
}

function getBooking(){
	var cost = 0;
	if(sessionStorage.firstname != undefined){    //if sessionStorage for username is not empty
		//confirmation text
		document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
		document.getElementById("confirm_age").textContent =sessionStorage.age;
		document.getElementById("confirm_trip").textContent = sessionStorage.trip;
		document.getElementById("confirm_species").textContent = sessionStorage.species;
		document.getElementById("confirm_food").textContent =sessionStorage.food;
		document.getElementById("confirm_partySize").textContent = sessionStorage.partySize;
		cost = calcCost(sessionStorage.trip, sessionStorage.partySize);
		document.getElementById("confirm_cost").textContent = cost;
		//fill hidden fields
		document.getElementById("firstname").value = sessionStorage.firstname;
		/*
		Write lastname, age, species, age, food, and partySize from seesionStorage to the hidden inputs 
		*/
		document.getElementById("cost").value = cost;
	}

}


function init () {
	
	var bookForm = document.getElementById("bookform");// link the variable to the HTML element
	bookForm.onsubmit = validate;          /* assigns functions to corresponding events */
	
 }

window.onload = init;
