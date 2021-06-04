<?php
// THIS FILE IS UNUSED CURRENTLY, I couldn't get it to work
include ('connection.php');

if(!empty($_POST)) {
  //if(isset($_SESSION['cust_id'])) {
    // assign both id's to variables for tidyness
    $prodID = $_POST['prod_id'];
    $custID = $_POST['cust_id'];

    // check the cart to see if the product is already present
    $checkCart = "SELECT prod_id, c.cust_id, p.price
                  FROM cart c INNER JOIN product p USING (prod_id)
                  WHERE cust_id = '$custID' ;";

    $checkResults = mysqli_query($dbc, $checkCart);
    // put the result row into an array
    $row = mysqli_fetch_array($checkResults);

    // if the item isn't present, add it to the database with a quantity of one
    if(mysqli_num_rows($checkResults) == 0) {
      $prodPrice = $row['price'];
      $insertCart = "INSERT INTO cart (prod_id, cust_id, quantity, price)
                     VALUES ('$prodID', '$custID', 1, '$prodPrice');";

      mysqli_query($dbc, $insertCart);
    } else { // else increase its amount by one
      $updateCart = "UPDATE cart
                        SET quantity = quantity + 1
                        WHERE prod_id = '$prodID';";

      mysqli_query($dbc, $updateCart);
    }
  //} // end of isset
} // end of request method
?>
