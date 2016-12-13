<?php
session_start();
require "dbconfig.php";
require "dbOperation.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
$DbObj = new DBOperations();
if ( !empty($_GET['id'])) {
    try {
        $response_of_Delete = $DbObj->Delete($_GET['id']);
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
$result = $DbObj->ListStudents();
//$sql = "SELECT * FROM employee_detail";
//$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <html>
    <table>
    <body bgcolor = #DEE2A3>
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
    <?php
    while ($row = $result->fetch_assoc()) {   
        echo "<tr>
        <td>".$row["empName"]."</td>
        <td>".$row["empId"]."</td>
        <td>".$row["designation"]."</td>
        <td>".$row["gender"]."</td>
        <td>".$row["experience"]."</td>
        <td>".$row["gross_salary"]."</td>
        <td>".$row["deduction"]."</td>
        <td>".$row["lop"]."</td>
        <td>".$row["netsal"]."</td>";
        echo '<td width = 250>';
        echo "<b>";
        ?>
        <td width=250>
        <a href="viewObject.php?id=<?php echo $row['id'] ?>">Read</a>
        <a href="index.php?id=<?php echo $row['id'] ?>">Delete</a>
        <a href="edit_records.php?id=<?php echo $row['id'] ?>">Edit</a>
        </td>
<?php
echo "<tr/>";
    }
    ?>
    <b> <p align = "center" > <a href = "employee_form.php"> Return to the Create Page </a></p></b>
    <h1 align = "center">Employee Details </h1>
    </table>
    </body>
    <?php
    } else {
     echo "0 results";
    }
mysqli_close($conn);
?>
