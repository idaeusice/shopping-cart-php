<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";
?>

<div id='main'>
    <div id='products'>
        <?php 
            include ('products.php');
        ?>
        
    </div>
</div>

<?php
    include ('footer.php');
?>

</div> <!-- end of content div -->