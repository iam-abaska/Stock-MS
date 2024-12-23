<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$product = $_POST['product'];
   	$price = $_POST['price'];
   	$category =$_POST['category'];
    $supplier =$_POST['supplier'];
   	$insert = "INSERT INTO `products`(`ProductName`, `Price`, `Category`, `SupplierID`) VALUES ('$product','$price','$category','$supplier')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT SupplierID, SupplierName FROM suppliers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <link rel="stylesheet" href="products.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Products Table</h2>

            <label for="product">Product Name:</label>
            <input type="text" id="product" name="product" placeholder="Enter Product Name" required>

            <label for="price">Product Price:</label>
            <input type="text" id="price" name="price" placeholder="Enter Product Price" required>

            <label for="category">Product Category:</label>
            <input type="text" id="category" name="category" placeholder="Enter Product Category" required>
            
            <label for="supplier">Select Supplier:</label>
            <select id="supplier" name="supplier" required>
                <option value="" disabled selected>Select Supplier</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['SupplierID'] . "'>" . $row['SupplierName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Suppliers Available</option>";
                }
                ?>
            </select>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="products_data.php" class="show_btn">Show Products Data</a>
            </div>
        </form>
    </div>
</body>
</html>
