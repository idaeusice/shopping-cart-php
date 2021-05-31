<!-- can be callable or display the data directly on the page -->
<?php
    $sql;
    $result;
    // set category to "All Items" by default
    $category = 'All Items';
    //categories when a post is made to products -- this will happen from the categories links. 
    if($_SERVER['QUERY_STRING'] != ''){
        include ('connection.php');

        $category = str_replace('%20', ' ', $_SERVER['QUERY_STRING']);

        $sql = "select p.prod_id, p.image, p.name, p.price, p.units, p.description from product p join
        category c on p.catagory_id = c.catagory_id
        where c.name like '" . $category . "';"; 
        $result = mysqli_query($dbc, $sql);

        //if there's nothing to show -- creating a unique resultset so the $result variable is unaffected:
        $checkResults = mysqli_query($dbc, $sql);
        if(!$checkrow = mysqli_fetch_array($checkResults)){
            echo '
            <div class="container" style="text-align: center;">
                <img src="includes/resources/images/notfound.jpg" style="max-height: 400px;">
                <h6>There\'s nothing in this category, but check out some other products <a href="main.php"><span>here</span></a></h6>
            </div>
            ';
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
                    <img class="w-100" src="includes/resources/images/electronics.jpg" alt="First slide">
                </div>';
                $bgImageCount = 0;
                $carouselSql = 'select image from product order by prod_id limit 2';
                $carouselResults = mysqli_query($dbc, $carouselSql);
                while($row = mysqli_fetch_array($carouselResults)){
                    $bgImageCount++;
                    /*
                    if($row['featured'] == 1){
                        show featured sections.
                    }
                    */
                    echo '        
                    <div class="carousel-item">
                        <div id="carouselText">
                            <h1>Featured</h1>
                            <p>The last beta weekend event is gone and, as mentioned above, 
                            we still need to wait for one more month. DDO solved the problem by making casters 
                            ludicrously more powerful than melee, and seemingly giving every boss a massive unavoidable 
                            AoE knockdown in order to punish anyone daring to get into melee range. </p>
                        </div>
                        <img class="w-100" src="includes/resources/images/electronics.jpg" alt="First slide">
                    </div>';
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
        </div>
        ';

        $prodSql = 'select * from product;'; 
        $prodResult = mysqli_query($dbc, $prodSql);

    }//end else (shows all products)

    // output current category
    echo "<p><span style='font-weight: bold'>Filter by category:</span> $category</p>";
    
    while($row = mysqli_fetch_array($prodResult)){
        echo "
        <div class='row border-bottom'>
        <div class='col-sm border-right'>
            <div class='prodImage'>
                <img class='img-fluid img-thumbnail' src='";
                if(is_null($row['image'])){
                    print 'includes\resources\images\sample.jpg';
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
?>

