<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";
?>

<!-- content if any -->
<div id='signupContainer' style='margin-top: 200px; height: auto;'>
    <div id='signupForm' style='position: relative; display: block; margin: auto;'>
        <form class='form-signin' method='post' action='?signup' onsubmit='validateLogin();' id='signup'>
            <table style='margin: auto;'>
                <tr>
                    <td><h2 style='text-align:center;'>Sign Up</h2><br></td>
                </tr>
                <tr>
                    <td><input id='firstName' name='firstName' class='form-control' placeholder='First Name' required></td>
                </tr>
                <tr>
                    <td><input id='lastName' name='lastName' class='form-control' placeholder='Last Name' required></td>
                </tr>
                <tr>
                    <td><input id='email' name='email' class='form-control' placeholder='Email' required></td>
                </tr>
                <tr>
                    <td><input  id='password' name ='password' class='form-control' placeholder='Password' type='password'  required><br></td>
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