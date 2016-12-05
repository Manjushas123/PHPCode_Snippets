<?php
require "dbconfig.php";
session_start();
if (isset($_SESSION['success'])) {
    echo "<p align = center>";
    echo "Record inserted into database successfully!";
    echo "</p>";
    unset($_SESSION['success']);
}
$sql = "SELECT * FROM employee_detail";
$result = $conn->query($sql);
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
        echo '<a href ="delete.php?id='. $row['id'] .'">Delete</a>';
        echo ' ';
        echo '<a href="edit.php?id='. $row['id'] .'">Edit</a>';
        echo ' ';
        echo '<a href="view.php?id='. $row['id'] .'">View</a>';
        echo "</b>";
        echo "</b>";
        echo "</tr>";
    }
    if(isset($_POST['submit']))
    {  
        echo "record updated successfully";
    }
    ?>
    <b> <p align = "center" > <a href = "create.php"> Return to the Create Page </a></p></b>
    <h1 align = "center">Employee Details </h1>
    </table>
    </body>
    <?php
    } else {
     echo "0 results";
    }
    
mysqli_close($conn);
?>

