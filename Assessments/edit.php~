<?php
ob_start();
require "dbconfig.php";
require "validation.php";
require "calculation.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $empName = $_POST['empName'];
    $empId = $_POST['empId'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $experience = $_POST['experience'];
    $grossSalary = $_POST['gross_salary'];
    $deduction = $_POST['deduction'];
    $lop = $_POST['lop'];
    $netSalary = calculation($_POST);
    $errorMsg = '';
    $resp = validation($_POST);
    if ($resp['status']) {
        $result =  "UPDATE employee_detail SET empName = '$empName', empId = $empId,designation = '$designation',gender = '$gender',experience = $experience,gross_salary = $grossSalary,deduction = $deduction,lop = $lop,netsal = $netSalary WHERE id = $id";
        $result_query = $conn->query($result);
        if ($result_query) {
            header("location:index.php");
        } else {
            echo "Error in inserting: " . mysqli_error($conn);
        }
    } else {
        $errorMsg = $resp['message'];
    }
}
?>
<p align = "center"><b><a href = "index.php"> Go to the index Page</a></b></p>
<?php
$result = mysqli_query($conn, "SELECT * FROM employee_detail WHERE id = $id");
$res = mysqli_fetch_array($result);
$empName = $res['empName'];
$empId = $res['empId'];
$designation = $res['designation'];
$gender = $res['gender'];
$experience = $res['experience'];
$grossSalary = $res['gross_salary'];
$deduction = $res['deduction'];
$lop = $res['lop'];
$netSalary = $res['netsal'];
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
?>"> <?php
echo (!empty($errorMsg['empName']) ? $errorMsg['empName'] : '');
?></td></tr>
<tr> <th>Employee ID</th> <td> <input id = "number" name = "empId" value = "<?php
echo $empId;
?>"> <?php
echo (!empty($errorMsg['empId']) ? $errorMsg['empId'] : '');
?></td></tr>
<tr>
<th>Designation:</th>
<td><select name="designation" value = "<?php
echo !empty($designation) ? $designation : '';
?>"  >
<option selected disabled>Select</option>
<option <?php
if ($designation == 'intern') {
?> selected <?php
}
?> value="intern">intern</option>
<option <?php
if ($designation == 'HR') {
?> selected <?php
}
?> value="HR">HR</option>
<option <?php
if ($designation == 'SrEngineer') {
?> selected <?php
}
?> value="SrEngineer">Sr Engineer</option>
<option <?php
if ($designation == 'SwConsultant') {
?> selected <?php
}
?> value="SwConsultant">Sw Consultant</option>
</select>
<?php

echo (!empty($errorMsg['designation']) ? $errorMsg['designation'] : '');
?>
</td>
</tr>
<tr><th> Gender</th><td><input type = "radio" <?php
if ($gender == "male") {
    echo "checked";
}
?>  name = "gender" value = "male" />Male<br />
<input type="radio" <?php
if ($gender == "female")
    echo "checked";
?> name = "gender" value = "female" />Female<br />
</td><?php
echo (!empty($errorMsg['gender']) ? $errorMsg['gender'] : '');
?></tr>
  <tr> <th> Experience </th> <td><input id = "number" name = "experience"/ value = "<?php
echo $experience;
?>" /><?php
echo (!empty($errorMsg['experience']) ? $errorMsg['experience'] : '');
?></td></tr>
<tr> <th> Gross Salary </th> <td><input id = "number" name = "gross_salary" value = "<?php
echo $grossSalary;
?>" /><?php
echo (!empty($errorMsg['gross_salary']) ? $errorMsg['gross_salary'] : '');
?></td></tr>
<tr> <th> Deduction </th> <td><input id = "number" name = "deduction" value = "<?php
echo $deduction;
?>"/><?php
echo (!empty($errorMsg['deduction']) ? $errorMsg['deduction'] : '');
?></td></tr>
<tr> <th> LOP </th> <td><input id = "number" name = "lop" value = "<?php
echo $lop;
?>" /><?php
echo (!empty($errorMsg['lop']) ? $errorMsg['lop'] : '');
?></td></tr>
<tr> <td><p align = "center"><input type = "submit"  class = "button" name = "submit" value = "Update" /></p></td></tr> 
</table>
</form>
<p align = "center"></p>
</body>
</html>

