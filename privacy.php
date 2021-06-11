<?php
include ('header.php');
include ('menu.php');

if(isset($_POST['action'])){
    //check to ensure user is logged in and their cust_id is set.
    if(isset($_SESSION['cust_id'])){
        include ('connection.php');
        $privacy = $_REQUEST['action'];
        $_SESSION['privacy'] = $privacy;
        $customerId = $_SESSION['cust_id'];
        $sql = 'update customer set privacy=' . $privacy . ' where cust_id=' . $customerId . ';';
        $result = mysqli_query($dbc, $sql);

        if($privacy == 0){
            session_unset();
            session_destroy();
            header("Location: logoutMessage.php");
        }
    } 
} else {
    echo "
    <div id='privacyContainer' class='container'>
        <h3>General Data Protection Regulation</h3>
        <p>
        The Canadian federal government recently introduced a new privacy protection law called
    the “General Data Protection Regulation”. This law requires that individuals must give explicit permission
    for their data to be used and give individuals the right to know who is accessing their information and what it
    will be used for. All companies collecting and/or using personal information on Canadian citizens must comply
    with this new law.
        </p>
        <p>
        Your personal information such as your name, email address, and purchase history may be collected. To proceed with shopping 
        at Daintree, users must accept these terms. If you do not accept, you may continue to browse the products at Daintree, 
        but you will not be able to make a purchase. 
        </p>
        <button class='btn btn-success' onclick='acceptPrivacy();'>Accept
        </button>
        <button class='btn btn-danger' onclick='declinePrivacy();'>Decline
        </button>
        <br/><br/>
    </div>
    ";
}

include ('footer.php');
?>