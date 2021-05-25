function openCategories(){
    $('#categoriesMenu').slideToggle();
}

function closeCategories(){
    $('#categoriesMenu').slideToggle();
}

function addToCart(){
    
}

function validateSignup(){
    var valid = false,
        email = document.forms['login']['email'].value,
        firstName = document.forms['login']['firstName'].value,
        lastName = document.forms['login']['lastName'].value,
        address = document.forms['login']['address'].value,
        postalCode = document.forms['login']['postalCode'].value;


    if(email != ''){
        return valid;
    } else {
        valid = true;
    }

    return valid;
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