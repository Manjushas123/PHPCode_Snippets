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
    echo "<h3> Employee Details </h3>";
    echo "<table border =5px>";
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
    echo "</table>";
    ?>
    <?php
    echo "<table border =5px>";
    echo "<h1> Salary Details </h1>";
    foreach ($salary_details as $value) {
        echo "<tr>";
        echo "<th> Salary </th>";
        echo "<td>";
        echo $value['salary'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th> Day </th>";
        echo "<td>";
        echo $value['day'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th> Month </th>";
        echo "<td>";
        echo $value['month'];
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th> Year</th>";
        echo "<td>";
        echo $value['year']; 
        echo "</td>";
        echo "</tr>";
    }
}
?> 
