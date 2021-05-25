<!-- can be callable or display the data directly on the page -->
<?php
    include ('connection.php');
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
        echo"</h3>
        </div>
        <div class='col-sm' style='margin:auto;'>
            <div class='row container'>
                <div class='col-sm'>
                    <h4>$";
                print $row['price'] . '</h4><br><h6> Available: ' . $row['units'] . '</h6>';
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