<?php
session_start();
require "dbconfig.php";
require "dbOperation.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$DbObject = new DBOperations();
if (!empty($_GET['id'])) {
    try {

        $response_of_Delete = $DbObject->DeleteSalary($_GET['id']);
        $response_of_Delete_Employee = $DbObject->DeleteEmployee($_GET['id']);
    }
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
if (isset($_SESSION['success'])) {
    echo "<p align = center>";
    echo "Record inserted into database successfully!";
    echo "</p>";
    unset($_SESSION['success']);
}
$result = $DbObject->ListSalary();
if ($result->num_rows > 0) {
?>
   <html>
    <table>
    <body bgcolor = #DEE2A3>
    <tr>
    <th>ID </th>
    <th>Salary</th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
    <?php
    while ($salary_details = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $salary_details['id'] . "</td>
        <td>" . $salary_details["salary"] . "</td>
        <td>" . $salary_details["day"] . "</td>
        <td>" . $salary_details["month"] . "</td>
        <td>" . $salary_details["year"] . "</td>";
        echo '<td width = 250>';
        echo "<b>";
?>
       <td>
        <a href="salary_index.php?id=<?php
        echo $salary_details['id'];
?>">Delete</a>
<a href="edit_salary_records.php?id=<?php
        echo $salary_details['id'];
?>">Edit</a>
        </td>      
<?php
        echo "<tr/>";
    }
?>
   <b> <p align = "center" > <a href = "index.php"> Back </a></p></b>
    <h1 align = "center">Employee Salary</h1>
    </table>
    </body>
    <?php
} else {
    echo "0 results";
}
mysqli_close($conn);
?> 
