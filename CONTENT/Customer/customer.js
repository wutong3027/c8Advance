function validate_login()
{
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var passwordformat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
	var email = document.forms["Login"]["email"].value;
	var password = document.forms["Login"]["psw"].value;
	
	if (mailformat.test(email)==false){
	alert("You have entered an invalid email address!");
	return false;
	}
	else if (passwordformat.test(password)==false){
	alert("Your Password is Invalid!");
	return false;
	}
}

function reveal() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function reveal_psw2(){
	 var x = document.getElementById("psw_2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function validate_signup() {
	var firstName = document.forms["signup"]["fname"].value;
	var lastName = document.forms["signup"]["lname"].value;
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = document.forms["signup"]["email"].value;
	var phoneformat = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
	var phone = document.forms["signup"]["phone"].value;
	var password = document.forms["signup"]["psw"].value;
	var passwordformat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
	var confirmpassword = document.forms["signup"]["psw_2"].value;
	var gender= document.getElementById("gender");
	var TC = document.getElementById("TC");
	
	if (firstName == "") {
    alert("First name must be filled out");
    return false;
	}
	
	else if (firstName[0]==firstName[0].toLowerCase()){
	alert("First letter of First Name should be Capitalised!");
	return false;
	}
	
	else if (lastName == "") {
    alert("Last name must be filled out");
    return false;
	}
	
	else if (lastName[0]==lastName[0].toLowerCase()){
	alert("First letter of Last Name should be Capitalised!");
	return false;
	}
	
	else if (mailformat.test(email)==false){
	alert("You have entered an invalid email address!");
	return false;
	}
	
	else if (phoneformat.test(phone)==false){
	alert("You have enter invalid phone number!");
	return false;
	}
	
	else if(password==""){
	alert("Please Enter Your Password! ");
	return false;
	}
	
	else if(passwordformat.test(password)==false){
	alert("Your password must contain AT LEAST one uppercase, one lowercase, one special character, numbers and NO SPACE!");
	return false;
	}
	
	
	else if(confirmpassword != password){
	alert("Please make sure you enter the same password as above!");
	return false;
	}

	else if (gender.checked == false) 
    {
        alert ("Please select your gender!");
        return false;
	}
	
	else if (TC.checked == false) 
    {
        alert ("Please agree to our Terms and Conditions!");
        return false;
	}
	else{
		return true;
	}
	
}

function validate_modify() {
	
	var firstName = document.forms["modify"]["fname"].value;
	var lastName = document.forms["modify"]["lname"].value;
	var phoneformat = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
	var phone = document.forms["modify"]["phone"].value;
	var password = document.forms["modify"]["psw"].value;
	var passwordformat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
	var confirmpassword = document.forms["modify"]["psw_2"].value;
	var address = document.forms["modify"]["address"].value;
	
	if (firstName == "") {
    alert("First name must be filled out");
    return false;
	}
	
	else if (firstName[0]==firstName[0].toLowerCase()){
	alert("First letter of First Name should be Capitalised!");
	return false;
	}
	
	else if (lastName == "") {
    alert("Last name must be filled out");
    return false;
	}
	
	else if (lastName[0]==lastName[0].toLowerCase()){
	alert("First letter of Last Name should be Capitalised!");
	return false;
	}
	
	else if (phoneformat.test(phone)==false){
	alert("You have enter invalid phone number!");
	return false;
	}
	
	else if(password==""){
	alert("Please Enter Your Password! ");
	return false;
	}
	
	else if (passwordformat.test(password)==false){
	alert("Your password must contain AT LEAST one uppercase, one lowercase, one special character, numbers and NO SPACE!");
	return false;
	}	
	
	
	else if(confirmpassword != password){
	alert("Please make sure you enter the same password as above!");
	return false;
	}
	
	else if(address = ""){
	alert("Please Enter Your Address!");
	return false;
	}
	
	else{
	return true;
	}
	
	
}
