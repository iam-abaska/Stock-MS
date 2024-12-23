<?php include('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display Data</title>
    <link rel="stylesheet" href="employee_data.css" />
  </head>
  <body>
    <h2>Employee Data</h2>
    <div class="table_container">
      <table class="table">
      
    <?php
    $select_query="Select * from `employee`";
    $result=mysqli_query($conn,$select_query);
    $i=1;
    if(mysqli_num_rows($result)>0){
      echo "  <thead>
      <tr>
        <th>Sl No</th>
        <th>Employee Name</th>
        <th>Employee Gender</th>
        <th>Employee Phone</th>
      </tr>
    </thead>
    <tbody>";
       while( $row=mysqli_fetch_assoc($result)){
            $id=$row['EmployeeID'];
            // echo $id;
            $id=$row['EmployeeID'];
$EmployeeName=$row['EmployeeName'];
$gender=$row['gender'];
$phone=$row['Phone'];
echo " <tr>
<td>$i</td>
<td>$EmployeeName</td>
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