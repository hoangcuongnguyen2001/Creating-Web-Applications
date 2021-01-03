// Place all customised functions in one init
// check which page is loaded
// - customised functions for Page 1

// - customised functions for Page 2

// - customised functions for Page 3


// Here is another way to identify pages
/*
function anotherInit() {

	// Get the filename of the page that is loaded
	var pageId = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	
	// Perform the respective initialisation based on which HTML loads the JavaScript file
	if (pageId == "page1.html") {
		// initialisation statements for Page 1
		
	}
	if (pageId == "page2.html") {
		// initialisation statements for Page 2
	}
	if (pageId == "page3.html") {
		// initialisation statements for Page 3
	}
}
*/

function init() {

	//all pages will do this
		//all pages will do this
	
	if (sessionStorage.lastPage != undefined){
		document.getElementById("message").textContent = "The last page you visited was " + sessionStorage.lastPage;
	}
	else{
		document.getElementById("message").textContent = "This is the first page you have visited!";
	}
	
	var menu = document.getElementsByTagName("nav");	// identify element for different style
	
	// Perform the respective initialisation based on which HTML loads the JavaScript file
	// This example uses an id in the body element, 
	// could also use window.location.href and get the file name see above
	
	if (document.getElementById("p1") != null) {
		// initialisation statements for Page 1
		var menu1 = menu[0].getElementsByTagName("a")[0]; 
		menu1.className="current";
		sessionStorage.lastPage = "Page 1"; //remember the user has visited this page
		
	}
	else if (document.getElementById("p2") != null) {
		// initialisation statements for Page 2
		var menu2 = menu[0].getElementsByTagName("a")[1];
		menu2.className="current";
		sessionStorage.lastPage = "Page 2"; //remember the user has visited this page
	}
	else if (document.getElementById("p3") != null) {
		// initialisation statements for Page 3
		var menu3 = menu[0].getElementsByTagName("a")[2];
		menu3.className="current";
		sessionStorage.lastPage = "Page 3"; //remember the user has visited this page
	}

}


window.onload = init;

