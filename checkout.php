<?php
include ('header.php');
include ('menu.php');

// STRIPE DETAILS
//    public key:
//    pk_test_51Ivr8VKB9Qa5a2djfRAXlWsGyWSJRWeYWvRkXGZo6Dp8gpLrTXuriHFrVlKQaTSg4LRzCxTrv621LNmlz6u88zPM00pz85Ht4u
//    private key:
//    sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI

if(isset($_POST['stripeToken'])){
    require_once('./config.php');

    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];
    $amount = $_POST['amt'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount'   => $amount,
        'currency' => 'usd',
    ]);

    echo '<div class="container" style="text-align: center; margin-top: 100px;"><h2>Successfully charged!</h2></div>';

    //queries to update tables based on purchase data.
    include ('connection.php');
    //update order history?

    // write receipt data to file, store result
    $wroteSuccessfully = writeReceiptData();

    // update order history
    updateOrderHistory();

    //empty cart:
    $emptyCartSql = "DELETE FROM cart
                        WHERE cust_id = '".$_SESSION['cust_id'] . "';";
    mysqli_query($dbc, $emptyCartSql);

} else {
    echo '<div  style="text-align: center; margin-top: 100px;"><h2>Payment was unsuccessful. Your payment may have already been processed. </h2></div>';
}


echo " 
<div class='' style='text-align:center;'>";

if (isset($wroteSuccessfully) && $wroteSuccessfully !== false) //                   \/ open in new tab                                              \/ force download it (instead of opening it by default)  
    echo "<p>Successfully wrote receipt data to file. <a href='$wroteSuccessfully' target='_blank'>View file</a> or <a href='$wroteSuccessfully' download>download it</a>.</p>"; // put name of file returned as href for download URL
else
    echo "<p>Failed to write receipt data to file.</p>";

echo "
</div>";

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
    $data = "Hello " . $_SESSION['first_name'] . ",\n" .
            "This is your RECEIPT from daintree.com. email: " . $_SESSION['email'] . " date: " . date('Y-m-d \a\t H:i:s') . " (UTC-07:00)\n" . 
            "\n" .
            "You ordered:\n" .
            "\n";

    // loop through items
    while ($row = mysqli_fetch_array($result)) {
        $data .= $row['name'] . ": $" . $row['price'] . " x " . $row['quantity'] . "\n";
    }

    $data .= "----------------------------------------------------\nTotal: $" . sprintf("%0.2f", $totalPrice) . "\n\nThank you for shopping at DainTree.";

    // full filname ex. receipts/CID4-2021-06-15-03-40-00.txt 
    // LOCK_EX puts lock on file so nothing else can edit while it is writing
    // file_put_contents returns bites written or false on failure
    if (file_put_contents($dirPath . "/" . $file, $data, LOCK_EX) !== false) { // if wrote successfully (doesn't return false) then return file path/name
        return $dirPath . "/" . $file;
    } else { // otherwise return false
        return false;
    }
}

function updateOrderHistory() {

    include ('connection.php');

    /*** START order history ***/
    // insert customer ID and date into order history table
    $orderHistorySQL = "INSERT INTO order_history (cust_id, date) 
                        VALUES (" . $_SESSION['cust_id'] . ", '" . date("Y-m-d") . "');";

    mysqli_query($dbc, $orderHistorySQL);
    /*** END order history ***/

    /*** START order detail ***/
    // get all info on products in cart
    $itemSQL = 'SELECT (p.price * c.quantity) AS total, p.prod_id, p.image, p.name, p.description, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

    $itemResult = mysqli_query($dbc, $itemSQL);

    // get last order ID number
    $getLastOrderIDSQL = "SELECT order_id FROM order_history ORDER BY order_id DESC LIMIT 1;";
    $lastIDResult = mysqli_query($dbc, $getLastOrderIDSQL);
    $orderID = mysqli_fetch_array($lastIDResult);
    $orderIDRow = $orderID['order_id'];

    // while there are items in cart insert each one into the order detail table
    while ($row = mysqli_fetch_array($itemResult)) {
        $orderDetailSQL = "INSERT INTO order_detail (order_id, prod_id, amount, price) VALUES ($orderIDRow, " . $row['prod_id'] . ", " . $row['quantity'] . ", " . $row['price'] . ");";
        mysqli_query($dbc, $orderDetailSQL);
    }
    /*** END order detail ***/
}

?>

<div style='text-align:center; margin-bottom: 100px;'>
    <a href="main.php" class="no-underline">Continue shopping</a>
</div>

<?php
include ('footer.php');
?>