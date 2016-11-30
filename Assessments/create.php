<?php
require "dbconfig.php";
if (isset($_POST['create'])) { 
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
    $valid = true;
    if (empty($empName) || !preg_match("/^[a-zA-Z'-]+$/", $empName)) {
        $nameError = "Please enter the valid Employee Name";
        $valid = false;
        echo "<br/>";
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
    if (empty($lop) || !preg_match("/^0$|^[-]?[1-9][0-9]*$/",$lop) || $lop >30) {
        $lopError = "Please enter the valid Lop";
        $valid = false;
        echo "<br>";
    }
    if ($valid) {
        $sql1 = "INSERT INTO employee_detail(empName,empId,designation,gender,experience,gross_salary,deduction,lop,netsal) VALUES('$empName',$empId,'$designation','$gender',$experience,$grossSalary,$deduction,$lop,$netSalary)";
    if (mysqli_query($conn, $sql1)) {
        header('Location: index.php');
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
<b><a href = "index.php">Go to the View Page </a></b>
<h1 align = "center" border-style ="solid"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id = "text" name = "empName"  value="<?php echo $empName; ?>" /> <?php echo $nameError ?></td></tr>
<tr> <th> Employee Id </th> <td><input id ="number" name ="empId"  value = "<?php echo $empId; ?>" /><?php echo $idError ?></td></tr>
<tr>
<th>Designation:</th>
<td><select name="designation" value = "<?php echo !empty($designation) ? $designation : '';?>"  >
<option selected disabled>Select</option>
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
</td>
</tr>
<tr><th> Gender</th><td><input type="radio" <?php if($gender == "male") { echo "checked"; } ?>  name="gender" value="male" />Male<br />
<input type="radio" <?php if($gender == "female") echo "checked" ?> name = "gender" value = "female" />Female<br />
<?php 
if (empty($gender)) {
    echo $genderError;
    $value = false;
}  
?>
</td>
</tr>
<tr> <th> Experience </th> <td><input id = "number" name = "experience"  value = "<?php echo $experience; ?>" / ><?php echo $experienceError ?></td></tr>
<tr> <th> Gross Salary </th> <td><input id = "number" name = "gross_salary"  value = "<?php echo $grossSalary; ?>"/><?php echo $gsError?></td></tr>
<tr> <th> Deduction </th> <td><input id = "number" name = "deduction" value = "<?php echo $deduction; ?>" /> <?php echo $deductionError ?></td></tr>
<tr> <th> LOP </th> <td><input id = "number" name = "lop" value = "<?php echo $lop; ?>" /> <?php echo $lopError ?></td></tr>
<tr> <td><p align ="center"><input type = "submit" class = "button" name = "create" value = "create" /></td></tr></p>
</table>
</form>
<p align="center"></p>
</body>
</html>

