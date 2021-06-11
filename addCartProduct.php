<?php
include ('connection.php');

if(!empty($_POST)) {
  //if(isset($_SESSION['cust_id'])) {
    // assign both id's to variables for tidyness
    $prodID = $_POST['prod_id'];
    $custID = $_POST['cust_id'];

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
  //} // end of isset
} // end of request method
?>
