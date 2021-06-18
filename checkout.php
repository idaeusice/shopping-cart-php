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

    echo '<div class="container" style="text-align: center; margin-top: 300px;"><h2>Successfully charged!</h2></div>';

    //queries to update tables based on purchase data.
    include ('connection.php');
    //update order history?

    //empty cart:
    $emptyCartSql = "DELETE FROM cart
                        WHERE cust_id = '".$_SESSION['cust_id'] . "';";
    mysqli_query($dbc, $emptyCartSql);

} else {
    echo '<div class="container" style="text-align: center; margin-top: 300px;"><h2>Payment was unsuccessful. Your payment may have already been processed. </h2></div>';
}

// write receipt data to file, store result
$wroteSuccessfully = writeReceiptData();

echo " 
<div class='container' style='margin-top: 220px; text-align:center;'>";

if ($wroteSuccessfully !== false)
    echo "<p>Successfully wrote receipt data to file.</p>";
else
    echo "<p>Failed to write receipt data to file.</p>";

echo "
</div>";

function writeReceiptData() { // function to write receipt data to text file

    date_default_timezone_set("America/Vancouver");

    // path to receipt folder
    $dirPath = "includes/receipts";

    // filename combination of cust_id and date/time
    $file = "CID" . $_SESSION['cust_id'] . "-" . date('Y-m-d-H-i-s') . ".txt";  

    // data to insert into file
    $data = "RECEIPT for " . $_POST['stripeEmail'] . " at daintree.com on " . date('Y-m-d \a\t H:i:s') . " (UTC-07:00)\n" . 
            "\n" .
            "\n" .
            "\n" .
            "\n" .
            "\n" .
            "Thank you for shopping at DainTree.\n";

    // full filname ex. receipts/CID4-2021-06-15-03-40-00.txt 
    // LOCK_EX puts lock on file so nothing else can edit while it is writing
    // file_put_contents returns bites written or false on failure
    return file_put_contents($dirPath . "/" . $file, $data, LOCK_EX);
}


?>

<div class='container' style='margin-top: 220px; text-align:center;'>
    <a href="main.php" class="no-underline">Continue shopping</a>
</div>

<?php
include ('footer.php');
?>