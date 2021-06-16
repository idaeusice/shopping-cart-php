<?php
    include ('header.php');//title
    include ('menu.php');
?>

<div class='main'>
    <div class='box'>
        <?php 
        if (isset($_SESSION['cust_id']) && isset($_SESSION['admin']) && !($_SESSION['admin'] == 1)) {

            // path to receipt folder
            $dirPath = "receipts";

            // filename combination of cust_id and date/time
            $file = "CID" . $_SESSION['cust_id'] . "-" . date('Y-m-d-H-i-s') . ".txt";  

            // data to insert into file
            $data = "RECEIPT for DAINTREE on " . date('Y-m-d-H-i-s') . "\n\nYou bought x items:\nitem1\nitem2\n\nTOTAL: \$xxx.xx\n\nThank you for shopping at DainTree.";

            // full filname ex. receipts/CID4-2021-06-15-03-40-00.txt 
            // LOCK_EX puts lock on file so nothing else can edit while it is writing
            // file_put_contents returns bites written or false on failure
            $result = file_put_contents($dirPath . "/" . $file, $data, LOCK_EX);

            if ($result !== false) {
                echo "Success!";
            } else {
                echo "Fail";
            }

        } else {
            header('Location: main.php');
        }
        ?>
    </div>
</div>

<?php include ('footer.php'); ?>


