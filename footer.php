<div class='container footer'>
    <footer style='text-align: center;'>
        <p>&copy; 2021 Daintree - All rights reserved</p>
    </footer>
</div>
    </body>

<script> // for sticky navbar
    window.onscroll = function() {stickyNav()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function stickyNav() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
</html>