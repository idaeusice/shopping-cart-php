<?php
    $server = 'localhost';
    $user = 'root';
    $pswd = '';
    $db='daintree_db';

    $dbc=mysqli_connect($server, $user, $pswd, $db);

    $link = mysqli_connect($server,$user,$pswd,$db);

    if (!$link) {
        die ('MySQL Error:' . mysqli_connect_error());
    }
?>