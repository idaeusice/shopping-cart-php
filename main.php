<!--
NOTES:
this will be the main page -- contents should be:
header include (separate file)
    splash image + Daintree label
    nav menu include:
        home
        categories (dropdown)
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
    <div id='products' class='container'>
    <!-- dynamically populated with products using php. 
        if looking at cart, remove the product elems and show cart instead. 
        when clicking to go to categories, remove product elems (should be in one div),
        then show only the relevant products -->
        <div class='row'>
            <div class='col-sm border-right'>
                <img class='prodImage' src='./includes/resources/images/sample.jpg'>
            </div>
            <div class='col-sm border-right' style='margin:auto;'>
                <h3>Samsung Galaxy S21</h3>
            </div>
            <div class='col-sm' style='margin:auto;'>
                <div class='row container'>
                    <div class='col-sm'>
                        <h3>$899.99</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include ('footer.php');
?>

</div> <!-- end of content div -->