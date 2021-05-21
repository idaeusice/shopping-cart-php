<!-- can be callable or display the data directly on the page -->
<?php
    include ('connection.php');
    $sql = 'select * from product;'; 
    $result = mysqli_query($dbc, $sql);

    while($row = mysqli_fetch_array($result)){
        echo "<div class='row border-bottom'>
        <div class='col-sm border-right'>
            <div class='prodImage'>
                <img class='img-fluid img-thumbnail'";
        //print $row['image']; -- place this in the row below:
        echo " src='./includes/resources/images/sample.jpg'>
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
                    <h3>";
                print $row['units'] . ' @ $' . $row['price'];
        echo "</h3>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
                    Add to Cart
                </button>
                    </div>
                </div>
            </div>
        </div>";
    }
?>