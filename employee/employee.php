<?php
include "../includes/connection.php";
   if(isset($_POST['save'])) {
   	$name = $_POST['name'];
   	$gender = $_POST['gender'];
   	$phone =$_POST['phone'];
   	$insert = "INSERT INTO `employee`(`EmployeeName`, `gender`, `Phone`) VALUES ('$name','$gender','$phone')";
   	$result = mysqli_query($conn, $insert);
   if($result){
    echo "<script>alert('Data Inserted Successfully!')</script>";
   }
   else{
   	 echo "failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <link rel="stylesheet" href="employee.css">
</head>
<body>
    <div class="form_container">
        <form method="post">
            <h2>Employee Table</h2>
            <label for="name">Employee Name:</label>
            <input type="text" id="username" name="name" placeholder="Enter Employee Name" required>
            
            <label for="gender">Select Gender</label>
            <div class="custom_arrow">
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Employee Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select> 
            
            <label for="phone" class="select">Employee Phone:</label>
            <input type="text" id="phone" name="phone" 
            placeholder="Enter Employee Phone" required>
            
            <div class="button_container">
                <button type="submit" class="submit_btn" name="save">Save</button>
                <a href="employee_data.php" class="show_btn">Show Employee Data</a>
            </div>
        </form>
    </div>
</body>
</html>
