<?php
require 'dbconfig.php';
$id = $_GET['id'];
$delete_query = "DELETE FROM employee_detail WHERE id=$id";
$result = $conn->query($delete_query);
if ($result) {
    location("header:index.php");
?>    
<body background color ="pink">
<br>
<p align = "center"><a href='index.php'> Go to the view page</a></p>
<?php
} else {
    echo "ERROR!" . mysqli_error($conn);
}    
mysqli_close($conn);
?>

