<?php
include ('header.php');
include ('menu.php');

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
    <button class='btn btn-success' value='y' onclick=''>Accept
    </button>
    <button class='btn btn-danger' value='y' onclick=''>Decline
    </button>
    <br/><br/>
</div>
";

include ('footer.php');
?>