<?php
    include ('header.php');
    include ('menu.php');
?>

<div id='logout'>

<?php
session_unset();
    echo "<div>
        <h4>You have successfully logged out.</h4>
    </div>";
session_destroy();
?>
</div>