<?php
require 'database.php';
$servername = "localhost";
$username   = "root";
$password   = "compass";
$dbname     = "mytodo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM employee_details WHERE user_id=" . $_GET['delete_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}
?>
