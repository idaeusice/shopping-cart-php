<?php
include ('header.php');
include ('menu.php');

// STRIPE DETAILS
//    public key:
//    pk_test_51Ivr8VKB9Qa5a2djfRAXlWsGyWSJRWeYWvRkXGZo6Dp8gpLrTXuriHFrVlKQaTSg4LRzCxTrv621LNmlz6u88zPM00pz85Ht4u
//    private key:
//    sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI


function writeReceiptData() { // function to write receipt data to text file

    include ('connection.php');

    // set timezone for date() function
    date_default_timezone_set("America/Vancouver");

    // SQL for getting all items in cart
    $itemSQL = 'SELECT (p.price * c.quantity) AS total, p.prod_id, p.image, p.name, p.description, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

    $result = mysqli_query($dbc, $itemSQL);

    // SQL for getting total price
    $totalSql = 'SELECT (p.price * c.quantity) AS total, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

    $totalResult = mysqli_query($dbc, $totalSql);

    $totalPrice = 0.00;

    // loops through the results to increment totalPrice
    if(mysqli_num_rows($totalResult) > 0) {
        while($row = mysqli_fetch_array($totalResult)) {
            $totalPrice += $row['total'];
        } 
    }

    // path to receipt folder
    $dirPath = "includes/receipts";

    // filename combination of cust_id and date/time
    $file = "CID" . $_SESSION['cust_id'] . "-" . date('Y-m-d-H-i-s') . ".txt";  

    // data to insert into file
    $data = "Hello " . $_POST['name'] . ",\n" .
            "This is your RECEIPT from daintree.com. email: " . $_POST['email'] . " date: " . date('Y-m-d \a\t H:i:s') . " (UTC-07:00)\n" . 
            "\n" .
            "You ordered:\n" .
            "\n";

    // loop through items
    while ($row = mysqli_fetch_array($result)) {
        $data .= $row['name'] . ": $" . $row['price'] . " x " . $row['quantity'] . "\n";
    }

    $data .= "----------------------------------------------------\nTotal: $" . sprintf("%0.2f", $totalPrice) . "\n\nThank you for shopping at DainTree.\n";

    // full filname ex. receipts/CID4-2021-06-15-03-40-00.txt 
    // LOCK_EX puts lock on file so nothing else can edit while it is writing
    // file_put_contents returns bites written or false on failure
    return file_put_contents($dirPath . "/" . $file, $data, LOCK_EX);
}

if(isset($_POST['name']) && isset($_POST['email']) && $_POST['cc1'] != '' && $_POST['cc2'] != '' && $_POST['cc3'] != '' && $_POST['cc4'] != ''){
    //successful payment details entry

    /*** START write receipt ***/
    $wroteSuccessfully = writeReceiptData();
    /*** END write receipt ***/

    echo " 
    <div class='container' style='margin-top: 220px; text-align:center;'>";

    echo "
        <p>Card is: " . $_POST['cc1'] . $_POST['cc2'] . $_POST['cc3'] . $_POST['cc4'] . "</p>";
    
    if ($wroteSuccessfully !== false)
        echo "<p>Successfully wrote receipt data to file.</p>";
    else
        echo "<p>Failed to write receipt data to file.</p>";

    echo "
    </div>";

    /*** START save order history ***/

    // work in progress

    /*** END save order history ***/

    /*** START empty cart ***/
    $updateCartSql = "DELETE FROM cart
                      WHERE cust_id = '" . $_SESSION['cust_id'] . "';";

    //mysqli_query($dbc, $updateCartSql);
    /*** END empty cart ***/

} else {
    //payment details failure
    echo" 
    <div class='container' style='margin-top: 220px; text-align:center;'>
        <p>There was an error processing your payment. </p>
        <p>Your card was not charged.</p>
    </div>
    ";
}

?>

<div class='container' style='margin-top: 220px; text-align:center;'>
    <a href="main.php" class="no-underline">Continue shopping</a>
</div>

<?php
include ('footer.php');
?>