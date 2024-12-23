<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$product = $_POST['product'];
   	$quantity = $_POST['quantity'];
   	$insert = "INSERT INTO `stock`(`ProductID`, `Quantity`) VALUES ('$product','$quantity')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
$sql = "SELECT ProductID, ProductName FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Table</title>
    <link rel="stylesheet" href="stock.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Stock Table</h2>

            <label for="product">Select Product:</label>
            <select id="product" name="product" required>
                <option value="" disabled selected>Select Product</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ProductID'] . "'>" . $row['ProductName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Suppliers Available</option>";
                }
                ?>
            </select>

            <label for="quantity" class="select">Product Quantity:</label>
            <input type="text" id="quantity" name="quantity" 
            placeholder="Enter Product Quantity" required>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="stock_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
