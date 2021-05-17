<!--
//NOTES:
//this will be the main page -- contents should be:
//header include (separate file)
    //splash image + Daintree label
    //nav menu include:
        //home
        //categories
        //sign in (if signed in, then sign out)
        //my cart
//main body section (contains products)
    //each product row should have:
        //an image, column separator
        //product name, availability (in stock or not), col separator
        //price, button to add to cart
//footer include (separate file)
-->
<?php
    print "<div id='header'>";
    include ('header.php');
    print "</div>";
    print "<div id='menu'>";
    include ('menu.php');
    print "</div>";
?>

    <div id='main'>
        <!-- dynamically populated with products using php. 
            if looking at cart, remove the product elems and show cart instead. 
            when clicking to go to categories, remove product elems (should be in one div),
            then show only the relevant products -->
    </div>

<?php
    print "<div id='footer'>";
        include ('footer.php');
    print "</div>";
?>