<?php
require 'dbconfig.php';
$id = $_GET['id'];
$delete_query = "DELETE FROM employee_detail WHERE id=$id";
$result = $conn->query($delete_query);
if ($result) {
    echo "<i>";
    echo "<p align = center>";
    echo "Record Deleted Successfully";
    echo "</p>";
    echo "</i>";
?>    
<body background color ="pink">
<br>
<p align = "center"><a href='employee_index.php'> Go to the view page</a></p>
<?php
} else {
    echo "ERROR!" . mysqli_error($conn);
}    
mysqli_close($conn);
?>

