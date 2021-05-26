<div id='navbar' class='navbar navbar-dark'>
    <div id='navHome'><a href='main.php'>Home</a></div>
    <div id='categories'><a href='#' onclick='toggleCategories();'>Categories</a></div>
    <?php
    //show cart when logged in as user, add product when logged in as admin
    if(isset($_SESSION['admin']) == 1){
        echo "<div id='navCart'><a href='addProduct.php'>Add Product</a></div>";
    } else {
        echo "<div id='navCart'><a href='cart.php'>My Cart</a></div>";

    }

    ?>
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
    <a href="main.php"><div>All Items</div></a>
    <?php
        include ('connection.php');
        $sql = 'select name from category;'; 
        $result = mysqli_query($dbc, $sql);
    
        while($row = mysqli_fetch_array($result)){
            echo '<a href="main.php?';
            print $row['name'];
            echo '"><div>';
            print $row['name'];
            echo '</div></a>';
        }
    ?>
</div>