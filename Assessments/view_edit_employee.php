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
<form method = "post" action= "EmpController.php?act=updateEmp">
<input type="hidden" name="id" value="<?php echo $id ?>" />
<table>
<b><a href = "index.php">Go to the Index Page </a></b>
<h1 align = "center" border-style ="solid"> Employee CRUD Application </h1>
<tr> <th> Employee Name </th> <td> <input id = "text" name = "empName"  value="<?php
echo $empName;
?>" /> <?php
echo (!empty($errorMsg['empName']) ? $errorMsg['empName'] : '');
?></td></tr>
<tr> <th> Employee Id </th> <td><input id = "number" name = "empId"  value = "<?php
echo $empId;
?>" /><?php
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
<tr><th> Gender</th><td><input type="radio" <?php
if ($gender == "male") {
    echo "checked";
}
?>  name="gender" value="male" />Male<br />
<input type="radio" <?php
if ($gender == "female")
    echo "checked";
?> name = "gender" value = "female" />Female<br />
<?php
echo (!empty($errorMsg['gender']) ? $errorMsg['gender'] : '');
?>
</td>
</tr>
<tr> <th> Experience </th> <td><input id = "number" name = "experience"  value = "<?php
echo $experience;
?>" /><?php
echo (!empty($errorMsg['experience']) ? $errorMsg['experience'] : '');
?></td></tr>
<tr> <th> Gross Salary </th> <td><input id = "number" name = "gross_salary"  value = "<?php
echo $grossSalary;
?>"/><?php
echo (!empty($errorMsg['gross_salary']) ? $errorMsg['gross_salary'] : '');
?></td></tr>
<tr> <th> Deduction </th> <td><input id = "number" name = "deduction" value = "<?php
echo $deduction;
?>" /> <?php
echo (!empty($errorMsg['deduction']) ? $errorMsg['deduction'] : '');
?></td></tr>
<tr> <th> LOP </th> <td><input id = "number" name = "lop" value = "<?php
echo $lop;
?>" /> <?php
echo (!empty($errorMsg['lop']) ? $errorMsg['lop'] : '');
?></td></tr>
<tr> <td><p align ="center"><input type = "submit" class = "button" name = "submit" value = "Update" /></td></tr>
</table>
</form>
<p align="center"></p>
</body>
</html>
