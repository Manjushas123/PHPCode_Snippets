<?php
session_start();
require "dbconfig.php";
require "dbOperation.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
$DbObj = new DBOperations();
/*if ( !empty($_GET['id'])) {
    try {
        $response_of_Delete = $DbObj->Delete($_GET['id']);
    }
    catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}*/
if (isset($_SESSION['success'])) {
    echo "<p align = center>";
    echo "Record inserted into database successfully!";
    echo "</p>";
    unset($_SESSION['success']);
}
$result = $DbObj->ListSalary();
//$sql = "SELECT * FROM employee_detail";
//$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <html>
    <table>
    <body bgcolor = #DEE2A3>
    <tr>
    <th>ID </th>
    <th>Employee Name</th>
    <th>Salary</th>
    <th>Day</th>
    <th>Month</th>
    <th>Year</th>
    <?php
    while ($row = $result->fetch_assoc()) {   
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row["empName"]."</td>
        <td>".$row["salary"]."</td>
        <td>".$row["day"]."</td>
        <td>".$row["month"]."</td>
        <td>".$row["year"]."</td>";

        echo '<td width = 250>';
        echo "<b>";
        ?>
        
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