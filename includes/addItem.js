$(document).ready(function () {

  $('.addItemButton').click(function (e) {
    e.preventDefault();
    // get the id of the form that the button is part of (the form id is just the product id)
    var prod_id = $(this).parent().attr('id');
    // use the form id to get the id of the customer input tag
    var customerInputID = 'custID' + prod_id;
    // put the customer id into a variable
    var cust_id = document.getElementById(customerInputID).value;

    // give some feedback when adding an item to the cart
    var confirmID = '#confirmID' + prod_id

    $.ajax({ // Ajax to send data to addCartProduct.php
      type: "POST",
      url: "addCartProduct.php",
      data: { "cust_id": cust_id, "prod_id": prod_id, },
      success: function (data) {
        $('.result').html(data);
        $('#' + prod_id)[0].reset();
        $(confirmID).stop(true, true); // display "Item added to cart!" next to the pressed button
        $(confirmID).show();
        $(confirmID).fadeOut(1500, "linear");
      } // end of success
    }); // end of ajax

  }); // end of click

}); // end of document.ready
