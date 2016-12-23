<?php
session_start();
require "dbconfig.php";
require "dbOperation.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
$DbObj = new DBOperations();
if ( !empty($_GET['id'])) {
    try {
        $response_of_Delete = $DbObj->DeleteEmployee($_GET['id']);
    }
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
if (isset($_SESSION['success'])) {
    echo "<p align = center>";
    echo "Record updated successfully!";
    echo "</p>";
    unset($_SESSION['success']);
}
$result = $DbObj->ListEmployee();
if ($result->num_rows > 0) {
    ?>
    <html>
    <table>
    <body bgcolor = #DEE2A3>
    <tr>
    <th>ID </th>
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
    <?php
    while ($employee_details = $result->fetch_assoc()) {   
        echo "<tr>
        <td>".$employee_details['id']."</td>
        <td>".$employee_details["empName"]."</td>
        <td>".$employee_details["empId"]."</td>
        <td>".$employee_details["designation"]."</td>
        <td>".$employee_details["gender"]."</td>
        <td>".$employee_details["experience"]."</td>
        <td>".$employee_details["gross_salary"]."</td>
        <td>".$employee_details["deduction"]."</td>
        <td>".$employee_details["lop"]."</td>
        <td>".$employee_details["netsal"]."</td>";
        echo '<td width = 250>';
        echo "<b>";
        ?>
        <td width=250>
        <a href="viewObject.php?id=<?php echo $employee_details['id'] ?>">Read</a>
        <a href="edit_records.php?id=<?php echo $employee_details['id'] ?>">Edit</a>
        <a href="salary_details.php?id=<?php echo $employee_details['id'] ?>">Salary </a>
        </td>
<?php
echo "<tr/>";
    }
    ?>
    <b> <p align = "center" > <a href = "employee_form.php"> Return to the Create Page </a></p></b>
     <b> <p align = "center" > <a href = "salary_index.php"> Salary Details </a></p></b>
    <h1 align = "center">Employee Details </h1>
    </table>
    </body>
    <?php
    } else {
     echo "0 results";
    }
mysqli_close($conn);
?>
