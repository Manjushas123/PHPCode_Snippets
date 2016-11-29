 <?php
require "dbconfig.php";
$id     = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employee_detail WHERE id=$id");
$res    = mysqli_fetch_assoc($result);
?>
<?php
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
<a href ="view.php">Back </a>
<?php
echo "<table>";
echo "<p align =center>";
echo "<tr>";
echo "<th>Employee Name</th>";
echo "<td>";
echo $empname;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Employee ID </th>";
echo "<td>";
echo $empid;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Designation </th>";
echo "<td>";
echo $designation;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Gender </th>";
echo "<td>";
echo $gender;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th> Experience </th>";
echo "<td>";
echo $experience;
echo "</td>";
echo "</tr>";
echo "<th> Gross Salary </th>";
echo "<td>";
echo $grosssalary;
echo "</td>";
echo "</tr>";
echo "<th>Deduction</th>";
echo "<td>";
echo $deduction;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>LOP</th>";
echo "<td>";
echo $lop;
echo "<td/>";
echo "</tr>";
echo "<tr>";
echo "<th>Net Salary </th>";
echo "<td>";
echo $netsalary;
echo "</td>";
echo "</tr>";
?>
</p>
</table>
