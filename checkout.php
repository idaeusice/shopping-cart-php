<?php
include ('header.php');
include ('menu.php');

// STRIPE DETAILS
//    public key:
//    pk_test_51Ivr8VKB9Qa5a2djfRAXlWsGyWSJRWeYWvRkXGZo6Dp8gpLrTXuriHFrVlKQaTSg4LRzCxTrv621LNmlz6u88zPM00pz85Ht4u
//    private key:
//    sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI

if($_POST['name'] && $_POST['email'] && $_POST['cc1'] != '' && $_POST['cc2'] != '' && $_POST['cc3'] != '' && $_POST['cc4'] != ''){
    //successful payment details entry
    echo" 
    <div class='container' style='margin-top: 220px; text-align:center;'>
        <p>Card is: " . $_POST['cc1'] . $_POST['cc2'] . $_POST['cc3'] . $_POST['cc4'] . "</p>
    </div>
    ";
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