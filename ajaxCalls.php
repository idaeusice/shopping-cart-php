<?php
include ('connection.php');

if(!empty($_POST)) {
  $prodID = $_POST['prod_id']; // assign product id to variable for tidyness
  
  if($_POST['type'] == "addItem") {
    $custID = $_POST['cust_id']; // assign customer id to variable for tidyness

    // check the cart to see if the product is already present
    $checkCart = "SELECT prod_id, cust_id, quantity
                  FROM cart c
                  WHERE cust_id = '$custID'
                  AND prod_id = '$prodID';
                  ";

    $checkResults = mysqli_query($dbc, $checkCart);
    // put the result row into an array
    $row = mysqli_fetch_array($checkResults);

    // if the item isn't present, add it to the database with a quantity of one
    if(mysqli_num_rows($checkResults) == 1) {
      $updateCart = "UPDATE cart
                     SET quantity = quantity + 1
                     WHERE prod_id = '$prodID';";

      mysqli_query($dbc, $updateCart);
    } else { // else increase its amount by one
      $insertCart = "INSERT INTO cart (prod_id, cust_id, quantity)
                     VALUES ('$prodID', '$custID', 1)";

      mysqli_query($dbc, $insertCart);
    }
    // end of addItem
  } elseif ($_POST['type'] == "toggleArchive") { 
    // get the status of the item to see if it's archived or not
    $toggleArchive = "SELECT prod_id, archive 
                      FROM product
                      WHERE prod_id = '$prodID';
                      ";
    
    $archiveResults = mysqli_query($dbc, $toggleArchive);
    // put the result row into an array
    $row = mysqli_fetch_array($archiveResults);

    if($row['archive'] == 0) { // if not archived, then make it archived
      $toggleArchiveStatus = "UPDATE product
                              SET archive = 1
                              WHERE prod_id = '$prodID';
                              ";

      mysqli_query($dbc, $toggleArchiveStatus);
    } elseif($row['archive'] == 1) { // id not archived, then re-instate it
      $toggleArchiveStatus = "UPDATE product
                              SET archive = 0
                              WHERE prod_id = '$prodID';
                              ";

      mysqli_query($dbc, $toggleArchiveStatus);
    }
  } // end of toggle archive
} // end of request method
?>
