<!-- can be callable or display the data directly on the page -->
<?php
    $sql;
    $result;
    //categories when a post is made to products -- this will happen from the categories links. 
    if($_SERVER['QUERY_STRING'] != ''){
        include ('connection.php');
        $sql = "select p.image, p.name, p.price, p.units, p.description from product p join
        category c on p.catagory_id = c.catagory_id
        where c.name like '" . $_SERVER['QUERY_STRING'] . "';"; 
        $result = mysqli_query($dbc, $sql);
    }//end if (shows only query string specified products)
    else{
        include ('connection.php');
    }//end else (shows all products)
?>

<!-- Carousel to be added using this formatting with re-sizing. 
    <div id="carouselContainer" style="position: relative; max-height: 400px;"> 
        <div id="newProductsCarousel" class="carousel slide" data-ride="carousel" style="position: relative; height: 400px">
        <div class="carousel-inner">
            <?php
            /*
            $sql = 'select image from product limit 3;'; 
            $result = mysqli_query($dbc, $sql);
            while($row = mysqli_fetch_array($result)){
                echo '
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="' . $row['image'] . '" alt="Newest Products">
                </div>
                ';
            }
            */
            ?>
        </div>

        <a class="carousel-control-prev" href="#newProductsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#newProductsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
-->
    <?php
    $sql = 'select * from product;'; 
    $result = mysqli_query($dbc, $sql);
    while($row = mysqli_fetch_array($result)){
        echo "<div class='row border-bottom'>
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
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='addToCart();'>
                        <strong>Add to Cart</strong><br>
                        <a class='material-icons' style='text-decoration: none; color: white; padding-top:5px;'>add_shopping_cart</a>
                    </button>
                    </div>
                </div>
            </div>
        </div>";
    }
?>

