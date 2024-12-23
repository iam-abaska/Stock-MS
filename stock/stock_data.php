<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="stock_data.css" />
  </head>
  <body>
    <h2>All Stock Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `stock`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>ProductId</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['StockID'];
            // echo $id;
            $id=$row['StockID'];
            $product=$row['ProductID'];
            $quantity=$row['Quantity'];
echo " <tr>
<td>$i</td>
<td>$product</td>
<td>$quantity</td>
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