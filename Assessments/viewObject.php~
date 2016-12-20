<?php
require "dbOperation.php";
if (!empty($_GET['id'])) {
    $readObj = new DBOperations();
    $row= $readObj->ReadRecordByRow($_GET['id']);
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
    $salary = $row['salary'];
    $day = $row['day'];
    $month = $row['month'];
}
?>
