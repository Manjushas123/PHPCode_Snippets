<?php
require "dbconfig.php";
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $empname     = $_POST['empName'];
    $empid       = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $experience  = $_POST['experience'];
    $grosssalary = $_POST['gross_salary'];
    $deduction   = $_POST['deduction'];
    $lop         = $_POST['lop'];
    $netsalary   = $_POST['gross_salary']-((($_POST['gross_salary']/30) *$_POST['lop'])+$_POST['deduction']);
    
    $result = "UPDATE employee_detail SET empName ='$empname', empId=$empid,designation='$designation',gender='$gender',experience=$experience,gross_salary=$grosssalary,deduction=$deduction,lop=$lop,netsal=$netsalary WHERE id=$id";
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
<p color = "blue"><b><a href = "view.php"> Go to the View Page</a></b></p>
<?php
$result = mysqli_query($conn, "SELECT * FROM employee_detail WHERE id=$id");
$res         = mysqli_fetch_array($result);
$empname     = $res['empName'];
$empid       = $res['empId'];
$designation = $res['designation'];
$gender      = $res['gender'];
$experience  = $res['experience'];
$grosssalary = $res['gross_salary'];
$deduction   = $res['deduction'];
$lop         = $res['lop'];
$netsalary   = $res['netsal'];
?>
<html>
<head>
<title> Employee Details </title>
</head>
<body bgcolor = #CCFFFF>
<form method = "post" action= "">
<table>
<h1 align = "center"> Employee Update operation</h1>
<tr> <th> Employee Name </th> <td> <input id ="text" name= "empName" value="<?php
echo $empname;
?>" required/> </td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId"   value="<?php
echo $empid;
?>" required/></td></tr>
<tr> <th> Designation </th> <td><input id ="text" name ="designation" value="<?php
echo $designation;
?>" required/></td></tr>
<tr><th> Gender</th><td><input type="radio" name="gender" value="male"  checked> Male
  <input type="radio" name="gender" value="female"> Female </td></tr>
  <tr> <th> Experience </th> <td><input id ="number" name ="experience"/ value="<?php
echo $experience;
?>" required></td></tr>
  <tr> <th> Gross Salary </th> <td><input id ="number" name ="gross_salary" value="<?php
echo $grosssalary;
?>" required/></td></tr>
  <tr> <th> Deduction </th> <td><input id ="number" name ="deduction" value="<?php
echo $deduction;
?>"required /></td></tr>
  <tr> <th> LOP </th> <td><input id ="number" name ="lop" value="<?php
echo $lop;
?>" required/></td></tr>
  <tr> <th> Net Salary </th> <td><input id ="number" name ="netsal" value="<?php
echo $netsalary;
?>" /></td></tr>
<tr> <td><p align= "center"><input type="submit" name="update" value="update" /></p></td></tr> 
  </table>
  </form>
  <p align="center"></p>
  </body>
  </html>
