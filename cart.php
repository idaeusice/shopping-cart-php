<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');//navbar
    print "</div>";
?>

<div id='cart' style='margin-top:120px;'>
    <?php
        include ('connection.php');
        $sql = 'select * from products;'; 
        $result = mysqli_query($dbc, $sql);

        while($row = mysqli_fetch_array($result)){
            echo '<p>testRow</p>';
        }
    ?>
    <p>placeholder</p>
    <a href='main.php'>Back</a>
</div>