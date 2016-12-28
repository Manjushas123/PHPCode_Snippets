<html>
<head> 
<title> View Page </title>
</head>
<h3> Employee Details </h3>
<table border =5px>
<p align =center>
<tr>
<th>Employee Name</th>
<td>
<?php
echo $empName;
?>
</td>
</tr>
<tr>
<th>Employee ID </th>
<td>
<?php
echo $empId;
?>
</td>
</tr>
<tr>
<th>Designation </th>
<td><?php
echo $designation;
?>
</td>
</tr>
<tr>
<th>Gender </th>
<td>
<?php
echo $gender;
?>
</td>
</tr>
<tr>
<th> Experience </th>
<td>
<?php
echo $experience;
?>
</td>
</tr>
<th> Gross Salary </th>
<td>
<?php
 echo $grossSalary;
?>
</td>
</tr>
<th>Deduction</th>
<td>
<?php
echo $deduction;
?>
</td>
</tr>
<tr>
<th>LOP</th>
<td>
<?php
echo $lop;
?>   
<td/>
</tr>
<tr>
<th>Net Salary </th>
<td>
<?php
echo $netSalary;
?>
</td>
</tr>
</table>
