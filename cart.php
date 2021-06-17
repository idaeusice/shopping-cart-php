<?php
    require_once('includes/resources/stripe/init.php');
    print "<div id='header'>";
    include ('header.php');
    include ('menu.php');
    print "</div>";
?>

<div class='container' id='cart' style='margin-top:120px; text-align: center;'>

<?php
    include ('connection.php');

    if(isset($_SESSION['cust_id'])) { // if logged in (login.php)
      if($_SERVER['QUERY_STRING'] == 'checkout'){
        $stripe = new \Stripe\StripeClient("sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI");
        $ch = $stripe->charges->capture(
          'ch_1J2kl9KB9Qa5a2djKEGZsyG5',
          [],
          ['api_key' => 'sk_test_51Ivr8VKB9Qa5a2djkOyshBa9ASlJKMTpo11qkn7x6ZW64z6jJW2mzlGmo4weNf279b2sHf1emgvWBLNqJN76ZwcH00cFRKujyI']
        );
      }
      if($_SERVER["REQUEST_METHOD"] == "POST") { // if a button to add or remove items has been pressed

        $changeQuantityOf = $_POST['idOfProd']; // prod_id
        $changeHow = $_POST['submit']; // -1, +1, Remove All, or Empty Cart
        $forWho = $_SESSION['cust_id'];

        if($changeHow == '-1') { // subract 1 from the quantity
          $updateCartSql = "UPDATE cart
                            SET quantity = quantity - 1
                            WHERE prod_id = '$changeQuantityOf'
                            AND cust_id = '$forWho';";

          mysqli_query($dbc, $updateCartSql);
        } elseif($changeHow == '+1') { // add 1 to the quantity
          $updateCartSql = "UPDATE cart
                            SET quantity = quantity + 1
                            WHERE prod_id = '$changeQuantityOf'
                            AND cust_id = '$forWho';";

          mysqli_query($dbc, $updateCartSql);
        } elseif($changeHow == 'Remove All') { // delete the entire row
          $updateCartSql = "DELETE FROM cart
                            WHERE prod_id = '$changeQuantityOf'
                            AND cust_id = '$forWho';";

          mysqli_query($dbc, $updateCartSql);
        } elseif($changeHow == 'Empty Cart') { // empty the entire cart
          $updateCartSql = "DELETE FROM cart
                            WHERE cust_id = '$forWho';";

          mysqli_query($dbc, $updateCartSql);
        }

        // delete any items in carts that have a quantity of 0 or less
        $clearEmpty = "DELETE FROM cart
                       WHERE quantity <= 0;";

        mysqli_query($dbc, $clearEmpty);

        // resets $_POST  and the variables so that refreshing the page doesn't increment/decriment quantity
        $changeQuantityOf = 0;
        $changeHow = 'dont';
        $forWho = 'noone';
        // prevent form from being resubmited
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
      } // end of if server post request

      // sql query to get general info about indevidial items in the cart
      $sql = 'SELECT (p.price * c.quantity) AS total, p.prod_id, p.image, p.name, p.description, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

      $result = mysqli_query($dbc, $sql);

      // sql query to get the total price only, this needs to be a separate sql query or it doesn't reset after the first while loop
      $totalSql = 'SELECT (p.price * c.quantity) AS total, p.price, c.quantity
              FROM cart c INNER JOIN product p USING (prod_id)
              WHERE cust_id = ' . $_SESSION['cust_id'] . '
              GROUP BY p.prod_id;';

      $totalResult = mysqli_query($dbc, $totalSql);

      $totalPrice = 0.00; // Will store the total price of all items in the cart

      // loops through the results to increment totalPrice
      if(mysqli_num_rows($totalResult) > 0) {
        while($row = mysqli_fetch_array($totalResult)) { // while loop to increment totalPrice.
          $totalPrice += $row['total'];
        } // end of while rows remain
      } // end of if

      if(mysqli_num_rows($result) > 0) { // if there is more than 0 rows

        // Empty the entire cart
        echo "
          <form action='' method='post'>
            <input class='btn btn-outline-danger' type='submit' name='submit' value='Empty Cart' style='margin-top: 0.5em'/>
          </form>
        ";

        while($row = mysqli_fetch_array($result)) { // loop through each row
        if($row['quantity'] > 0){
          echo "
          <div class='row'>
            <div class='col-sm'> <!-- image -->
              <div class='prodImage'>
                <img class='image' src='";
                  if(is_null($row['image'])){
                    print 'includes\resources\images\noimgplaceholder.png';
                  } else {
                    print $row['image'];
                  };
                echo "'>
              </div>
            </div>
                <div class='col-sm border-right' style='margin:auto;'> <!-- name & price -->
                <form action='' method='post' id='formForIDNum" . $row['prod_id'] . "'>
                    <h3>";
                        print $row['name'];
                    echo "</h3><h6>";
                        print $row['quantity'] . " in cart at $" . $row['price'] . " each.";
                    echo "</h6>
                    <input id='prodID" . $row['prod_id'] . "' type='hidden' name='idOfProd' value='" . $row['prod_id'] . "'/>
                    <input class='btn btn-outline-warning' type='submit' name='submit' value=' -1 '/>
                    <input class='btn btn-outline-success' type='submit' name='submit' value='+1 '/><br>
                    <input class='btn btn-outline-danger' type='submit' name='submit' value='Remove All' style='margin-top: 0.5em'/>
                </form>
                </div>
            </div>";
            }

            
        } // end of while rows remain

        if ($totalPrice > 0) { // display total
            echo "
            <div class='row'>
              <div class='col-sm'>
                <H4>Total:</H4>
              </div>
              <div class='col-sm'>
                <H4>$" . sprintf("%0.2f", $totalPrice) /*makes sure number has 2 decimal places to the right*/ . "</H4>
              </div>
            </div>";
        }
        //checkout button -- opens modal to handle payment processing. 
        echo '
        <div class="container" style="margin-bottom: 20px; text-align:center;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
              Checkout
            </button>
        ';
        echo '
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 600px; overflow-y: scroll;">
        ';
            //modal body goes here
            echo '
            <form class="form" id="checkout" action="checkout.php" method="post" onsubmit="return validateCheckout();">
              <input required maxlength="90" id="name" name="name" class="form-control" placeholder="Full Name" value="' . (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])? $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] : '' ) . '">
              <br/>
              <input required maxlength="45" type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="' . (isset($_SESSION['email']) ? $_SESSION['email'] : '' ) . '">
              <br/>
              <table>
              <tr><td>Credit Card:</td></tr>
                <tr>
                  <td><input id="cc1" name="cc1" class="form-control" placeholder="XXXX" maxlength="4" minlength="4" pattern="^\d{4}$" required></td>
                  <td><input id="cc2" name="cc2" class="form-control" placeholder="XXXX" maxlength="4" minlength="4" pattern="^\d{4}$" required></td>
                  <td><input id="cc3" name="cc3" class="form-control" placeholder="XXXX" maxlength="4" minlength="4" pattern="^\d{4}$" required></td>
                  <td><input id="cc4" name="cc4" class="form-control" placeholder="XXXX" maxlength="4" minlength="4" pattern="^\d{4}$" required></td>
                </tr>
              </table>
              <input type="hidden" id="amount" name="amount" value="' . sprintf("%0.2f", $totalPrice) /*makes sure number has 2 decimal places to the right*/ . '" class="form-control" placeholder="$' . sprintf("%0.2f", $totalPrice) . '" readonly>
              <br/>
            ';
            //end modal body
        echo '
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="checkout-button">Test</button>
                    <input type="submit" class="btn btn-primary"></button>
                </div>
                </div>
              </form> <!-- form end -->
            </div>
            </div>
        </div>
        ';
      } else { // if cart empty
        echo "<div class='box'>
                <h1 class='message'>Your cart is empty.</h1>
                <a href='main.php' class='no-underline'>Start shopping</a>
              </div>";
      }
    } else { // if not logged in
      echo "<div id='emptyCart'>
            <h1 class='message'>You are not logged in. Please log in to add items to your cart.</h1>
            <a href='main.php' class='no-underline'>Browse products</a> or <a href='login.php' class='no-underline'>log in</a>
            </div>";
    }
?>
</div>

<script src='includes/scripts.js'></script>
<script src='includes/addItem.js'></script>
<?php
    include ('footer.php');
?>
