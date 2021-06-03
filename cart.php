<?php
    print "<div id='header'>";
    include ('header.php');
    include ('menu.php');
    print "</div>";
?>

<div class='container' id='cart' style='margin-top:120px; text-align: center;'>

<?php
    include ('connection.php');

    if(isset($_SESSION['cust_id'])) { // if logged in (login.php)

      // sql query to get general info about indevidial items in the cart
      $sql = 'SELECT (p.price * c.quantity) AS total, image, name, description, price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

      $result = mysqli_query($dbc, $sql);

      // sql query to get the total price only, this needs to be a separate sql query or it doesn't reset after the first while loop
      $totalSql = 'SELECT (p.price * c.quantity) AS total, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

      $totalResult = mysqli_query($dbc, $totalSql);

      $totalPrice = 0.00; // Will store the total price of all items in the cart

      // loops through the results to increment totalPrice
      if(mysqli_num_rows($totalResult) > 0) {
        while($row = mysqli_fetch_array($totalResult)) { // while loop to increment totalPrice.
          $totalPrice += $row['total'];
        } // end of while rows remain
      } // end of if

      if(mysqli_num_rows($result) > 0) { // if there is more than 1 row
        while($row = mysqli_fetch_array($result)) { // loop through each row
          echo "
          <div class='row'>
            <div class='col-sm'> <!-- image -->
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

            <div class='col-sm border-right' style='margin:auto;'> <!-- name & price -->
                <h3>";
                    print $row['name'];
                echo "</h3><h6>";
                    print $row['quantity'] . " in cart at $" . $row['price'] . " each.";
                echo "</h6>
            </div>
          </div>";
          /* ========================================================== OLD CODE
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
          // =================================================== END OF OLD CODE */
        } // end of while rows remain
        echo "
        <div class='row'>
          <div class='col-sm'>
            <H4>Total:</H4>
          </div>
          <div class='col-sm border' style='float: right;'>
            <H4>$$totalPrice</H4>
          </div>
        </div>
        ";
      } // end of if
    } else { // if not logged in
      echo "<div id='emptyCart'>
            <h4>You are not logged in. Please log in to add items to your cart.</h4>
            <p>Start shopping <a href='main.php' style='text-decoration: none;'>here</a>
            </div><br><br><br>";
    }
?>

<?php
    include ('footer.php');
?>
