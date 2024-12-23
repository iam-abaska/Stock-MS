<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="products_data.css" />
  </head>
  <body>
    <h2>All Products Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `products`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Productname</th>
        <th>Price</th>
        <th>Category</th>
        <th>Supplier</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['ProductID'];
            // echo $id;
            $id=$row['ProductID'];
$productname=$row['ProductName'];
$price=$row['Price'];
$category=$row['Category'];
$supplier=$row['SupplierID'];
echo " <tr>
<td>$i</td>
<td>$productname</td>
<td>$price</td>
<td>$category</td>
<td>$supplier</td>
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