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
    $calculate   = $grossSalary / 30;
    $netSalary   = $grossSalary - (($calculate * $lop) + $deduction);
    $valid =true;
     if (empty($empName) || !preg_match("/^[a-zA-Z'-]+$/", $empName)) {
        $nameError = "Please enter the Valid Employee Name";
        $valid = false;
     }
     if (empty($empId) ||  !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$empId)) { 
        $idError = "Please enter the valid Employee Id";
        $valid = false;
        echo "<br/>";
    }
    if (empty($designation)) {
        $designationError = "Please enter the valid Designation";
        $valid = false;
        echo "<br/>";
    }
    if (empty($gender)) {
        $genderError = "Please enter the Gender";
        $valid = false;
        echo "<br/>";
        
    }
    if (empty($experience) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$experience)) {
        $experienceError = "Please enter the valid Experience";
        $valid = false;
        echo "<br/>";
    }
    if (empty($grossSalary) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$grossSalary)) {
        $gsError = "Please enter the valid Gross Salary";
        $valid = false;
        echo "<br>";
    }
    if (empty($deduction) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$deduction)) {
        $deductionError = "Please enter the valid Deduction";
        $valid = false;
        echo "<br>";
    }
    if (empty($lop) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$lop)) {
        $lopError = "Please enter the valid Lop";
        $valid = false;
        echo "<br>";
    }
     if ($valid) {
    $result = "UPDATE employee_detail SET empName ='$empName', empId = $empId,designation = '$designation',gender = '$gender',experience = $experience,gross_salary = $grossSalary,deduction = $deduction,lop = $lop,netsal = $netSalary WHERE id = $id";
    $result_query   = $conn->query($result);
    if ($result_query) {
        header("location:index.php");
    } else {
          echo "Error in inserting: " . mysqli_error($conn);
    }
    } else {
    }
}
?>
<p align = "center"><b><a href = "index.php"> Go to the index Page</a></b></p>
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
<tr> <th> Employee Name </th> <td> <input id = "text" name = "empName" value = "<?php
echo $empName;
?>" required/> <?php echo $nameError;?></td></tr>
<tr> <th> Employee Id </th> <td><input id = "number" name = "empId"   value = "<?php
echo $empId;
?>" required/><?php echo $idError;?></td></tr>
<tr>
<th>Designation:</th>
<td><select name="designation"  value =" <?php echo $designation;?>" >
<option disabled selected value></option>
<option <?php if ($designation == 'intern') { ?> selected <?php } ?> value="intern">intern</option>
<option <?php if ($designation == 'HR') { ?> selected <?php } ?> value="HR">HR</option>
<option <?php if ($designation == 'SrEngineer') { ?> selected <?php } ?> value="SrEngineer">Sr Engineer</option>
<option <?php if ($designation == 'SwConsultant') { ?> selected <?php } ?> value="SwConsultant">Sw Consultant</option>
</select>
<?php 
if (empty($designation)) {
    echo $designationError;
    $value = false;
}  
?>
<?php echo $designationError; ?>
</td>
</tr>
<tr><th> Gender</th><td><input type = "radio" <?php if($gender == "male") { echo "checked"; } ?>  name = "gender" value = "male" required/>Male<br />
<input type="radio" <?php if($gender == "female") echo "checked" ?> name = "gender" value = "female" required/>Female<br />
</td><?php echo $genderError;?></tr>
  <tr> <th> Experience </th> <td><input id = "number" name = "experience"/ value = "<?php
echo $experience;
?>" required></td></tr>
  <tr> <th> Gross Salary </th> <td><input id = "number" name = "gross_salary" value = "<?php
echo $grossSalary;
?>" required/><?php echo $gsError; ?></td></tr>
  <tr> <th> Deduction </th> <td><input id = "number" name = "deduction" value = "<?php
echo $deduction;
?>"required /><?php echo $deductionError;?></td></tr>
  <tr> <th> LOP </th> <td><input id = "number" name = "lop" value = "<?php
echo $lop;
?>" required/><?php echo $lopError; ?></td></tr>
<tr> <td><p align = "center"><input type = "submit"  class = "button" name = "update" value = "Update" /></p></td></tr> 
  </table>
  </form>
  <p align = "center"></p>
  </body>
  </html>
