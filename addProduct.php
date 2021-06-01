<?php
    print "<div id='header'>";
        include ('header.php');
        include ('menu.php');
    print "</div>";

    if($_SERVER['QUERY_STRING'] == 'upload'){
        //file upload handling. File needs to be uploaded 
        //before the rest of the form is submitted.
        $directory = 'includes/resources/images/';
        $file = $directory . basename($_FILES["productImage"]["name"]);
        if($file == 'includes/resources/images/'){
            $file = 'includes/resources/images/notfound.jpg';
        }
        $_SESSION['file'] = basename($_FILES["productImage"]["name"]);
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        echo "<div id='imageSample' style='margin: auto; margin-top: 50px; text-align:center;'>";
        if(move_uploaded_file($_FILES["productImage"]["tmp_name"], $file)){
            echo "
            <img class='image' src='" . $file . "' style='max-height: 300px;'>
            ";
        } else {
            echo  "<img class='image' src='includes/resources/images/noimgplaceholder.png' style='max-height: 300px;'>";
            echo "<p>No file was attached. The default image will be used.</p>";
        }
        echo "</div>";
    }

    if($_SERVER['QUERY_STRING'] == 'submit'){
        //table variables that are set after the user uploads an image.
        include ('connection.php');

        $file = 'includes/resources/images/' . $_SESSION['file'];
        $uploadOk = 0;
        if($file == 'includes/resources/images/'){
            $file = 'includes/resources/images/notfound.jpg';
        } 

        $productCategory = $_POST['productCategory'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productStock = $_POST['productStock'];
        $productStock = $_POST['productStock'];
        $productDescription = $_POST['productDescription'];
        
        $checkSql = "select name from product name where name=" . $productName . ";";
        $checkResult = mysqli_query($dbc, $sql);
        while($row = mysqli_fetch_array($checkResult)){
            if($row == $productName){
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        if($uploadOk === 1){
    
            $sql = "
insert into product(
    prod_id,
    catagory_id, 
    name, 
    price, 
    units, 
    description, 
    image) 
VALUES (
    (select max(prod_id) + 1 from product p),
    (select catagory_id from category c where c.name like concat(upper(substring('" . $productCategory . "', 1, 1)),lower(substring('" . $productCategory . "', 2)))), 
    '" . $productName . "', 
    '" . $productStock . "', 
    '" . $productPrice . "', 
    '" . $productDescription . "',
    '" . $file  . "'
    );
    ";
            $result = mysqli_query($dbc, $sql);
        }
    }

echo '<div id="addProduct">';

if($_SERVER['QUERY_STRING'] == 'upload'){
    echo '
<form class="form-signin" action="?submit" method="post" enctype="multipart/form-data" id="productForm" onsubmit="addProduct()">
<table style="margin: auto;">
    <tr>
        <td colspan=2 style="text-align: center;"><h3>Submit a New Product</h3></td>
    </tr>
    <tr>
        <td>Product Name: </td>
        <td><input type="text" name="productName"></td>
    </tr>
    <tr>
        <td>Product Price: </td>
        <td><input type="number" name="productPrice"></td>
    </tr>
    <tr>
        <td>Product Category: </td>
        <td>
            <select style="width: 100%;" id="productCategory" name="productCategory">';
                include ('connection.php');
                $sql = 'select name from category;'; 
                $result = mysqli_query($dbc, $sql);
            
                while($row = mysqli_fetch_array($result)){
                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
                
                echo '
            </select>
        </td>
    </tr>
    <tr>
        <td>Product Description: </td>
        <td><input type="textarea" name="productDescription"></td>
    </tr>
    <tr>
        <td>Product Stock: </td>
        <td><input type="number" name="productStock"></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:center;"><input type="submit" value="Add Product" name="submit"></td>
    </tr>    
    ';
} else {
    echo '
<form class="form-signin" action="?upload" method="post" enctype="multipart/form-data" id="productForm">
<table style="margin: auto;">
        <tr>
            <td colspan=2 style="text-align: center;"><h3>Submit a New Product</h3></td>
        </tr>
        <tr>
            <td rowspan=2 style="border-right: 2px solid #003366;"><h6>Select image to upload:</h6></td>
            <td style="padding-left: 5px;">
                <input type="file" name="productImage" id="productImage"><br><br>
                <input type="submit" value="Attach File" name="submit">
                </td>
        </tr>
    ';
}
?>
<input name=“MAX_FILE_SIZE” value=“30000” hidden>
        </table>
    </form>
</div>
<?php 
    include ('footer.php');
?>