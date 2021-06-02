<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
    }

?>

<!-- content if any -->
<div id='signupContainer'>
    <div id='signupForm' style='position: relative; display: block; margin: auto;'>
        <form class='form-signin' method='post' action='signup.php' onsubmit='validateLogin();' id='signup'>
            <table style='margin: auto;'>
                <tr>
                    <td><h2 style='text-align:center;'>Sign Up</h2><br></td>
                </tr>
                <tr>
                    <td><input id='firstName' name='firstName' class='form-control' placeholder='First Name' maxlength='45' required></td>
                </tr>
                <tr>
                    <td><input id='lastName' name='lastName' class='form-control' placeholder='Last Name' maxlength='45' required></td>
                </tr>
                <tr>
                    <td><input id='email' name='email' class='form-control' placeholder='Email' type='email' maxlength='45' required></td>
                </tr>
                <tr>
                    <td><input  id='password' name ='password' class='form-control' placeholder='Password' type='password' minlength='8' maxlength='45' required></td>
                </tr>
                <tr>
                    <td><input  id='password2' name ='password2' class='form-control' placeholder='Password again' type='password' minlength='8' maxlength='45' required><br></td>
                </tr>
                <tr>
                    <td><input type='submit' name='submit' class='btn btn-primary btn-block' value='Sign Up'></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    include ('footer.php');
?>