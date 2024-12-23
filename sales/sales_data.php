<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="sales_data.css" />
  </head>
  <body>
    <h2>All Sales Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `sales`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Employee ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Sale Date</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['SaleID'];
            // echo $id;
            $id=$row['SaleID'];
$employee=$row['EmployeeID'];
$product=$row['ProductID'];
$quantity=$row['Quantity'];
$price=$row['Price'];
$date=$row['SaleDate'];
echo " <tr>
<td>$i</td>
<td>$employee</td>
<td>$product</td>
<td>$quantity</td>
<td>$price</td>
<td>$date</td>
</tr>";
$i++;
        }
      }
    else{
        echo "<h3 class='no_records'>No Records to display</h3>";
    }
?>          </tbody>
      </table>
    </div>