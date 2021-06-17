<?php
  print "<div id='header'>";
  include ('header.php');
  include ('menu.php');
  print "</div>";

  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {  // if logged in as a customer
    echo '<div class="top-margin container">';
      // get the order history from the database for the customer
      $orderHistory = "SELECT order_id, cust_id, date_format(date, '%M %D, %Y') AS order_date
                       FROM order_history
                       WHERE cust_id = " . $_SESSION['cust_id'] . ";";
      
      $orderResults = mysqli_query($dbc, $orderHistory);

      while($orderRow = mysqli_fetch_array($orderResults)) { // loop through order_id for the customer

        echo "<H4 style='color: #003366;'>Order ID: " . $orderRow['order_id'] . " Date: " . $orderRow['order_date'] . "</H4>";

        // get the deails for that row
        $orderDetail = 'SELECT name, image, o.price, amount, (o.price * amount) AS "total"
                        FROM order_detail o INNER JOIN product USING (prod_id)
                        WHERE order_id = ' . $orderRow['order_id'] . '
                        GROUP BY prod_id;';
      
        $detailResults = mysqli_query($dbc, $orderDetail);

        while($detailRow = mysqli_fetch_array($detailResults)) { // loop through each item in a specific order_id
          // Print the image for each product
          echo "<div class='row'>
                  <div class='col-sm'> <!-- image -->
                    <div class='prodImage'>
                      <img class='image' src='";
                        if(is_null($detailRow['image'])){
                          print 'includes\resources\images\noimgplaceholder.png';
                        } else {
                          print $detailRow['image'];
                        };
                      echo "'>
                    </div>
                  </div>
                  <div class='col-sm'>
                    <H4 style='margin-top: 15%;'>";
                      echo "<span style='color: green;'>" . $detailRow['amount'] . "</span> " .
                           $detailRow['name'] . "
                    </H4>
                  </div>";
                  echo "
                  <div class='col-sm'>
                    <H4 style='margin-top: 15%; color: green;'>
                      $" . $detailRow['total'] . "
                    </H4>
                  </div>
                </div>";
        }
      } // end of orderHistory while loop

    echo '</div>';
  } else { // not logged in
    echo '
      <div class="top-margin container">You must be logged in to view order history</div>
    ';
  } // end not logged in

  include ('footer.php');
?>
