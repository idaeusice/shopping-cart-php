<!-- can be callable or display the data directly on the page -->
<?php
    $sql;
    $result;
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
        $sql = 'select * from product;'; 
        $result = mysqli_query($dbc, $sql);
    }//end else (shows all products)

/* Carousel to be added using this formatting with re-sizing. 
    <div id="carouselContainer" style="position: relative; max-height: 400px;"> 
        <div id="newProductsCarousel" class="carousel slide" data-ride="carousel" style="position: relative; height: 400px">
        <div class="carousel-inner">
            $sql = 'select image from product order by prod_id desc limit 3;'; 
            $result = mysqli_query($dbc, $sql);
            while($row = mysqli_fetch_array($result)){
                echo '
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="' . $row['image'] . '" alt="Newest Products">
                </div>
                ';
            }
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
*/
    while($row = mysqli_fetch_array($result)){
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
                    </button>
                    </div>
                </div>
            </div>
        </div>";//ends the product div from main
    }
?>

