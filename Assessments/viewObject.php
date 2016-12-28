 <?php
require "dbOperation.php";
if (!empty($_GET['id'])) {
    $readObj = new DBOperations();
    $salary_details = $readObj->ReadRecordByRow($_GET['id']);
    $employee_details = $readObj->ReadRecord($_GET['id']);
    $empName = $employee_details['empName'];
    $empId = $employee_details['empId'];
    $designation = $employee_details['designation'];
    $gender = $employee_details['gender'];
    $experience = $employee_details['experience'];
    $grossSalary = $employee_details['gross_salary'];
    $deduction = $employee_details['deduction'];
    $lop = $employee_details['lop'];
    $netSalary = $employee_details['netsal'];
    ?>
    <a href = "index.php">Back </a>
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
}
require 'view_object.php';
?> 
