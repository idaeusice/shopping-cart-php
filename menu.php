<div id='navbar' class='navbar navbar-dark'>
    <div id='navHome'><a href='main.php'><span class='material-icons'>home</span>Home</a></div>
    <a><div id='categories' onclick='toggleCategories();' style='cursor: pointer;'>Categories</div></a>
    <?php
        //show cart when logged in as user, add product when logged in as admin
        if(isset($_SESSION['admin']) == 1){
            echo "<div id='navCart'><a href='addProduct.php'>Add Product</a></div>";
        } else {
            echo "<div id='navCart'><a href='cart.php'><span class='material-icons'>add_shopping_cart</span>My Cart</a></div>";
        }
    ?>
    <div id='loggedInText'>
    <?php 
        if(isset($_SESSION['email'])){
            echo "<a href='logout.php'><span class='material-icons'>logout</span>Log Out</a>";
        } else {
            echo "<a href='login.php'><span class='material-icons'>login</span>Log In</a>";
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