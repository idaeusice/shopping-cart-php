<div id='navbar' class='navbar navbar-dark'>
    <div id='navHome'><a href='main.php'>Home</a></div>
    <div id='categories'><a href='#' onclick='openCategories();'>Categories</a></div>
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
<div id='categoriesMenu' style='display: none;'>
    <div onclick="closeCategories();"><a href="?">All Items</a></div>
    <?php
        include ('connection.php');
        $sql = 'select name from category;'; 
        $result = mysqli_query($dbc, $sql);
    
        while($row = mysqli_fetch_array($result)){
            echo '<div onclick="closeCategories()"><a href="?';
            print $row['name'];
            echo '">';
            print $row['name'];
            echo '</a></div>';
        }
    ?>
</div>