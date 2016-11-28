<?php
require "dbconfig.php";
if (isset($_POST['insert'])) { 
    $empname     = $_POST['empName'];
    $empid       = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $experience  = $_POST['experience'];
    $grosssalary = $_POST['gross_salary'];
    $deduction   = $_POST['deduction'];
    $lop         = $_POST['lop'];
    $netsalary   =  $grosssalary - ((($grosssalary / 30) * $lop) + $deduction);
    if (empty($empname)) {
        $nameError ="please enter the employee name";
        echo $nameError;
        echo "<br/>";
    }
    if (empty($empid)) { 
        $idError ="please enter the employee Id";
        echo $idError;
        echo "<br/>";

    }
    if (empty($designation)) {
        $desError ="please enter the designation";
        echo $desError;
        echo "<br/>";
    }

    if (empty($experience)) {
        $expError ="please enter the experience";
        echo $expError ;
        echo "<br/>";
    }
    if (empty($grosssalary)) {
        $gsError ="please enter the gross salary";
        echo $gsError;
        echo "<br>";
    }
    if (empty($deduction)) {
        $dedError ="please enter the deduction";
        echo $dedError;
        echo "<br>";
    }
    if (empty($lop)) {
        $lopError ="please enter the lop";
        echo $lopError;
        echo "<br>";
    }

    if(!empty($empname) && !empty($empid) && !empty($designation) && !empty($experience) && !empty($grosssalary) && !empty($deduction) && !empty($lop)) {

      $sql1 = "INSERT INTO employee_detail(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empname',$empid,'$designation','$gender',$experience,$grosssalary,$deduction,$lop,$netsalary)";

      if (mysqli_query($conn, $sql1)) {
          header('Location: view.php');
      } else {
          echo "Error in inserting: " . mysqli_error($conn);
      }

    } else {
      //echo "Please enter all fields";
    }
}
?>
<html>
<head>
<title> Employee Details </title>
</head>
<body background = "insert1.png">
<form method = "post" action= "">
<table>
<h1 align = "center" border-style ="solid"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id ="text" name= "empName"  /> </td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId"  /></td></tr>
<tr> <th> Designation </th> <td><input id ="text" name ="designation"/></td></tr>
<tr><th> Gender</th><td><input type="radio" name="gender" value="male" checked> Male
  <input type="radio" name="gender" value="female"> Female </td></tr>
  <tr> <th> Experience </th> <td><input id ="number" name ="experience" / ></td></tr>
  <tr> <th> Gross Salary </th> <td><input id ="number" name ="gross_salary"/></td></tr>
  <tr> <th> Deduction </th> <td><input id ="number" name ="deduction" /></td></tr>
  <tr> <th> LOP </th> <td><input id ="number" name ="lop" /></td></tr>
  <tr> <th> Net Salary </th> <td><input id ="number" name ="netsal"/></td></tr>
<tr> <td><p align ="center"><input type="submit" name="insert" value="Insert" /></td></tr></p>
  </table>
  </form>
  <p align="center"></p>
  </body>
  </html>