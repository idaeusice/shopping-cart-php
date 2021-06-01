<!-- can be callable or display the data directly on the page -->
<?php
    // set category to "All Items" by default
    $category = 'All Items';
    //categories when a post is made to products -- this will happen from the categories links.
    if($_SERVER['QUERY_STRING'] != ''){
        include ('connection.php');

        $category = str_replace('%20', ' ', $_SERVER['QUERY_STRING']);
        $sql = 'select * from products;';

        //if there's nothing to show -- creating a unique resultset so the $result variable is unaffected:
        $results = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            echo '
            <div class="container" style="text-align: center;">
                <img src="includes/resources/images/notfound.jpg" style="max-height: 400px;">
                <h6>There\'s nothing in this category, but check out some other products <a href="main.php"><span>here</span></a></h6>
            </div>
            ';
        }

        $prodSql = "select p.prod_id, p.image, p.name, p.price, p.units, p.description, p.archive, p.feature from product p join
        category c on p.catagory_id = c.catagory_id
        where c.name like '" . $category . "';";
        $prodResult = mysqli_query($dbc, $prodSql);

        // output current category
        echo "<p style='float: left'><span style='font-weight: bold'>Filter by category:</span> $category</p>";

        // if logged in show welcome message
        if (isset($_SESSION['first_name']))
            echo "<p style='float: right'><span style='font-weight: bold'>Welcome, </span>" . $_SESSION['first_name'] . "!</p>";
        
        while($row = mysqli_fetch_array($prodResult)){
            if($row['archive'] == 0 || $_SESSION['admin'] == 1) {
                echo "
                <div class='row border-bottom'>
                <div class='col-sm border-right'>
                    <div class='prodImage'>
                        <img class='image' src='";
                        if(is_null($row['image'])){
                            print 'includes\resources\images\noimgplaceholder.png';
                        } else {
                            print $row['image'];
                        };
                        echo "'>
                    </div>
                </div>

                <div class='col-sm border-right' style='margin:auto;'>
                    <h3>";
                        print $row['name'];
                    echo "</h3><h6>";
                        print $row['description'];
                    echo "</h6>
                </div>

                <div class='col-sm' style='margin:auto;'>
                    <div class='row container'>
                        <div class='col-sm'>
                            <h4>$";
                            print $row['price'] . '</h4><br><h6> Current Stock: ' . $row['units'] . '</h6>';
                            echo "
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='addToCart(" . $row['prod_id'] . ");'>
                                <strong>Add to Cart</strong><br>
                                <a class='material-icons' style='text-decoration: none; color: white; padding-top:5px;'>add_shopping_cart</a>
                            </button>";

                            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                echo "<button class='btn btn-danger' id='feature" . $row['prod_id'] . "' onclick='feature('feature" . $row['prod_id'] . "')'>Feature</button>";
                            }
                            echo"
                            </div>
                        </div>
                    </div>
                </div>";//ends the product div from main
            }
        }
    }//end if (shows only query string specified products)
else{
    include ('connection.php');
    echo '
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="height: 500px;">
            <div class="carousel-item active">
                <div id="carouselText">
                    <h1>New to Daintree</h1>
                    <p>This is also why we’re allowing players to rent their own servers and create
                    their own private worlds with their own rules. Another great update for MMO fans,
                    this time bringing mounted combat to Lord of the Rings Online.</p>
                </div>
                <img class="w-100" src="includes/resources/images/carousel1.jpg" alt="Main slide">
            </div>';
            $bgImageCount = 0;
            $carouselSql = 'select * from product';
            $carouselResults = mysqli_query($dbc, $carouselSql);
            while($row = mysqli_fetch_array($carouselResults)){
                $bgImageCount++;
                if($row['feature'] == 1){
                    echo '
                    <div class="carousel-item">
                        <div id="carouselText">
                            <h1>' . $row['name'] . '</h1>
                            <p> ' . $row['description'] . ' </p>
                            <img class="w-50" src="' . $row['image'] . '">
                        </div>
                        <img class="w-100" src="includes/resources/images/carousel2.jpg" alt="Product slide">
                    </div>';
                }
            }
        echo'
        </div>
        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';

        // output current category
        echo "<p style='float: left'><span style='font-weight: bold'>Filter by category:</span> $category</p>";

        // if logged in show welcome message
        if (isset($_SESSION['first_name']))
            echo "<p style='float: right'><span style='font-weight: bold'>Welcome, </span>" . $_SESSION['first_name'] . "!</p>";

        $allSql = "select * from product;";
        $allResult = mysqli_query($dbc, $allSql);

        while($row = mysqli_fetch_array($allResult)){
            if($row['archive'] == 0) {
                echo "
                <div class='row border-bottom'>
                <div class='col-sm border-right'>
                    <div class='prodImage'>
                        <img class='image' src='";
                        if(is_null($row['image'])){
                            print 'includes\resources\images\noimgplaceholder.png';
                        } else {
                            print $row['image'];
                        };
                        echo "'>
                    </div>
                </div>

                <div class='col-sm border-right' style='margin:auto;'>
                    <h3>";
                        print $row['name'];
                    echo "</h3><h6>";
                        print $row['description'];
                    echo "</h6>
                </div>

                <div class='col-sm' style='margin:auto;'>
                    <div class='row container'>
                        <div class='col-sm'>
                            <h4>$";
                            print $row['price'] . '</h4><br><h6> Current Stock: ' . $row['units'] . '</h6>';
                            echo "
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='addToCart(" . $row['prod_id'] . ");'>
                                <strong>Add to Cart</strong><br>
                                <a class='material-icons' style='text-decoration: none; color: white; padding-top:5px;'>add_shopping_cart</a>
                            </button>";

                            if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                echo "<button class='btn btn-danger' id='feature" . $row['prod_id'] . "' onclick='feature('feature" . $row['prod_id'] . "')'>Feature</button>";
                            }
                            echo"
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
}//end else (shows all products)
?>
