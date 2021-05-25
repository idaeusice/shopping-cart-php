var loggedIn = false;

//onload of the main page, for each of the products returned, add a row
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

function login() {
    //can redirect to a login page (php) or show a modal and do everything dynamically (php + js)
    $('#main').append('<div id="loginModal"></div>');
    /* Can make an ajax call to login to do something, then continue on. 
    $.ajax({
        url: "login.php",
        type: "post",
        dataType: "json",
        data: {userName: false}
    });
    */
    $('#loggedInText').html('Log Out');
}

function logout() {
    $('#loggedInText').html('Log In');
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