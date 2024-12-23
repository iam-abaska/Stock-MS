<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$employee = $_POST['employee'];
    $product = $_POST['product'];
   	$quantity = $_POST['quantity'];
    $price = $_POST['price'];
   	$insert = "INSERT INTO `sales`(`EmployeeID`, `ProductID`, `Quantity`, `Price`) VALUES ('$employee','$product','$quantity','$price')";
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

$sql2 = "SELECT EmployeeID, EmployeeName FROM employee";
$result2 = $conn->query($sql2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Table</title>
    <link rel="stylesheet" href="sales.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Sales Table</h2>

            <label for="employee">Select Employee:</label>
            <select id="employee" name="employee" required>
                <option value="" disabled selected>Select Employee</option>
                <?php
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        echo "<option value='" . $row['EmployeeID'] . "'>" . $row['EmployeeName'] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No Suppliers Available</option>";
                }
                ?>
            </select>


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
            
             
            
            <label for="price">Total Price:</label>
            <input type="text" id="price" name="price" 
            placeholder="Enter Product Price" required>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="sales_data.php" class="show_btn">Show Sales Data</a>
            </div>
        </form>
    </div>
</body>
</html>
