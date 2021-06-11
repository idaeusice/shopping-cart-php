<?php
echo"
    <!-- scroll to top button -->                                                                           
    <button onclick='window.scrollTo({top: 0, behavior: 'smooth'});' id='scrollButton' class='btn btn-primary'>
        <!-- chevron icon from google icons -->
        <span class='material-icons'>expand_less</span>
    </button>

    <div class='container footer'>
        <footer style='text-align: center;'>
            <p>&copy; 2021 Daintree - All rights reserved</p>
";
    if(isset($_SESSION['cust_id'])){
        echo"<a href='privacy.php'>Privacy Statement</a>";
    }
echo"
        </footer>
    </div>
</body>
</html>
";
?>