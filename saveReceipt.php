<?php

include ('header.php');//title
include ('menu.php');

// path to receipt folder
$dirPath = "receipts";

// filename combination of cust_id and date/time
$file = "$dirPath/C001-" . date('Y-m-d-H-i-s');  

// data to insert  into file
$data = "this is a test";



file_put_contents($file, $data, LOCK_EX);

include ('footer.php');

?>


