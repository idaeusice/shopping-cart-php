<?php
    include ('header.php');
    include ('menu.php');
?>
<div id='logout'>

<?php
    session_unset();
    session_destroy();
    header("Location: logoutMessage.php");
?>

</div>

<?php 
    include('footer.php');
?>