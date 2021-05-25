<div id='navbar' class='navbar navbar-dark'>
    <div id='navHome'><a href='main.php'>Home</a></div>
    <div id='categories'><a href='#'>Categories</a></div>
    <div id='navCart'><a href='cart.php'>My Cart</a></div>
    <div id='loggedInText'><a href='loginForm.php'>

        <?php 
            if(isset($_SESSION['username'])){
                echo 'Log Out';
            } else {
                echo 'Log In';
            }
        ?>
    
    </a></div>
</div>