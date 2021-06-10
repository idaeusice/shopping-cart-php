function toggleCategories(){
    $('#categoriesMenu').slideToggle();
}

function back(){
    window.history.back();
}

function addProduct(){
    //category is not checked, because it will always be included.
    var valid = 0,
        productName = document.forms['addProduct']['productName'].value,
        productPrice = document.forms['addProduct']['productPrice'].value,
        productDescription = document.forms['addProduct']['productDescription'].value,
        productStock = document.forms['addProduct']['productStock'].value;

    if(productName.length < 1){
        alert('Error. Submission was invalid. Please try again and complete all fields.');
        return false;
    } else {
        valid++;
    }
    if(productPrice == ''){
        alert('Error. Submission was invalid. Please try again and complete all fields.');
        return false;
    } else {
        valid++;
    }
    if(productDescription.length < 1){
        alert('Error. Submission was invalid. Please try again and complete all fields.');
        return false;
    } else {
        valid++;
    }
    if(productStock < 1){
        alert('Error. Submission was invalid. Please try again and complete all fields.');
        return false;
    } else {
        valid++;
    }

    if(valid > 3){
        return true;
    } else {
        alert('Error. Submission was invalid. Please try again and complete all fields.');
        return false;
    }
}

function validateSignup(){

        if(productName.length < 1){
            alert('Please enter a valid product name.');
        } else {
            valid++;
        }
        if(productPrice == ''){
            alert('Please enter a valid product price.');
        } else {
            valid++;
        }
        if(productDescription.length < 1){
            alert('Please enter a valid description.');
        } else {
            valid++;
        }
        if(productStock < 1){
            alert('Please enter valid value for the product\'s stock.');
        } else {
            valid++;
        }

    // grab values from form
    var firstName = document.forms['signup']['firstName'].value,
        lastName  = document.forms['signup']['lastName'].value,
        email     = document.forms['signup']['email'].value,
        password  = document.forms['signup']['password'].value,
        password2 = document.forms['signup']['password2'].value;

    var emailPat = /[a-zA-Z0-9_-]+@[a-zA-Z0-9-]+\.+([a-zA-Z]){2,4}\.?([a-zA-Z])?/;
    var namePat = /^\S*$/;     // only allow non-whitespace characters
    var passwordPat = /^\S*$/; // only allow non-whitespace characters

    const NUMBER_OF_CHECKS = 5; // number of checks performed below

    if(email.match(emailPat)){ // check if email is valid
        validity++;
    } else {
        alert('Please enter a valid email address.');
        return false;
    }

    if(firstName.match(namePat)){ // check if firstName is valid
        validity++;
    } else {
        alert('First name cannot contain whitespace characters.');
        return false;
    }

    if(lastName.match(namePat)){ // check if lastName is valid
        validity++;
    } else {
        alert('Last name cannot contain whitespace characters.');
        return false;
    }

    if(password.match(passwordPat)){ // check if password is valid
        validity++;
    } else {
        alert('Password cannot contain whitespace characters.');
        return false;
    }

    if (password === password2) { // check if passwords match
        validity++;
    } else {
        alert('Passwords do not match.')
        return false;
    }

    if(validity === NUMBER_OF_CHECKS) {
        return true;
    }
}

function validateLogin(){
    var validity = 0;
    var emailValue = document.forms['login']['email'].value,
        password = document.forms['login']['password'].value;
    var emailPat = /[a-zA-Z0-9_-]+@[a-zA-Z0-9-]+\.+([a-zA-Z]){2,4}\.?([a-zA-Z])?/;

    const NUMBER_OF_CHECKS = 1; // number of checks performed below

    if(emailValue.match(emailPat)){
        validity++;
    } else {
        alert('Please enter a valid email address.');
        return false;
    }

    if(validity === NUMBER_OF_CHECKS){
        window.location = 'main.php';
    }
}

window.onload = function() { // had to wrap scroll stuff in window.onload otherwise it wouldn't work

    window.onscroll = function() { // whenever window is scrolled
        // for sticky navbar
        stickyNav();
        // for scroll to top button
        scrollToTop();
    };

    // for sticky navbar
    var navbar = document.getElementById("nav");
    var sticky = navbar.offsetTop;

    function stickyNav() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }

    // for scroll to top button
    function scrollToTop() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $("#scrollButton").fadeIn();
        } else {
            $("#scrollButton").fadeOut();
        }
    }

}