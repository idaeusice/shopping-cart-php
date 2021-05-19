<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";
?>

<div id='loginContainer' style='margin-top: 200px; height: 50%;'>
    <div id='loginForm' style='position: relative; display: block; margin: auto;'>
        <form class='form' action='main.php'>
            <table style='margin: auto;'>
                <tr>
                    <td><label for='email'>Email Address: </label></td>
                    <td><input id='email'></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for='password'>Password: </label></td>
                    <td><input id='password'></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align: center;'><input type='submit' class='btn btn-success' value='Log In'></td>
                </tr>
                <tr>
                    <td colspan='2' style='font-size: 8pt; text-align: center;'><a href='signup.php' style='text-decoration: none;'>Don't have an account? Click to Sign up!<a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    include('footer.php');
?>
<!-- placeholder login -->