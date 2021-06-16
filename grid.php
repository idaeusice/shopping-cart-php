<?php
    include ('header.php');//title
    include ('menu.php');
?>

<div id='main'>

    <div id='products'>
        <?php
            include ('connection.php');

            // if logged in show welcome message
            if (isset($_SESSION['first_name']))
                echo "<p style='float: right'><span style='font-weight: bold'>Welcome, </span>" . $_SESSION['first_name'] . "!</p>";

            $allSql = "select * from product;";
            $allResult = mysqli_query($dbc, $allSql);

            echo "<div class='card-columns'>";
            while($row = mysqli_fetch_array($allResult)){
                if($row['archive'] == 0) {
                    echo "<div class='card' style='width: 100%;'>
                            <img class='card-img-top' src='" . $row['image'] . "' >
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row['name'] . "</h5>
                                <p class='card-text'>" . $row['description'] . "</p>
                                <strong> $" . $row['price'] . "</strong>";
                                if(isset($_SESSION['admin']) && !$_SESSION['admin'] == 1) {
                                    echo "
                                    <form method='post' id='" . $row['prod_id'] . "' action=''>
                                      <button type='submit' class='btn btn-primary addItemButton' data-toggle='modal' data-target='#exampleModal'>
                                          <strong>Add to Cart</strong><br>
                                          <a class='material-icons' style='text-decoration: none; color: white; padding-top:5px;'>add_shopping_cart</a>
                                          <input id='prodID" . $row['prod_id'] . "' type='hidden' name='idOfProd' value='" . $row['prod_id'] . "'/>
                                          <input id='custID" . $row['prod_id'] . "' type='hidden' name='idOfCust' value='" . $_SESSION['cust_id'] . "'/>
                                      </button>
                                    </form>
                                    <div class='result'></div>";
                                  }
      
                                  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                      echo "<button class='btn btn-danger' id='feature" . $row['prod_id'] . "' onclick='feature('feature" . $row['prod_id'] . "')'>Feature</button>";
                                  }
                    echo    "</div>
                        </div>";
                }
            }
            echo "</div>";
        ?>
        <script src="includes/addItem.js"></script>
    </div>
</div>

<?php
    include ('footer.php');
?>