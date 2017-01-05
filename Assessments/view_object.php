<html>
<head> 
<title> View Page </title>
</head>
<a href = "EmpController.php?act=listEmployee"> Back </a>
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
<?php
 echo "<table border =5px>";
            echo "<h1> Salary Details </h1>";
            foreach ($salary_details as $salary_detail_employee) {
                echo "<tr>";
                echo "<th> Salary </th>";
                echo "<td>";
                echo $salary_detail_employee['salary'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Day </th>";
                echo "<td>";
                echo $salary_detail_employee['day'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Month </th>";
                echo "<td>";
                echo $salary_detail_employee['month'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th> Year</th>";
                echo "<td>";
                echo $salary_detail_employee['year'];
                echo "</td>";
                echo "</tr>";
            }
 ?>

</table>
