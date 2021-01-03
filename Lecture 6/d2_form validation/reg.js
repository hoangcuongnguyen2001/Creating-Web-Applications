"use strict";
function checkPhoneNumber(phoneNo) { 
	var phoneRE = /^\(\d\d\) \d\d\d\d-\d\d\d\d$/; 
	var str = ""; 
	if (!phoneRE.test(phoneNo)) { 
		str="The phone number entered is invalid!\n"
	} 
	return str;
} 
/* *****************************************************
Exercise: validate 	Last Name : only accept letters and apostrophe
					Age: is a number
					Phone Number: in (88) 8888-8888 format
*********************************************************** */
function validate () {
	var errMsg = "";
	var result = true; 
	
	// get form data
	var fname = document.getElementById("fname").value.trim();
	var lname = document.getElementById("lname").value.trim();
	var age = 	document.getElementById("age").value.trim();
	var phone = document.getElementById("phone").value.trim();
	
	// validate
	if (fname == "") {
		errMsg += "First Name cannot be empty.\n";
	}
	
	if (lname == "") {
		errMsg += "Last Name cannot be empty.\n";
	}
		

	if (age == "") {
		errMsg += "Age cannot be empty.\n";
	}
	
	if (phone == "") {
		errMsg += "Phone number cannot be empty.\n";
	}
	// display message and return
	if (errMsg != "") {
		alert (errMsg);
		result = false;
	} 
 
	return result;
}

function init() {
 var regForm = 	document.getElementById("regForm");
 regForm.onsubmit = validate;
}

window.onload = init;
