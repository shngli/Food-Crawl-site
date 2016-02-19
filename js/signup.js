
// validate email format
// Email (must have a @ and . as part of input)
// setCustomValidity() customize txt
function validateEmail(myemail){
	var missing = '';
	var txt = '';
	if (! myemail.value.match(/\S+@\S+\.\S+/)) {
		if(!/\S+\.\S/.test(myemail.value)){
			missing = ".";

		}	
		if (!/\S+@\S/.test(myemail.value)){
			missing = "@";
		}

		if (missing != ''){
		txt = "Please include an " + missing + " in the email address. '" + myemail.value + "' is not a valide email address.";
		}
		else{
			txt = myemail.value + "' is not a valide email address.";
		}
		if (myemail.value == ""){
			txt = "Please fill out this field.";
		}
		myemail.setCustomValidity(txt);	
	}
	else{
		myemail.setCustomValidity("");	
	}
}

function matchPassword(){
	var pass1 = document.getElementById("password1").value;
	var pass2 = document.getElementById("password2").value;
	if(pass1 !=pass2){
		alert("Password Does Not Match.");
		return false;
	}
	else{
		return t
	}
}