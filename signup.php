<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";
?>

<!-- content if any -->
<div id='signupBanner'>
    
</div>

<div id='signupContainer' style='margin-top: 200px; height: 50%;'>
    <div id='signupForm' style='position: relative; display: block; margin: auto;'>
        <form class='form-signin' method='post' action='?signup' onsubmit='validateLogin();' id='signup'>
            <table style='margin: auto;'>
                <tr>
                    <td><input id='firstName' name='firstName' class='form-control' placeholder='First Name' required='true'></td>
                </tr>
                <tr>
                    <td><input id='email' name='email' class='form-control' placeholder='Email' required='true'></td>
                </tr>
                <tr>
                    <td><input  id='password' name ='password' class='form-control' placeholder='Password' type='password'  required=''><br></td>
                </tr>
                <tr>
                    <td style='text-align: center;'><input type='submit' class='btn btn-success' value='Sign Up'></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    include ('footer.php');
?>