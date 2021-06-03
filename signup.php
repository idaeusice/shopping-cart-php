<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";

    $errors = array(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include ('connection.php');

        // collect value of input fields
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // check the database to make sure a user does not already exist with the same email
        $user_check_query = "SELECT * FROM customer WHERE email='$email'";
        $result = mysqli_query($dbc, $user_check_query);
        $user = mysqli_fetch_array($result);
        
        if ($user) { // if user email exists
            array_push($errors, "Email already exists, please try again."); // add error onto error array
        }

        // register user if there are no errors
        if (count($errors) == 0) {

            // encrypt password before saving to DB
            $password = password_hash($password, PASSWORD_DEFAULT); 

            // insert new user into DB, by default admin is off (0)
            $query = "INSERT INTO customer (email, first_name, last_name, password, admin) 
                      VALUES('$email', '$firstName', '$lastName', '$password', 0)";

            // run query
            mysqli_query($dbc, $query);
            
            // get customer ID from DB
            $getCustID = "SELECT * FROM customer WHERE email='$email'";
            $getCustIDResult = mysqli_query($dbc, $getCustID);
            $getCustIDRow = mysqli_fetch_array($getCustIDResult);

            // login the new user/set session variables
            $_SESSION['cust_id'] = $getCustIDRow['cust_id'];
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
            $_SESSION['admin'] = 0;

            header('Location: main.php');
        }    
    }

?>

<!-- content if any -->
<div id='signupContainer'>
    <div id='signupForm' style='position: relative; display: block; margin: auto;'>
        <form class='form-signin' method='post' action='signup.php' onsubmit='return validateSignup();' id='signup'>
            <table style='margin: auto;'>
                <tr>
                    <td><h2 style='text-align:center;'>Sign Up</h2><br></td>
                </tr>
                <tr>
                    <td><input id='firstName' name='firstName' class='form-control' placeholder='First Name' maxlength='45' value='<?php if (isset($firstName)) echo $firstName ?>' required></td>
                </tr>
                <tr>
                    <td><input id='lastName' name='lastName' class='form-control' placeholder='Last Name' maxlength='45' value='<?php if (isset($lastName)) echo $firstName ?>' required></td>
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
                <tr>
                    <td>
                        <?php  if (count($errors) > 0) : ?> <!-- display any errors in JS alert -->
                        <div class="error">
                            <?php foreach ($errors as $error) : ?>
                            <script>alert('<?php echo $error ?>')</script> 
                            <?php endforeach ?>
                        </div>
                        <?php  endif ?>
                    </td>
                </tr>
            </table>

            
        </form>
    </div>
</div>
<?php
    include ('footer.php');
?>