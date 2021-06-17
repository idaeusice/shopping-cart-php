<?php
include ('header.php');
include ('menu.php');

// STRIPE DETAILS
//    public key:
//    pk_test_51Ivr8VKB9Qa5a2djfRAXlWsGyWSJRWeYWvRkXGZo6Dp8gpLrTXuriHFrVlKQaTSg4LRzCxTrv621LNmlz6u88zPM00pz85Ht4u
//    private key:
//    sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI


function writeReceiptData() { // function to write receipt data to text file

    date_default_timezone_set("America/Vancouver");

    // path to receipt folder
    $dirPath = "includes/receipts";

    // filename combination of cust_id and date/time
    $file = "CID" . $_SESSION['cust_id'] . "-" . date('Y-m-d-H-i-s') . ".txt";  

    // data to insert into file
    $data = "RECEIPT for " . $_POST['email'] . " at daintree.com on " . date('Y-m-d \a\t H:i:s') . " (UTC-07:00)\n" . 
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

if(isset($_POST['name']) && isset($_POST['email']) && $_POST['cc1'] != '' && $_POST['cc2'] != '' && $_POST['cc3'] != '' && $_POST['cc4'] != ''){
    //successful payment details entry

    // write receipt data to file, store result
    $wroteSuccessfully = writeReceiptData();

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