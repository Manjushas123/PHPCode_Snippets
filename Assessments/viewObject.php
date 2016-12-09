<?php
require "dbOperation.php";
if (!empty($_GET['id'])) {
    $readObj = new DBOperations();
    $row= $readObj->ReadRecord($_GET['id']);
    $empName = $row['empName'];
    $empId = $row['empId'];
    $designation = $row['designation'];
    $gender = $row['gender'];
    $experience = $row['experience'];
    $grossSalary = $row['gross_salary'];
    $deduction = $row['deduction'];
    $lop = $row['lop'];
    $netSalary = $row['netsal'];
?>
<body bgcolor = #DEE2A3>
<a href ="index.php">Back </a>
<?php
echo "<table>";
echo "<p align =center>";
echo "<tr>";
echo "<th>Employee Name</th>";
echo "<td>";
echo $empName;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Employee ID </th>";
echo "<td>";
echo $empId;
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
echo $grossSalary;
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
echo $netSalary;
echo "</td>";
echo "</tr>";
}
?>