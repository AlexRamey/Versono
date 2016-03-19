var feedback_empty = "You can't leave this empty.";
var empty_string = "";

function verifyMatchingPasswords() {
    var p1 = document.getElementById("pswd_input_1").value;
    var p2 = document.getElementById("pswd_input_2").value;
    feedback = (p1.localeCompare(p2) == 0) ? "" : "Passwords don't match!";
    document.getElementById("pswd_neg_feedback").innerHTML = feedback;
    feedback = (p1.localeCompare(p2) == 0) ? ((p1.localeCompare("") == 0) ? "" : "Passwords match!") : "";
    document.getElementById("pswd_pos_feedback").innerHTML = feedback;
}

function verifyEmail() {
	var email = document.getElementById("email_input").value;

	if (email.localeCompare(empty_string) == 0) {
		document.getElementById("email_feedback").innerHTML = feedback_empty;
		document.getElementById("email_feedback").style.borderColor = "red";
	}
	else {
		if (!/^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+/.test(email)){
			document.getElementById("email_feedback").innerHTML = "Your email must consist of alphanumeric characters and periods, following format X@Y.Z";
		}
		else {
			document.getElementById("email_feedback").innerHTML = empty_string;
		}
			

	}
}

// if caller = 0, then event was fired by fname
// if caller = 1, then event was fired by lname
function verifyName(caller) {
	var fname = document.getElementById("fname_input").value;
	var lname = document.getElementById("lname_input").value;

	// Check if one of the fields is empty
	// Note that if the first name field was filled, and the user is
	// progressing to the last name field, the error message should not 
	// (yet) be displayed
	if (fname.localeCompare(empty_string) == 0) {
		document.getElementById("name_feedback").innerHTML = feedback_empty;
	}
	else {
		if (caller == 1 && lname.localeCompare(empty_string) == 0) {
			document.getElementById("name_feedback").innerHTML = feedback_empty;
		}
		else {
			document.getElementById("name_feedback").innerHTML = empty_string;
		}
			
	}

	// Names are limited to alphabetic characters
	if (fname.localeCompare(empty_string) != 0 && lname.localeCompare(empty_string) != 0 &&
		(!/^[a-zA-Z]+$/.test(fname) || !/^[a-zA-Z]+$/.test(lname))) {
				document.getElementById("name_feedback").innerHTML = "Your name may only use alphabetic characters.";
			}
}

// if caller = 0, then event was fired by password
// if caller = 1, then event was fired by confirm password
function verifyPassword(caller) {
	var pswd = document.getElementById("pswd_input_1").value;
	var con_pswd = document.getElementById("pswd_input_2").value;

	// This logic is identical to that in verifyName()
	if (pswd.localeCompare(empty_string) == 0) {
		document.getElementById("pswd_empty_feedback").innerHTML = feedback_empty;
	}
	else {
		if (caller == 1 && con_pswd.localeCompare(empty_string) == 0) {
			document.getElementById("con_pswd_empty_feedback").innerHTML = feedback_empty;
		}
		else {
			document.getElementById("con_pswd_empty_feedback").innerHTML = empty_string;
		}
		document.getElementById("pswd_empty_feedback").innerHTML = empty_string;

	}
}

function verifyAddress() {
	var addr = document.getElementById("addr_input").value;

	if (addr.localeCompare(empty_string) == 0) {
		document.getElementById("addr_feedback").innerHTML = feedback_empty;
	}
	else {
		if (!/^[a-zA-Z0-9\s]+$/.test(addr)) {
			document.getElementById("addr_feedback").innerHTML = "Your address must consist of alphanumeric characters and spaces.";
		}
		else {
			document.getElementById("addr_feedback").innerHTML = empty_string;
		}
	}
}

function verifyCity() {
	var city = document.getElementById("city_input").value;

	if (city.localeCompare(empty_string) == 0) {
		document.getElementById("city_feedback").innerHTML = feedback_empty;
	}
	else {
		if (!/^[a-zA-Z\s]+$/.test(city)) {
			document.getElementById("city_feedback").innerHTML = "Your city must consist of alphabetic characters and spaces.";
		}
		else {
			document.getElementById("city_feedback").innerHTML = empty_string;
		}

	}
}

function verifyZip() {
	var zip = document.getElementById("zip_input").value;

	if (zip.localeCompare(empty_string) == 0) {
		document.getElementById("zip_feedback").innerHTML = feedback_empty;
	}
	else {
		if (!(/^[0-9]{5}$/.test(zip))) {
			document.getElementById("zip_feedback").innerHTML = "Your ZIP code must consist of 5 digits.";
		}
		else {
			document.getElementById("zip_feedback").innerHTML = empty_string;
		}

	}
}

function verifyCardName(){
	var name = document.getElementById("card_name").value;

	if (name.localeCompare(empty_string) == 0){
		document.getElementById("card_name_feedback").innerHTML = feedback_empty;
	}else{
		if (!(/^[a-zA-Z ]+$/.test(name))) {
			document.getElementById("card_name_feedback").innerHTML = "Name may only contain letters and spaces.";
		}else{
			document.getElementById("card_name_feedback").innerHTML = empty_string;
		}
	}
}

function setSubmitState(){
	var name = document.getElementById("card_name").value;

	if (name.localeCompare(empty_string) == 0){
	    document.getElementById('submit_btn').disabled = true;
	}else{
		if (!(/^[a-zA-Z ]+$/.test(name))) {
			document.getElementById('submit_btn').disabled = true;
		}else{
			document.getElementById('submit_btn').disabled = false;
		}
	}
}

function verifyCardNumber(){
	var number = document.getElementById("card_number").value;

	if (number.localeCompare(empty_string) == 0){
		document.getElementById("card_number_feedback").innerHTML = feedback_empty;
	}else{
		if (!(/^[0-9]{16}$/.test(number))) {
			document.getElementById("card_number_feedback").innerHTML = "Card number must be 16 digits long.";
		}
		else {
			document.getElementById("card_number_feedback").innerHTML = empty_string;
		}
	}
}

function verifyCVCNumber(){
	var cvc = document.getElementById("cvc_number").value;

	if (cvc.localeCompare(empty_string) == 0){
		document.getElementById("cvc_number_feedback").innerHTML = feedback_empty;
	}else{
		if (!(/^[0-9]{3}$/.test(cvc))) {
			document.getElementById("cvc_number_feedback").innerHTML = "CVC must be 3 digits long.";
		}
		else {
			document.getElementById("cvc_number_feedback").innerHTML = empty_string;
		}
	}
}