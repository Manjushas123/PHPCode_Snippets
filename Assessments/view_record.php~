<?php 
r<?php
require "dbconfig.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employee_detail WHERE id=$id");
$res   = mysqli_fetch_assoc($result);
?>
<table>
    <tr>
    <th>Employee Name</th>
    <th>Employee Id</th>
    <th>Designation</th>
    <th>Gender</th>
    <th>Experience</th>
    <th>Gross Salary</th>
    <th>Deduction</th>
    <th>LOP</th>
    <th>Net Salary</th>
    </tr>
<p align ="center">
<?php
foreach ($res as $value) {
    echo "<td>";
    echo $value;
    echo "</td>";
    echo "<br>";
}
?>
</p>
</table>
