<style>
    table, tr, td, th {
        border: 1px solid black;
        padding: 0.3em;
    }
</style>

<?php
    include ('header.php');//title
    include ('menu.php');
?>

<div id='main'>
    <div id='products'>
        <!-- can be callable or display the data directly on the page -->
        <?php

            include ('connection.php');

            // if logged in show welcome message
            if (isset($_SESSION['first_name']))
                echo "<p style='float: right'><span style='font-weight: bold'>Welcome, </span>" . $_SESSION['first_name'] . "!</p>";

            $allSql = "select * from product;";
            $allResult = mysqli_query($dbc, $allSql);


            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Price</th>
                    </tr>";

            while($row = mysqli_fetch_array($allResult)){
                if($row['archive'] == 0) {
                    echo "
                    <tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . $row['units'] . "</td>
                        <td>" . $row['price'] . "</td>
                    </tr>
                    ";
                }
            }

            echo "</table>";
        ?>
        <script src="includes/addItem.js"></script>

        
    </div>
</div>

<?php
    include ('footer.php');
?>

</div> <!-- end of content div -->