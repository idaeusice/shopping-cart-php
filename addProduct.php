<?php
    print "<div id='header'>";
        include ('header.php');
        include ('menu.php');
    print "</div>";
    //need to perform a check 
    if($_SERVER['QUERY_STRING'] == 'upload'){
        include ('connection.php');

        $target = './includes/resources/images/';
        $file = $target . basename($_FILES['productImage']['name']);
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));

        $sql = "insert into product
        (catagory_id, name, price, units, description) 
        VALUES ((select catagory_id from category where category), '1', 'Shmapple', '300', '50', 'A real cellphone');"; 
        $result = mysqli_query($dbc, $sql);

    }
?>

<div id='addProduct'>
    <form class="form-signin" action="?upload" method="post" enctype="multipart/form-data" id='productForm'>
        <table style='margin: auto;'>    
            <tr>
                <td colspan=2 style='text-align: center;'><h3>Submit a New Product</h3></td>
            </tr>
            <tr>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Select image to upload:</td>
                <td><input type="file" name="productImage" id="productImage"></td>
            </tr>
            <tr>
                <td>Product Name: </td>
                <td><input type="text" name="productName"></td>
            </tr>
            <tr>
                <td>Product Price: </td>
                <td><input type="text" name="productPrice"></td>
            </tr>
            <tr>
                <td>Product Stock: </td>
                <td><input type="text" name="productStock"></td>
            </tr>
            <tr>
                <td colspan=2 style='text-align:center;'><input type="submit" value="Add Product" name="submit"></td>
            </tr>
            <input name=“MAX_FILE_SIZE” value=“30000” hidden>
        </table>
    </form>
</div>

<?php 
    include ('footer.php');
?>