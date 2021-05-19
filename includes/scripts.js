var loggedIn = false;

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
    $('#loggedInText').html('Log Out');
}