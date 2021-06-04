$(document).ready(function () {

  $('.addItemButton').click(function (e) {
    e.preventDefault();
    // get the id of the form that the button is part of (the form id is just the product id)
    var formID = $(this).parent().attr('id');
    // use the form id to get the id of the customer input tag
    var customerInputID = 'custID' + formID;
    console.log(customerInputID);
    var customerID = document.getElementById(customerInputID).value;

    console.log(formID);
    console.log(customerInputID);

    /*
    $.ajax({
      type: "POST",
      url: "addCartProduct.php",
      data: { "customerID": customerID, "productID": productID, },
      success: function (data) {
        //$('.result').html(data);
        $('#' + formID)[0].reset();
      }
    });
    */
  });

});
