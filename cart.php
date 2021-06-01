<?php
    print "<div id='header'>";
    include ('header.php');
    include ('menu.php');
    print "</div>";
?>

<div class='container' id='cart' style='margin-top:120px; text-align: center;'>

<?php
    include ('connection.php');

    if(isset($_SESSION['cust_id'])){ // if logged in (login.php)
      $sql = 'select p.price * c.quantity, image, name, description, price, c.quantity from cart c join product p
              on c.prod_id=p.prod_id
              where cust_id=' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

      $result = mysqli_query($dbc, $sql);

      if(mysqli_num_rows($result) > 0) { // if there is more than 1 row
        while($row = mysqli_fetch_array($result)){ // loop through each row
          echo "
          <div class='row border-bottom'>
            <div class='col-sm border-right'>
                <div class='prodImage'>
                    <img class='img-fluid img-thumbnail' src='";
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
          </div>";
          /*
            echo "<div class='cartRow border-bottom'>
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
                <div class='col-sm border-right' style='margin:auto;'>
                    <div class='row container'>
                        <div class='col-sm'>
                            <h4>$";
                        print $row['price'] . '</h4><br><h6> Available: ' . $row['quantity'] . '</h6>';
                echo "
                        </div>
                    </div>
                </div>
                <div class='col-sm' style='margin:auto;'>
                    <h6>Remove</h6>
                </div>
                </div>";
          */
        } // end of while rows remain
      } // end of if
    } else { // if not logged in
      echo "<div id='emptyCart'>
            <h4>You are not logged in. Please log in to add items to your cart.</h4>
            <p>Start shopping <a href='main.php' style='text-decoration: none;'>here</a>
            </div><br><br><br>";
    }
?>

<a href='#' onclick='back()'>Back</a>
</div>

<?php
    include ('footer.php');
?>
