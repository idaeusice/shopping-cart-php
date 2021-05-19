<!--
NOTES:
this will be the main page -- contents should be:
header include (separate file)
    splash image + Daintree label
    nav menu include:
        home
        categories
        sign in (if signed in, then sign out)
        my cart
main body section (contains products)
    each product row should have:
        an image, column separator
        product name, availability (in stock or not), col separator
        price, button to add to cart
footer include (separate file)
-->
<?php
    print "<div id='header'>";
        include ('header.php');//title
        include ('menu.php');
    print "</div>";
?>

    <div id='main'>
        <div id='products'>
        <!-- dynamically populated with products using php. 
            if looking at cart, remove the product elems and show cart instead. 
            when clicking to go to categories, remove product elems (should be in one div),
            then show only the relevant products -->
            <div class='container'>
                <div class='row'>
                    <div class='col-sm border-right'>
                        <img class='prodImage' src='./includes/resources/images/sample.jpg'>
                    </div>
                    <div class='col-sm border-right'>
                        <h3>Samsung Galaxy S21</h3>
                    </div>
                    <div class='col-sm'>
                        <div class='row'>
                            <div class='col-sm'>
                                <h3 style='padding-left: 10px; position: relative; justify-content: center; align-items: center;'>$899.99</h3>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm'>
                                <h3 style='padding-left: 10px;'><button type="button" class="btn btn-success">Add to Cart</button></h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
        
            </div>
        </div>
    </div>

<?php
    print "<div id='footer'>";
        include ('footer.php');
    print "</div>";
?>

</div> <!-- end of content div -->