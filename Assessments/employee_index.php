<html>
<?php
require "dbconfig.php";;
$sql1 = "SELECT * FROM employee_detail";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
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
        echo '<td width=250>';
        //$calculate=$_POST['gross_salary']-($_POST['deduction']+ $_POST['lop']);
         //echo $calculate;
        echo '<a href="delete.php?id='. $row['id'] .'">Remove</a>';
        echo ' ';
        echo '<a href="update.php?id='. $row['id'] .'">Edit</a>';
        echo '<a href="view_record.php?id='. $row['id'] .'">Read</a>';
        echo "</b>";
        echo "</b>";
        echo "</tr>";
    }
    ?>
    <a href ="employee_create.php"> Return to the home page </a>
    </table>
    <?php
} else {
     echo "0 results";
}   
mysqli_close($conn);
?>
 
    
