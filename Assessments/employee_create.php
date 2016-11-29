<?php
require "dbconfig.php";
if (isset($_POST['insert'])) { 
    $empName     = $_POST['empName'];
    $empId       = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $experience  = $_POST['experience'];
    $grossSalary = $_POST['gross_salary'];
    $deduction   = $_POST['deduction'];
    $lop         = $_POST['lop'];
    $calculate   = $grossSalary / 30;
    $netSalary   = $grossSalary - (($calculate * $lop) + $deduction);
    if (empty($empName)) {
        $nameError ="Please enter the Employee Name";
        echo "<br/>";
    }
    if (empty($empId)) { 
        $idError ="Please enter the Employee Id";
        echo "<br/>";
    }
    if (empty($designation)) {
        $desError ="Please enter the Designation";
        echo "<br/>";
    }
    if (empty($gender)) {
        $genderError ="Please enter the Gender";
        echo "<br/>";
        
    }
    if (empty($experience)) {
        $expError ="Please enter the Experience";
        echo "<br/>";
    }
    if (empty($grossSalary)) {
        $gsError ="Please enter the Gross Salary";
        echo "<br>";
    }
    if (empty($deduction)) {
        $dedError ="Please enter the Deduction";
        echo "<br>";
    }
    if (empty($lop)) {
        $lopError ="Please enter the Lop";
        echo "<br>";
    }
    if (!empty($empName) && !empty($empId) && !empty($designation) && !empty($gender) && !empty($experience) && !empty($grossSalary) && !empty($deduction) && !empty($lop)) {
        $sql1 = "INSERT INTO employee_detail(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empName',$empId,'$designation','$gender',$experience,$grossSalary,$deduction,$lop,$netSalary)";
    if (mysqli_query($conn, $sql1)) {
        header('Location: view.php');
    } else {
          echo "Error in inserting: " . mysqli_error($conn);
    }
    } else {
    }
}
?>
<html>
<head>
<title> Employee Details </title>
</head>
<body bgcolor = #DEE2A3>
<form method = "post" action= "">
<table>
<a href ="employee_index.php">Go to the View Page </a>
<h1 align = "center" border-style ="solid"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id ="text" name= "empName"  /> <?php echo $nameError ?></td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId"  /><?php echo $idError ?></td></tr>
<tr> <th> Designation </th> <td><input id ="text" name ="designation"/><?php echo $desError ?></td></tr>
<tr><th> Gender</th><td><input type="radio" <?php if($gender == "male") { echo "checked"; } ?>  name="gender" value="male" />Male<br />
<input type="radio" <?php if($gender == "female") echo "checked" ?> name="gender" value="female" />Female<br />
<?php 
if (empty($gender)) {
    echo $genderError;
    $value = false;
}  
?></td></tr>
<tr> <th> Experience </th> <td><input id ="number" name ="experience" / ><?php echo $expError ?></td></tr>
<tr> <th> Gross Salary </th> <td><input id ="number" name ="gross_salary"/><?php echo $gsError?></td></tr>
<tr> <th> Deduction </th> <td><input id ="number" name ="deduction" /><?php echo $dedError ?></td></tr>
<tr> <th> LOP </th> <td><input id ="number" name ="lop" /><?php echo $lopError ?></td></tr>
<tr> <th> Net Salary </th> <td><input id ="number" name ="netsal"/></td></tr>
<tr> <td><p align ="center"><input type="submit" name="insert" value="Insert" /></td></tr></p>
</table>
</form>
<p align="center"></p>
</body>
</html>
