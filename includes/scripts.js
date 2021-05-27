function toggleCategories(){
    $('#categoriesMenu').slideToggle();
}

function back(){
    window.history.back();
}

function validateSignup(){
    var email = document.forms['login']['email'].value,
        firstName = document.forms['login']['firstName'].value,
        lastName = document.forms['login']['lastName'].value,
        address = document.forms['login']['address'].value,
        postalCode = document.forms['login']['postalCode'].value;

    var emailPat = /[a-zA-Z0-9_-]+@[a-zA-Z0-9-]+\.+([a-zA-Z]){2,4}\.?([a-zA-Z])?/;
    var passwordPat = /[a-zA-Z]{8,}/;

	if(email.match(emailPat)){
		validity++;
	} else {
		alert('Please enter a valid email address.');
		return false;
	}

    if(password.match(passwordPat)){
		validity++;
    } else {
        alert('Password must be at least 8 characters.');
		return false;
    }

    if(firstName.length() > 0){
        validity++;
    } else {
        alert('You must enter a first name.');
        return false;
    }
    
    if(lastName.length() > 0){
        validity++;
    } else {
        alert('You must enter a last name.');
        return false;
    }

    if(validity > 3) {
        return true;
    }
}

function validateUpload(){
    return true;
}

function validateLogin(){
    var validity = 0;
    var emailValue = document.forms['login']['email'].value;
    var password = document.forms['login']['password'].value;
	var emailPat = /[a-zA-Z0-9_-]+@[a-zA-Z0-9-]+\.+([a-zA-Z]){2,4}\.?([a-zA-Z])?/;
    var passwordPat = /[a-zA-Z]{8,}/;

	if(emailValue.match(emailPat)){
		validity++;
	} else {
		alert('Please enter a valid email address.');
		return false;
	}

    if(password.match(passwordPat)){
		validity++;
    } else {
        alert('Password must be at least 8 characters.');
		return false;
    }

    if(validity === 2){
        window.location = 'main.php';
    }
}