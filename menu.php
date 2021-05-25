<div id='navbar' class='navbar navbar-dark'>
    <div id='navHome'><a href='main.php'>Home</a></div>
    <div id='categories'><a href='#'>Categories</a></div>
    <div id='navCart'><a href='cart.php'>My Cart</a></div>
    <div id='loggedInText'>

        <?php 
            if(isset($_SESSION['email'])){
                echo "<a href='logout.php'>Log Out</a>";
            } else {
                echo "<a href='login.php'>Log In</a>";
            }
        ?>
    
    </div>
</div>