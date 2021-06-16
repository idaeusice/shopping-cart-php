<?php
  print "<div id='header'>";
  include ('header.php');
  include ('menu.php');
  print "</div>";

  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {  // if logged in as a customer
    echo '<div class="top-margin container">';
      // get the order history from the database for the customer
      $orderHistory = 'SELECT * 
                       FROM order_history
                       WHERE cust_id = ' . $_SESSION['cust_id'] . ';';
      
      $orderResults = mysqli_query($dbc, $orderHistory);

      while($orderRow = mysqli_fetch_array($orderResults)) { // loop through hystory

        echo '<H2>' . $orderRow['order_id'] . '</H2>';

        // get the deails for that row
        $orderDetail = 'SELECT * 
                        FROM order_detail
                        WHERE order_id = ' . $orderRow['order_id'] . ';';
      
        $detailResults = mysqli_query($dbc, $orderDetail);

        while($detailRow = mysqli_fetch_array($detailResults)) {
          echo '<div>test</div>';
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
