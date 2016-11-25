<?php
require 'dbconfig.php';
$id = $_GET['id'];
echo "hii";
$delete_query = "DELETE FROM employee_detail WHERE id='$id'";
$result       = $conn->query($delete_query);
if ($result) {
    echo "Record Deleted Successfully";
?>    
<br>
<a href='view1.php'> Back to main page </a>
<?php
} else {
    echo "ERROR!" . mysqli_error($conn);
}
mysqli_close($conn);
?>

