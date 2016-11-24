
 <?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD </h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <th>Employee Name</th>
                      <th>Employee ID</th>
                      <th>Designation</th>
                      <th>Gender</th>
                      <th>Experience</th>
                      <th>Gross Salary</th>
                      <th>Deduction</th>
                      <th>LOP</th>
                      <th>Net Salary</th>

                    </tr>
                  </thead>
                
                  <tbody><?php
$pdo = Database::connect();
$sql = 'SELECT * FROM employee_details ';
foreach ($pdo->query($sql) as $row) { //print_r($row);exit;
    echo '<tr>';
    echo '<td>' . $row['empName'] . '</td>';
    echo '<td>' . $row['empId'] . '</td>';
    echo '<td>' . $row['designation'] . '</td>';
    echo '<td>' . $row['gender'] . '</td>';
    echo '<td>' . $row['experience'] . '</td>';
    echo '<td>' . $row['gross_salary'] . '</td>';
    echo '<td>' . $row['deduction'] . '</td>';
    echo '<td>' . $row['lop'] . '</td>';
    echo '<td>' . $row['netsal'] . '</td>';
?>
                           <td align="center"><?php
    echo '<a href="update1.php?edit_id=' . $row["empid"] . '"><img src="edit.png" width="20" height="20"  align="EDIT" /></a>';
?></td>
        <td align="center"><a href="view.php?delete_id='<?php
    echo $row[0];
?>'"><img src="Remove.png"  width="20" height="20" align="DELETE" /></a>
</td>
        </tr>
        <?php
    echo '</tr>';
}
if (isset($_GET['delete_id'])) {
    $pdo       = Database::connect();
    $sql_query = "DELETE FROM employee_details WHERE empName=" . $_GET['delete_id'];
    $pdo->query($sql_query);
    header("Location: view.php");
    /*if (mysqli_query($conn, $sql_query)) 
    {
    echo "hii";
    }
    else
    {
    echo "hbsjsn";
    }*/
}
?>
                 </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>