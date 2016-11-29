<?php
require "dbconfig.php";
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $empName     = $_POST['empName'];
    $empId       = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $experience  = $_POST['experience'];
    $grossSalary = $_POST['gross_salary'];
    $deduction   = $_POST['deduction'];
    $lop         = $_POST['lop'];
    $netSalary   = $grossSalary - ((($grossSalary / 30) * $lop) + $deduction);
    $result = "UPDATE employee_detail SET empName ='$empName', empId = $empId,designation = '$designation',gender = '$gender',experience = $experience,gross_salary = $grossSalary,deduction = $deduction,lop = $lop,netsal = $netSalary WHERE id = $id";
    $result_query     = $conn->query($result);
    if ($result_query) {
        echo "<i>";
        echo "<p align = center>";
        echo "Record updated Successfully";
        echo "</p>";
        echo "</i>";
    }
}
?>
<p align = "center"><b><a href = "employee_index.php"> Go to the View Page</a></b></p>
<?php
$result = mysqli_query($conn, "SELECT * FROM employee_detail WHERE id=$id");
$res         = mysqli_fetch_array($result);
$empName     = $res['empName'];
$empId       = $res['empId'];
$designation = $res['designation'];
$gender      = $res['gender'];
$experience  = $res['experience'];
$grossSalary = $res['gross_salary'];
$deduction   = $res['deduction'];
$lop         = $res['lop'];
$netSalary   = $res['netsal'];
?>
<html>
<head>
<title> Employee Details </title>
<style>
.button {
    background-color: #fc0905;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body bgcolor = #DEE2A3>
<form method = "post" action= "">
<table>
<h1 align = "center"> Employee Update operation</h1>
<tr> <th> Employee Name </th> <td> <input id ="text" name= "empName" value="<?php
echo $empName;
?>" required/> </td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId"   value="<?php
echo $empId;
?>" required/></td></tr>
<tr> <th> Designation </th> <td><input id ="text" name ="designation" value="<?php
echo $designation;
?>" required/></td></tr>
<tr><th> Gender</th><td><input type="radio" <?php if($gender == "male") { echo "checked"; } ?>  name="gender" value="male" />Male<br />
<input type="radio" <?php if($gender == "female") echo "checked" ?> name="gender" value="female" />Female<br />
</td></tr>
  <tr> <th> Experience </th> <td><input id ="number" name ="experience"/ value="<?php
echo $experience;
?>" required></td></tr>
  <tr> <th> Gross Salary </th> <td><input id ="number" name ="gross_salary" value="<?php
echo $grossSalary;
?>" required/></td></tr>
  <tr> <th> Deduction </th> <td><input id ="number" name ="deduction" value="<?php
echo $deduction;
?>"required /></td></tr>
  <tr> <th> LOP </th> <td><input id ="number" name ="lop" value="<?php
echo $lop;
?>" required/></td></tr>
  <tr> <th> Net Salary </th> <td><input id ="number" name ="netsal" value="<?php
echo $netSalary;
?>" /></td></tr>
<tr> <td><p align= "center"><input type="submit"  class = "button" name="update" value="Update" /></p></td></tr> 
  </table>
  </form>
  <p align="center"></p>
  </body>
  </html>