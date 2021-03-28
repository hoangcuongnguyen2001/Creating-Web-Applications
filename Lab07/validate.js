"use strict";


function validate()
{
	var errMsg = "";
	var result = true;
	
	var firstname = document.getElementById("firstname").value;
	if(!firstname.match(/^[A-Za-z]+$/)){
		errMsg += "Your first name must only contain alpha characters. "
		result = false;
	}
	
	var lastname = document.getElementById("lastname").value;
	if(!lastname.match(/^[A-Za-z-]+$/)){
		errMsg += "Your last name must only contain alpha characters and hyphens. "
		result = false;
	}
	
	
	var age = document.getElementById("age").value;
	if(isNaN(age)){
		errMsg += "Your age must be a number! "
		result = false;
	} else if(age < 18){
		errMsg += "Your age should be 18 or older. "
		result = false;
	} else if(age >= 10000){
		errMsg += "Your age should be younger than 10000. "
		result = false;
	} else {
		var tempMsg = checkSpeciesage(age);
		if(tempMsg != ""){
			errMsg = errMsg + tempMsg;
			result = false;
		}
	}
	
	var beardlength = document.getElementById("beard").value;
	var newMsg = checkSpeciesbeard(age, beardlength);
		if(newMsg != ""){
			errMsg = errMsg + newMsg;
			result = false;
		}
	
	var numberTravellers = document.getElementById("partySize").value;
	if(numberTravellers < 1){
		errMsg += "Your number of travellers must be at least 1. "
		result = false;
	} else if(numberTravellers > 100){
		errMsg += "Your number of travellers must be 100 at maximum. "
		result = false;
	}
	
	if(document.getElementById("food").value == "none"){
		errMsg += "You must select a food preference. "
        result = false;
	}

    
    var is1day = document.getElementById("1day").checked;
	var is4day = document.getElementById("4day").checked;
	var is10day = document.getElementById("10day").checked;
	
	if(!(is1day || is4day || is10day)){
		errMsg += "Please select at least one trip./n"
		result = false;
	}
	
	if (errMsg != ""){
      alert(errMsg);	
	}
	return result;
}


function getSpecies()
{
	var speciesName = "Unknown";
	var speciesArray = document.getElementById("species").getElementsByTagName("input");
	
	for (var i = 0; i < speciesArray.length; i++){
		if (speciesArray[i].checked)
		speciesName = speciesArray[i].value;
	}
	return speciesName;
	
}


function checkSpeciesage(age)
{
	var errMsg = "";
	var species = getSpecies();
	switch(species){
	case "Human":
	     if (age > 120){
			 errMsg += "You cannot be a Human and over 120. ";
			 break;
		 }
	case "Dwarf":
	case "Hobbit":
	    if (age > 150){
			errMsg += "You cannot be a" + species + "and over 150. ";
			break;
	    }
	case "Elf":
	    break;
		
	default:
	    errMsg += "We cannot allow your kind in a tour./n";
	}
	return errMsg;
}


function checkSpeciesbeard(age,beardlength)
{
	var errMsg = "";
	var species = getSpecies();
	switch(species){
	case "Human":
	   break;
	case "Dwarf":
	   if((age > 30) && (beardlength <= 12)) {
		   errMsg += "You have to have a beard longer than 12 inches. "
		   break;
	   }
	case "Elf":
	   if(beardlength != 0){
		   errMsg += "You are not supposed to have beard. "
		   break;
	   }
	case "Hobbit":
	   if(beardlength != 0){
		   errMsg += "You are not supposed to have beard. "
		   break;
	   }
	default:
	}
	return errMsg;
}

	
		   

function init()
{
	var regForm = document.getElementById("regform");// get ref to the HTML element
    regForm.onsubmit = validate; //register the event listener 
}

window.onload = init;
