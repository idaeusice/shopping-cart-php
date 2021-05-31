<?php
print "<div id='header'>";
    include ('header.php');//title
    include ('menu.php');
print "</div>";
  
// if submitted with POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect values of input fields -- email and password then verify and set session to logged in (use cust_id and admin)
    include ('connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * 
            FROM customer 
            WHERE email = '$email' AND 
                  password = '$password'";


    $result = mysqli_query($dbc, $sql);

    // fetch first row
    $row = mysqli_fetch_array($result);

    // if SQL returns a match set session variables (user is logged in)
    if (is_array($row)) {
        $_SESSION['cust_id'] = $row['cust_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['admin'] = $row['admin'];

        header("Location: main.php");
    } else {
        echo "<script>alert('incorrect login credentials')</script>";
    }
}
?>

<!-- include in a modal? --> 
<div id='loginContainer'>
    <!-- verify whether there is content -->
    <form class='form-signin' method='post' action='login.php' onsubmit='return validateLogin();' id='login'>
        <table style='margin: auto;'>
            <tr>
                <td><h2 style='text-align:center;'>Sign In</h2><br></td>
            </tr>
            <tr>
                <td><input id='email' name='email' class='form-control' placeholder='Email' required></td>
            </tr>
            <tr>
                <td><input  id='password' name ='password' class='form-control' placeholder='Password' type='password'  required><br></td>
            </tr>
            <tr>
                <td style='text-align: center;'><input type='submit' name='submit' class='btn btn-primary btn-block' value='Log In'></td>
            </tr>
            <tr>
                <td style='font-size: 8pt; text-align: center;'><a href='signup.php' style='text-decoration: none;'>Don't have an account? Click to Sign up!<a></td>
            </tr>
        </table>
    </form>
</div>

<?php 
    include('footer.php');
?>
<!-- placeholder login -->