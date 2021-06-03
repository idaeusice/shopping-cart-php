<!-- This is a quick way to delete users from the DB
basically the same as PHPmyAdmin but simpler - you can only delete users
this feature is only for admins -->
<style>
    table, tr, td, th {
        border: 1px solid black;
        padding: 0.3em;
    }

    #users {
        margin: 1em 0 0 30%;
    }

    form h1 {
        margin: 2em 0 0 30%;
        font-size: 30px;
        font-family: sans-serif;
    }

    @media screen and (max-width: 800px) {
        #users, form h1 {
            margin: 1em;
        }
    }
</style>

<?php
    include ('header.php');
    include ('menu.php');

    // make sure user is admin
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            // if cust_id set
            if (isset($_GET['cust_id'])) {

                // clean input
                $cust_id = htmlspecialchars($_GET['cust_id']);

                // delete from DB
                $sql = "DELETE FROM customer WHERE cust_id ='$cust_id '";
                mysqli_query($dbc, $sql);
            }
        }

        include ('connection.php');

        $sql = "SELECT * FROM customer";
        $result = mysqli_query($dbc, $sql);

    
        echo "<form action='users.php' method='POST'>
        <h1> List of users for DainTree</h1>
        <table id='users'>";
    
        echo "<tr>
                <th>cust_id</th>
                <th>email</th>
                <th>first name</th>
                <th>last name</th>
                <th>admin</th>
                <th>delete</th>
            </tr>";
    
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "<td>".$row[3]."</td>";
            echo "<td>".$row[5]."</td>";
            echo "<td><a href='users.php?cust_id=".$row[0]."'><span class='material-icons' style='color: red'>remove_circle_outline</span></a></td>";
            echo "</tr>";
        }
    
        echo "</table>
              </form>";
    } else {
        header("Location: main.php");
    }

    include ('footer.php');
?>

</div> <!-- end of content div -->