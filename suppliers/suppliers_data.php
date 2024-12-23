<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="suppliers_data.css" />
  </head>
  <body>
    <h2>Suppliers Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `suppliers`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Supplier Name</th>
        <th>Supplier's Company</th>
        <th>Supplier Gender</th>
        <th>Supplier Phone</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['SupplierID'];
            // echo $id;
            $id=$row['SupplierID'];
$supplierName=$row['SupplierName'];
$company=$row['Company'];
$gender=$row['gender'];
$phone=$row['Phone'];
echo " <tr>
<td>$i</td>
<td>$supplierName</td>
<td>$company</td>
<td>$gender</td>
<td>$phone</td>
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