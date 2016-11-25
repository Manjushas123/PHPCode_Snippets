<?php
$servername = "localhost";
$username   = "root";
$password   = "compass";
$dbname     = "mytodo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['insert'])) { //echo 'inside';
    $empname     = $_POST['empName'];
    $empid       = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $experience  = $_POST['experience'];
    $grosssalary = $_POST['gross_salary'];
    $deduction   = $_POST['deduction'];
    $lop         = $_POST['lop'];
    $netsalary   = $_POST['gross_salary']-((($_POST['gross_salary']/30) *$_POST['lop'])+$_POST['deduction']);
    
    $sql1 = "INSERT INTO employee_details(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empname',$empid,'$designation','$gender',$experience,$grosssalary,$deduction,$lop ,$netsalary )";
    if (mysqli_query($conn, $sql1)) {
        //echo "records inserted successfully";
        header('Location: view.php');
    } else {
        echo "Error in inserting: " . mysqli_error($conn);
    }
}

?>
<html>
<head>
<title> Employee Details </title>
</head<td><?php
echo $row[1];
?></td></head>
<body bgcolor = "pink">
<form method = "post" action= "">
<table>
<h1 align = "center"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id ="text" name= "empName" required/> </td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId" required/></td></tr>
<tr> <th> Designation </th> <td><input id ="text" name ="designation"/></td></tr>
<tr><th> Gender</th><td><input type="radio" name="gender" value="male" checked> Male
  <input type="radio" name="gender" value="female"> Female </td></tr>
  <tr> <th> Experience </th> <td><input id ="number" name ="experience"/ required></td></tr>
  <tr> <th> Gross Salary </th> <td><input id ="number" name ="gross_salary" required/></td></tr>
  <tr> <th> Deduction </th> <td><input id ="number" name ="deduction" required /></td></tr>
  <tr> <th> LOP </th> <td><input id ="number" name ="lop" required/></td></tr>
  <tr> <th> Net Salary </th> <td><input id ="number" name ="netsal"/></td></tr>
<tr> <td><input type="submit" name="insert" value="insert" /></td></tr>
  
  </table>
  </form>
  <p align="center"></p>
  </body>
  </html>
