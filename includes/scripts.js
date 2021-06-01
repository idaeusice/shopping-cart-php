
    function toggleCategories(){
        $('#categoriesMenu').slideToggle();
    }

    function back(){
        window.history.back();
    }

    // function addToCart(){
    //     if()
    // }

    function addProduct(){
        //category is not checked, because it will always be included.
        var valid = 0,
            productName = document.forms['addProduct']['productName'].value,
            productPrice = document.forms['addProduct']['productPrice'].value,
            productDescription = document.forms['addProduct']['productDescription'].value,
            productStock = document.forms['addProduct']['productStock'].value;

        if(productName.length < 1){
            alert('');
        } else {
            valid++;
        }
        if(productPrice == ''){
            alert('');
        } else {
            valid++;
        }
        if(productDescription.length < 1){
            alert('');
        } else {
            valid++;
        }
        if(productStock < 1){
            alert('');
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
        var passwordPat = /.{8,}/;

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

window.onload = function() { // had to wrap scroll stuff in window.onload otherwise it wouldn't work

    window.onscroll = function() {
        // for sticky navbar
        stickyNav(); 
        // for scroll to top button
        scrollToTop();
    };
    
    // for sticky navbar
    var navbar = document.getElementById("navbar");
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